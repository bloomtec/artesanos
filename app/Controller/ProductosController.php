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
			$this->Producto->create();
			if ($this->Producto->save($this->request->data)) {
				$this->Session->setFlash(__('The producto has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The producto could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->Producto->Taller->find('list');
		$locales = $this->Producto->Local->find('list');
		$this->set(compact('talleres', 'locales'));
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
		$talleres = $this->Producto->Taller->find('list');
		$locales = $this->Producto->Local->find('list');
		$this->set(compact('talleres', 'locales'));
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
