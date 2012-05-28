<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Pages';

	/**
	 * Default helper
	 *
	 * @var array
	 */
	public $helpers = array('Html', 'Session');

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('display', 'lanzador', 'formularioVitrina');
	}

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this -> redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this -> set(compact('page', 'subpage', 'title_for_layout'));
		$this -> render(implode('/', $path));
	}

	public function lanzador() {
		$this -> layout = 'login';
	}

	public function formularioVitrina() {
		$this -> layout = 'externas';
		$this -> loadModel('Artesano');
		if (!empty($this -> request -> data)) {
			$mensaje = "";
			$provincias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
			$cantones = $this -> Artesano -> Calificacion -> Taller -> Canton -> find('list');
			$ciudades = $this -> Artesano -> Calificacion -> Taller -> Ciudad -> find('list');
			$parroquias = $this -> Artesano -> Calificacion -> Taller -> Parroquia -> find('list');
			$ramas = $this -> Artesano -> Calificacion -> Rama -> find('list');
			$attachments = array();
			foreach ($this -> request -> data['Page'] as $key => $value) {
				switch ($key) {
					case 'provincia' :
						$mensaje .= "Provincia: " . $provincias[$value] . " <br />";
						break;
					case 'canton' :
						$mensaje .= "Cantón: " . $cantones[$value] . " <br />";
						break;
					case 'ciudad' :
						$mensaje .= "Ciudad: " . $ciudades[$value] . " <br />";
						break;
					case 'parroquia' :
						$mensaje .= "Parroquia: " . $parroquias[$value] . " <br />";
						break;
					case 'rama' :
						$mensaje .= "Rama: " . $ramas[$value] . " <br />";
						break;

					case 'imagen_1' :
						if (!$value['error']) {
							$attachments['1 - ' . $value['name']] = $value['tmp_name'];
						}
						break;
					case 'imagen_2' :
						if (!$value['error']) {
							$attachments['2 - ' . $value['name']] = $value['tmp_name'];
						}
						break;
					case 'imagen_3' :
						if (!$value['error']) {
							$attachments['3 - ' . $value['name']] = $value['tmp_name'];
						}
						break;
					default :
					//debug(Inflector::humanize($key));
						$mensaje .= Inflector::humanize($key) . ": " . $value . " <br />";
						break;
				}

			}
			$mensaje .= "Productos: <br /> <ul>";
			foreach ($this -> request -> data['Producto'] as $key => $value) {
				if($value['nombre']){
					$mensaje .= "<li> nombre: " . $value['nombre'] . ", Precio referencial: ".$value['precio_referencial'] .", Tiempo de entrega: ".$value['tiempo_de_entrega'] ."</li>";
						if (!$value ['imagen_1']['error']) {
							$attachments[$value['nombre']."_".$value ['imagen_1']['name']]
							 = $value ['imagen_1']['tmp_name'];
						}
						if (!$value ['imagen_2']['error']) {
							$attachments[$value['nombre']."_".$value ['imagen_2']['name']] = $value ['imagen_2']['tmp_name'];
						}
						if (!$value ['imagen_3']['error']) {
							$attachments[$value['nombre']."_".$value ['imagen_3']['name']] = $value ['imagen_3']['tmp_name'];
						}
				}
			}
			$mensaje .= "</ul>";
		
			$this -> loadModel('Configuracion');
			$correos = $this -> Configuracion -> read(null, 1);
			$correos = $correos['Configuracion']['con_correo_vitrina'];
			$correos = explode(',', $correos);

			foreach ($correos as $key => $correo) {
				$email = new CakeEmail();
				$email -> emailFormat('html');
				$email -> from(array('no-reply@jnda.gob.ec' => 'Vitrina Virtual'));
				$email -> subject('Solicitud Vitrina Virtual');
				if (!empty($attachments)) {
					$email -> attachments($attachments);
				}
				$email -> to(trim($correo));
				$email -> send($mensaje);
				$email -> reset();
			}

			// ENVIAR MENSAJE
			$this -> set('se_envio', true);
		}
		//$nacionalidades = $this -> Artesano -> getValores(1);
		//$tipos_de_sangre = $this -> Artesano -> getValores(2);
		//$estados_civiles = $this -> Artesano -> getValores(3);
		//$grados_de_estudio = $this -> Artesano -> getValores(4);
		//$sexos = $this -> Artesano -> getValores(5);
		$ramas = $this -> Artesano -> Calificacion -> Rama -> find('list');
		$provincias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		$this -> set(compact('ramas', 'provincias'));
	}

	private function uploadIngresoEspecieFile($tmp_name = null, $filename = null) {
		$this -> cleanupIngresoEspecieFiles();
		if ($tmp_name && $filename) {
			$url = 'files/uploads/especiesValoradas/' . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}

}
