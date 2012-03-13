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
	public function index() {
		$this->Proveedor->recursive = 0;
		$this->set('proveedores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Proveedor->id = $id;
		if (!$this->Proveedor->exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		$this->set('proveedor', $this->Proveedor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Proveedor->create();
			if ($this->Proveedor->save($this->request->data)) {
				$this->Session->setFlash(__('The proveedor has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proveedor could not be saved. Please, try again.'),'crud/error');
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
		$this->Proveedor->id = $id;
		if (!$this->Proveedor->exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proveedor->save($this->request->data)) {
				$this->Session->setFlash(__('The proveedor has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proveedor could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Proveedor->read(null, $id);
		}
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
		$this->Proveedor->id = $id;
		if (!$this->Proveedor->exists()) {
			throw new NotFoundException(__('Invalid proveedor'));
		}
		if ($this->Proveedor->delete()) {
			$this->Session->setFlash(__('Proveedor deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Proveedor was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
