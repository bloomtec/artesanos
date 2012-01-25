<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudad $Ciudad
 */
class CiudadesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ciudad->recursive = 0;
		$this->set('ciudades', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$this->set('ciudad', $this->Ciudad->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ciudad->create();
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
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
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciudad->read(null, $id);
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
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->Ciudad->delete()) {
			$this->Session->setFlash(__('Ciudad deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciudad was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Ciudad->recursive = 0;
		$this->set('ciudades', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$this->set('ciudad', $this->Ciudad->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ciudad->create();
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciudad->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->Ciudad->delete()) {
			$this->Session->setFlash(__('Ciudad deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciudad was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
