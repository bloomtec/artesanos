<?php
App::uses('AppController', 'Controller');
/**
 * Sectores Controller
 *
 * @property Sector $Sector
 */
class SectoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sector->recursive = 0;
		$this->set('sectores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		$this->set('sector', $this->Sector->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sector->create();
			if ($this->Sector->save($this->request->data)) {
				$this->Session->setFlash(__('The sector has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sector could not be saved. Please, try again.'));
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
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sector->save($this->request->data)) {
				$this->Session->setFlash(__('The sector has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sector could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Sector->read(null, $id);
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
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		if ($this->Sector->delete()) {
			$this->Session->setFlash(__('Sector deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sector was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Sector->recursive = 0;
		$this->set('sectores', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		$this->set('sector', $this->Sector->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sector->create();
			if ($this->Sector->save($this->request->data)) {
				$this->Session->setFlash(__('The sector has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sector could not be saved. Please, try again.'));
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
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sector->save($this->request->data)) {
				$this->Session->setFlash(__('The sector has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sector could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Sector->read(null, $id);
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
		$this->Sector->id = $id;
		if (!$this->Sector->exists()) {
			throw new NotFoundException(__('Invalid sector'));
		}
		if ($this->Sector->delete()) {
			$this->Session->setFlash(__('Sector deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sector was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
