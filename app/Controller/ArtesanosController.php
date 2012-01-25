<?php
App::uses('AppController', 'Controller');
/**
 * Artesanos Controller
 *
 * @property Artesano $Artesano
 */
class ArtesanosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Artesano->recursive = 0;
		$this->set('artesanos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		$this->set('artesano', $this->Artesano->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artesano->create();
			if ($this->Artesano->save($this->request->data)) {
				$this->Session->setFlash(__('The artesano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artesano could not be saved. Please, try again.'));
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
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artesano->save($this->request->data)) {
				$this->Session->setFlash(__('The artesano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artesano could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Artesano->read(null, $id);
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
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		if ($this->Artesano->delete()) {
			$this->Session->setFlash(__('Artesano deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artesano was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Artesano->recursive = 0;
		$this->set('artesanos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		$this->set('artesano', $this->Artesano->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Artesano->create();
			if ($this->Artesano->save($this->request->data)) {
				$this->Session->setFlash(__('The artesano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artesano could not be saved. Please, try again.'));
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
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artesano->save($this->request->data)) {
				$this->Session->setFlash(__('The artesano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artesano could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Artesano->read(null, $id);
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
		$this->Artesano->id = $id;
		if (!$this->Artesano->exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		if ($this->Artesano->delete()) {
			$this->Session->setFlash(__('Artesano deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artesano was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
