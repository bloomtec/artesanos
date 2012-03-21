<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this -> set('item', $this -> Item -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function agregarActivoFijo() {
		/**
		 * Para el correcto ingreso de item de inventario proceder así:
		 * 1. Tener el listado de ítems, en caso de no estar permitir crear uno nuevo.
		 * 2. Generar el ingreso de inventario
		 * 3. Generar los items del ingreso de inventario
		 */
		if ($this -> request -> is('post')) {
			// TODO : Tener en cuenta el tipo de item para este código!!!!
			$max_id = $this -> Item -> query('SELECT MAX(`id`) FROM `items`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if (!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			// Asignar el campo de activo fijo
			$this -> request -> data['Item']['ite_is_activo_fijo'] = true;
			$this -> Item -> create();
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$items = $this -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => true)));
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('items', 'tiposDeItems'));
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			// TODO : Tener en cuenta el tipo de item para este código!!!!
			$max_id = $this -> Item -> query('SELECT MAX(`id`) FROM `items`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if (!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			// Asignar el campo de activo fijo
			$this -> request -> data['Item']['ite_is_activo_fijo'] = false;
			$this -> Item -> create();
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Item -> read(null, $id);
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
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
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> Item -> delete()) {
			$this -> Session -> setFlash(__('Item deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Item was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
