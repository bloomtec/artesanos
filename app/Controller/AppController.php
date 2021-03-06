<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * This is a placeholder class.
 * Create the same file in app/Controller/AppController.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	
	/**
	 * Definir que se utilicé el cache en todos los controladores
	 */
	public $cacheAction = true;
	
	/**
	 * Componentes a utilizar en la aplicación
	 */
	public $components = array('Auth', 'Acl', 'Session');
	
	/**
	 * Definir características que se requieren globalmente por todas las clases.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		$this -> Auth -> authorize = array('Actions' => array('actionPath' => 'controllers', 'userModel' => 'Usuario'));
		$this -> Auth -> authenticate = array('Form' => array('scope' => array('usu_activo' => 1), 'userModel' => 'Usuario', 'fields' => array('username' => 'usu_nombre_de_usuario', 'password' => 'usu_contrasena')));
		$this -> Auth -> loginAction = array('controller' => 'usuarios', 'action' => 'login');
		$this -> Auth -> loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		$this -> Auth -> logoutRedirect = array('controller' => 'usuarios', 'action' => 'login');
	}
	
	/**
	 * Función genérica de exportar a CSV
	 * @return void
	 */
	public function CSVExport() {
		$this -> autoRender = false;
		$model = $this -> modelClass;
		$model_schema = $this -> $model -> schema();
		$model_fields = array();

		foreach ($model_schema as $model_field => $schema) {
			$model_fields[] = $model_field;
		}

		/**
		 * Estos campos deben de llegar por medio de $this -> request -> params
		 */
		$requested_fields = null;
		$requested_headers = null;

		/**
		 * Este campo debe de asignarse en la sesión
		 */
		$export_data = null;

		/**
		 * Procesar los datos enviados
		 */
		if (isset($this -> request -> params['named']['fields']) && !empty($this -> request -> params['named']['fields'])) {
			$requested_fields = urldecode(($this -> request -> params['named']['fields']));
			$requested_fields = explode(',', $requested_fields);
			$model_fields = array_intersect($model_fields, $requested_fields);
		}

		if (isset($this -> request -> params['named']['headers']) && !empty($this -> request -> params['named']['headers'])) {
			$requested_headers = urldecode($this -> request -> params['named']['headers']);
			$requested_headers = explode(',', $requested_headers);
		}

		$export_data = $this -> Session -> read('CSV.export_data');
		
		// Sección para procesar los datos e iniciar la descarga al usuario
		if ($export_data && $model_fields) {
		//if(false) {
			// Delimitador para el archivo CSV
			$delimiter = ',';
			// Caracter que encapsula el valor de la columna
			$enclosure = '"';
			// Nombre del archivo CSV
			$now = new DateTime('now');
			$now = $now -> format('Y-m-d_H:i:s');
			$filename = $this -> Session -> read('CSV.filename');
			$filename .= '_' . $now;
			$filename .= '.csv';
			
			// Linea de datos para agregar al archivo
			$line = array();
			// Definir buffer de memoria
			$buffer = fopen('php://temp/maxmemory:' . (5 * 1024 * 1024), 'r+');

			// Asignar el header
			if ($requested_headers) {
				fputcsv($buffer, $requested_headers, $delimiter, $enclosure);
			} else {
				fputcsv($buffer, $model_fields, $delimiter, $enclosure);
			}

			// Asignar los valores
			foreach ($export_data as $key => $row) {
				foreach ($requested_fields as $model_field) {
					$line[] = $row[$model][$model_field];
				}
				fputcsv($buffer, $line, $delimiter, $enclosure);
				$line = array();
			}
			
			header("Content-type:application/vnd.ms-excel");
			header("Content-disposition:attachment;filename=" . $filename);
			rewind($buffer);
			$output = stream_get_contents($buffer);
			fclose($buffer);
			return $output;
						
		} else {
			debug($requested_fields);
			debug($requested_headers);
			debug($export_data);
			// $this -> redirect($this -> referer());
		}
	}

	/**
	 * Filtro de busquedas
	 *
	 * @param string $query El texto que se va a buscar
	 * @param array $fields Arreglo que contiene los nombres de las columnas del modelo en los que se quiere buscar en caso de que no se defina, se toman todas las columnas
	 */
	public function searchFilter($query = null, $fields = null) {
		$conditions = array();
		$model = $this -> modelClass;
		$model_schema = $this -> $model -> schema();
		$model_fields = array();

		foreach ($model_schema as $model_field => $schema) {
			$model_fields[] = $model_field;
		}

		if ($fields) {
			$model_fields = array_intersect($model_fields, $fields);
		}

		foreach ($model_fields as $model_field) {
			if ($this -> $model -> isForeignKey($model_field)) {
				$foreign_model = substr(Inflector::camelize($model_field), 0, -2);
				$this -> $model -> $foreign_model -> recursive = -1;
				$foreign_display_name = $this -> $model -> $foreign_model -> displayField;
				$foreign_conditions = array("$foreign_model.$foreign_display_name LIKE" => "%$query%");
				$foreign_results = $this -> $model -> $foreign_model -> find('list', array('fields' => array("$foreign_model.id"), 'conditions' => $foreign_conditions));
				if (!empty($foreign_results)) {
					$conditions['OR'][$model . ".$model_field"] = $foreign_results;
				}
			} else {
				$conditions['OR'][$model . ".$model_field LIKE"] = "%$query%";
			}
		}

		return $conditions;
	}

}
