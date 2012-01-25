<?php
App::uses('AppController', 'Controller');
/**
 * Locales Controller
 *
 * @property Local $Local
 */
class LocalesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Local->recursive = 0;
		$this->set('locales', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Local->id = $id;
		if (!$this->Local->exists()) {
			throw new NotFoundException(__('Invalid local'));
		}
		$this->set('local', $this->Local->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Local->create();
			if ($this->Local->save($this->request->data)) {
				$this->Session->setFlash(__('The local has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The local could not be saved. Please, try again.'),'crud/error');
			}
		}
		$artesanos = $this->Local->Artesano->find('list');
		$this->set(compact('artesanos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Local->id = $id;
		if (!$this->Local->exists()) {
			throw new NotFoundException(__('Invalid local'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Local->save($this->request->data)) {
				$this->Session->setFlash(__('The local has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The local could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Local->read(null, $id);
		}
		$artesanos = $this->Local->Artesano->find('list');
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
		$this->Local->id = $id;
		if (!$this->Local->exists()) {
			throw new NotFoundException(__('Invalid local'));
		}
		if ($this->Local->delete()) {
			$this->Session->setFlash(__('Local deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Local was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
