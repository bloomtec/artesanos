<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudad $Ciudad
 */
class CiudadesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getCiudades', 'getByCanton');
	}

	public function beforeRender() {
		//$this -> layout = "parametros";
	}

	public function getByCanton($canId=null) {
		$this -> layout = "ajax";
		//$ciudades_con_inspectores = $this -> Ciudad -> Usuario -> find('list', array('fields' => array('Usuario.ciudad_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		//$ciudades = $this -> Ciudad -> find('list', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.id' => $ciudades_con_inspectores, 'Ciudad.canton_id' => $canId)));
		$ciudades = $this -> Ciudad -> find('list', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.canton_id' => $canId)));
		echo json_encode($ciudades);
		exit(0);
	}

	public function getCiudades($canton_id = null) {
		$this -> Ciudad ->recursive=-1;
		if ($canton_id) {
			return $this -> Ciudad -> find('all', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.canton_id' => $canton_id)));
		} else {
			return $this -> Ciudad -> find('all', array('order' => array('Ciudad.ciu_nombre' => 'ASC')));
		}
	}

	public function getNombre($id) {
		$ciudad = $this -> Ciudad -> read('ciu_nombre', $id);
		return $ciudad['Ciudad']['ciu_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Ciudad -> id = $id;
		if (!$this -> Ciudad -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		$this -> set('ciudad', $this -> Ciudad -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Ciudad -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Ciudad -> create();
			if ($this -> Ciudad -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la ciudad'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones', 'provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Ciudad -> currentUsrId = $this -> Auth -> user('id');
		$this -> Ciudad -> id = $id;
		if (!$this -> Ciudad -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Ciudad -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la ciudad'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Ciudad -> read(null, $id);
		}
		$provincias = $this -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones', 'provincias'));
	}
	
	public function index() {
		$ciudades = $this -> paginate();	
		$this -> set(compact('ciudades'));
	}

}
