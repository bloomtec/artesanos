<?php
App::uses('AppController', 'Controller');
/**
 * Proveedores Controller
 *
 * @property Proveedor $Proveedor
 */
class ProveedoresController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */

	//var $uses = array('Proveedor','IngresosDeInventario');

	public function index() {
		$this -> Proveedor -> recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			$conditions = array('OR' => array('Proveedor.pro_rut' => "%$query%", 'Proveedor.pro_nombre_razon_social LIKE' => "%$query%", 'Proveedor.pro_representante_legal LIKE' => "%$query%", 'Proveedor.pro_telefono_fijo LIKE' => "%$query%", 'Proveedor.pro_celular LIKE' => "%$query%", 'Proveedor.pro_observaciones LIKE' => "%$query%", ));

		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$this -> set('proveedores', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Proveedor -> id = $id;
		if (!$this -> Proveedor -> exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		$this -> set('proveedor', $this -> Proveedor -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Proveedor -> create();
			if ($this -> Proveedor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The proveedor has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The proveedor could not be saved. Please, try again.'), 'crud/error');
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Proveedor -> id = $id;
		if (!$this -> Proveedor -> exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Proveedor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The proveedor has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The proveedor could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Proveedor -> read(null, $id);
		}
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
		$this -> Proveedor -> id = $id;
		if (!$this -> Proveedor -> exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		if ($this -> Proveedor -> delete()) {
			$this -> Session -> setFlash(__('Proveedor deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Proveedor was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}


}
