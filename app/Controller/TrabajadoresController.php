<?php
App::uses('AppController', 'Controller');
/**
 * Trabajadores Controller
 *
 * @property Trabajador $Trabajador
 */
class TrabajadoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Trabajador->recursive = 0;
		$this->set('trabajadores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		$this->set('trabajador', $this->Trabajador->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trabajador->create();
			if ($this->Trabajador->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajador could not be saved. Please, try again.'));
			}
		}
		$talleres = $this->Trabajador->Taller->find('list');
		$locales = $this->Trabajador->Local->find('list');
		$this->set(compact('talleres', 'locales'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trabajador->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajador could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Trabajador->read(null, $id);
		}
		$talleres = $this->Trabajador->Taller->find('list');
		$locales = $this->Trabajador->Local->find('list');
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
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this->Trabajador->delete()) {
			$this->Session->setFlash(__('Trabajador deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajador was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Trabajador->recursive = 0;
		$this->set('trabajadores', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		$this->set('trabajador', $this->Trabajador->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Trabajador->create();
			if ($this->Trabajador->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajador could not be saved. Please, try again.'));
			}
		}
		$talleres = $this->Trabajador->Taller->find('list');
		$locales = $this->Trabajador->Local->find('list');
		$this->set(compact('talleres', 'locales'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trabajador->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajador could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Trabajador->read(null, $id);
		}
		$talleres = $this->Trabajador->Taller->find('list');
		$locales = $this->Trabajador->Local->find('list');
		$this->set(compact('talleres', 'locales'));
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
		$this->Trabajador->id = $id;
		if (!$this->Trabajador->exists()) {
			throw new NotFoundException(__('Invalid trabajador'));
		}
		if ($this->Trabajador->delete()) {
			$this->Session->setFlash(__('Trabajador deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajador was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
