<?php
App::uses('AppController', 'Controller');
/**
 * Ramas Controller
 *
 * @property Rama $Rama
 */
class RamasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rama->recursive = 0;
		$this->set('ramas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		$this->set('rama', $this->Rama->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rama->create();
			if ($this->Rama->save($this->request->data)) {
				$this->Session->setFlash(__('The rama has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'));
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
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rama->save($this->request->data)) {
				$this->Session->setFlash(__('The rama has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rama->read(null, $id);
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
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this->Rama->delete()) {
			$this->Session->setFlash(__('Rama deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rama was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Rama->recursive = 0;
		$this->set('ramas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		$this->set('rama', $this->Rama->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Rama->create();
			if ($this->Rama->save($this->request->data)) {
				$this->Session->setFlash(__('The rama has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'));
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
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rama->save($this->request->data)) {
				$this->Session->setFlash(__('The rama has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rama->read(null, $id);
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
		$this->Rama->id = $id;
		if (!$this->Rama->exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this->Rama->delete()) {
			$this->Session->setFlash(__('Rama deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rama was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
