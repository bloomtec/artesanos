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
		$this -> layout = "parametros";
	}

	public function getByCanton($canId=null) {
		$this -> layout = "ajax";
		echo json_encode($this -> Ciudad -> find('list', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.canton_id' => $canId))));
		exit(0);
	}

	public function getCiudades($canton_id = null) {
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
			throw new NotFoundException(__('Invalid ciudad'));
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
				$this -> Session -> setFlash(__('The ciudad has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ciudad could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones'));
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
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Ciudad -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ciudad has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ciudad could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Ciudad -> read(null, $id);
		}
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones'));
	}

}
