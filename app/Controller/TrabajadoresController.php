<?php
App::uses('AppController', 'Controller');
/**
 * Trabajadores Controller
 *
 * @property Trabajador $Trabajador
 */
class TrabajadoresController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('*');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Trabajador -> recursive = 0;
		$this -> set('trabajadores', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Trabajador -> id = $id;
		if (!$this -> Trabajador -> exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		$this -> set('trabajador', $this -> Trabajador -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			debug($this->request->data);
			/*$this -> Trabajador -> create();
			if ($this -> Trabajador -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The trabajador has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The trabajador could not be saved. Please, try again.'), 'crud/error');
			}*/
		}
		$tiposDeTrabajadores = $this -> Trabajador -> TiposDeTrabajador -> find('list');
		$talleres = $this -> Trabajador -> Taller -> find('list');
		$this -> set(compact('tiposDeTrabajadores', 'talleres'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Trabajador -> id = $id;
		if (!$this -> Trabajador -> exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			debug($this->request->data);
			/*
			if ($this -> Trabajador -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The trabajador has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The trabajador could not be saved. Please, try again.'), 'crud/error');
			}*/
		} else {
			$this -> request -> data = $this -> Trabajador -> read(null, $id);
			debug($this -> request -> data);
		}
		$tiposDeTrabajadores = $this -> Trabajador -> TiposDeTrabajador -> find('list');
		$talleres = $this -> Trabajador -> Taller -> find('list');
		$this -> set(compact('tiposDeTrabajadores', 'talleres'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Trabajador -> id = $id;
		if (!$this -> Trabajador -> exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this -> Trabajador -> delete()) {
			$this -> Session -> setFlash(__('Trabajador deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Trabajador was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
