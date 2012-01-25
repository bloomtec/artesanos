<?php
App::uses('AppController', 'Controller');
/**
 * Talleres Controller
 *
 * @property Taller $Taller
 */
class TalleresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		$this->set('taller', $this->Taller->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Taller->create();
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash(__('The taller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taller could not be saved. Please, try again.'));
			}
		}
		$artesanos = $this->Taller->Artesano->find('list');
		$this->set(compact('artesanos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash(__('The taller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taller could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$artesanos = $this->Taller->Artesano->find('list');
		$this->set(compact('artesanos'));
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
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		if ($this->Taller->delete()) {
			$this->Session->setFlash(__('Taller deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Taller was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		$this->set('taller', $this->Taller->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Taller->create();
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash(__('The taller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taller could not be saved. Please, try again.'));
			}
		}
		$artesanos = $this->Taller->Artesano->find('list');
		$this->set(compact('artesanos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash(__('The taller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taller could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$artesanos = $this->Taller->Artesano->find('list');
		$this->set(compact('artesanos'));
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
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException(__('Invalid taller'));
		}
		if ($this->Taller->delete()) {
			$this->Session->setFlash(__('Taller deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Taller was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
