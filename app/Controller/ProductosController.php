<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 */
class ProductosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Producto->recursive = 0;
		$this->set('productos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		$this->set('producto', $this->Producto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$max_id = $this -> Producto -> query('SELECT MAX(`id`) FROM `productos`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if(!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Producto']['pro_codigo'] = 1000000 + $max_id;
			$this->Producto->create();
			if ($this->Producto->save($this->request->data)) {
				$this->Session->setFlash(__('The producto has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The producto could not be saved. Please, try again.'),'crud/error');
			}
		}
		$tiposDeProductos = $this -> Producto -> getValores(15);
		$this -> set(compact('tiposDeProductos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Producto->save($this->request->data)) {
				$this->Session->setFlash(__('The producto has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The producto could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Producto->read(null, $id);
		}
		$tiposDeProductos = $this -> Producto -> getValores(15);
		$this -> set(compact('tiposDeProductos'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		if ($this->Producto->delete()) {
			$this->Session->setFlash(__('Producto deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Producto was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
