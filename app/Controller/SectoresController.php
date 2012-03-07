<?php
App::uses('AppController', 'Controller');
/**
 * Sectores Controller
 *
 * @property Sector $Sector
 */
class SectoresController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getSectores', 'getByCiudad');
	}

	public function beforeRender() {
		$this -> layout = "parametros";
	}

	public function getByCiudad($ciuId = null) {
		$this -> layout = "ajax";
		//$sectores_con_inspectores = $this -> Sector -> Usuario -> find('list', array('fields' => array('Usuario.sector_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		//$sectores = $this -> Sector -> find('list', array('order' => array('Sector.sec_nombre' => 'ASC'), 'conditions' => array('Sector.id' => $sectores_con_inspectores, 'Sector.ciudad_id' => $ciuId)));
		$sectores = $this -> Sector -> find('list', array('order' => array('Sector.sec_nombre' => 'ASC'), 'conditions' => array('Sector.ciudad_id' => $ciuId)));
		echo json_encode($sectores);
		exit(0);
	}

	public function getSectores($ciudad_id = null) {
		if ($ciudad_id) {
			return $this -> Sector -> find('all', array('order' => array('Sector.sec_nombre' => 'ASC'), 'conditions' => array('Sector.ciudad_id' => $ciudad_id)));
		} else {
			return $this -> Sector -> find('all', array('order' => array('Sector.sec_nombre' => 'ASC')));
		}
	}

	public function getNombre($id) {
		$sector = $this -> Sector -> read('sec_nombre', $id);
		if (empty($sector)) {
			return '<b>:: eliminado ::</b>';
		} else {
			return $sector['Sector']['sec_nombre'];
		}
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Sector -> id = $id;
		if (!$this -> Sector -> exists()) {
			throw new NotFoundException(__('Sector no válido'));
		}
		$this -> set('sector', $this -> Sector -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Sector -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Sector -> create();
			if ($this -> Sector -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el sector'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el sector. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Sector -> Ciudad -> find('list');
		$this -> set(compact('ciudades', 'cantones', 'provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Sector -> currentUsrId = $this -> Auth -> user('id');
		$this -> Sector -> id = $id;
		if (!$this -> Sector -> exists()) {
			throw new NotFoundException(__('Sector no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Sector -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el sector'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el sector. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Sector -> read(null, $id);
		}
		$provincias = $this -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Sector -> Ciudad -> find('list');
		$this -> set(compact('ciudades', 'cantones', 'provincias'));
	}

}