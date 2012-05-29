<?php
App::uses('AppController', 'Controller');
/**
 * ParametrosInformativos Controller
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class ParametrosInformativosController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getValores', 'getNombre', 'getNombreItemParametro');
	}
	
	/**
	 * Obtener el nombre del parámetro informativo
	 * @param int $id ID del parámetro informativo
	 * @return El nombre del parámetro informativo
	 */
	public function getNombre($id) {
		$parametro = $this -> ParametrosInformativo -> read('par_nombre', $id);
		return $parametro['ParametrosInformativo']['par_nombre'];
	}

	/**
	 * Listar parámetros informativos
	 *
	 * @return void
	 */
	public function index() {
		$this -> ParametrosInformativo -> recursive = 0;
		$this -> paginate = array('order' => array('ParametrosInformativo.par_nombre' => 'ASC'));
		$this -> set('parametrosInformativos', $this -> paginate());
	}

	/**
	 * Ver parámetro informativo
	 *
	 * @param int $id ID del parámetro informativo
	 * @return void
	 */
	public function view($id) {
		$this -> ParametrosInformativo -> id = $id;
		if (!$this -> ParametrosInformativo -> exists()) {
			throw new NotFoundException(__('Parámetro informativo no válido'));
		}
		$this -> set('parametrosInformativo', $this -> ParametrosInformativo -> read(null, $id));
		$this -> set('valores', $this -> ParametrosInformativo -> Valor -> find('all', array('order' => array('Valor.val_nombre' => 'ASC'), 'conditions' => array('Valor.parametros_informativo_id' => $id))));
	}
	
	/**
	 * Obtener los valores relacionados al parametro informativo
	 * @param int $id ID del parámetro informativo
	 * @return Arreglo codificado en JSON con los valores del parámetro informativo
	 */
	public function getValores($id) {
		$this -> layout = "ajax";
		if ($id) {
			echo json_encode($this -> ParametrosInformativo -> getValores($id));
		} else {
			echo 'error';
		}
		exit(0);
	}
	
	/**
	 * Obtener el valor de un ítem especifico de un parámetro informativo
	 * @param int $id ID del parámetro informativo
	 * @param int $item ID del ítem
	 * @return Nombre del ítem correspondiente
	 */
	public function getNombreItemParametro($id = null, $item = null) {
		if ($id) {
			$valores = $this -> ParametrosInformativo -> getValores($item);
			return $valores[$item];
		} else {
			return null;
		}
	}

}
