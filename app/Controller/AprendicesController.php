<?php
App::uses('AppController', 'Controller');
/**
 * Aprendices Controller
 *
 * @property Aprendiz $Aprendiz
 */
class AprendicesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aprendiz->recursive = 0;
		$this->set('aprendices', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		$this->set('aprendiz', $this->Aprendiz->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aprendiz->create();
			if ($this->Aprendiz->save($this->request->data)) {
				$this->Session->setFlash(__('The aprendiz has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'));
			}
		}
		$talleres = $this->Aprendiz->Taller->find('list');
		$locales = $this->Aprendiz->Local->find('list');
		$this->set(compact('talleres', 'locales'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aprendiz->save($this->request->data)) {
				$this->Session->setFlash(__('The aprendiz has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aprendiz->read(null, $id);
		}
		$talleres = $this->Aprendiz->Taller->find('list');
		$locales = $this->Aprendiz->Local->find('list');
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
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		if ($this->Aprendiz->delete()) {
			$this->Session->setFlash(__('Aprendiz deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aprendiz was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Aprendiz->recursive = 0;
		$this->set('aprendices', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		$this->set('aprendiz', $this->Aprendiz->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Aprendiz->create();
			if ($this->Aprendiz->save($this->request->data)) {
				$this->Session->setFlash(__('The aprendiz has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'));
			}
		}
		$talleres = $this->Aprendiz->Taller->find('list');
		$locales = $this->Aprendiz->Local->find('list');
		$this->set(compact('talleres', 'locales'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aprendiz->save($this->request->data)) {
				$this->Session->setFlash(__('The aprendiz has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aprendiz->read(null, $id);
		}
		$talleres = $this->Aprendiz->Taller->find('list');
		$locales = $this->Aprendiz->Local->find('list');
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
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		if ($this->Aprendiz->delete()) {
			$this->Session->setFlash(__('Aprendiz deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aprendiz was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
