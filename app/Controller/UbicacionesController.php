<?php
App::uses('AppController', 'Controller');
/**
 * Ubicaciones Controller
 *
 * @property Ubicacion $Ubicacion
 */
class UbicacionesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubicacion->recursive = 0;
		$this->set('ubicaciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		$this->set('ubicacion', $this->Ubicacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ubicacion->create();
			if ($this->Ubicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The ubicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'));
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
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ubicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The ubicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ubicacion->read(null, $id);
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
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		if ($this->Ubicacion->delete()) {
			$this->Session->setFlash(__('Ubicacion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubicacion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Ubicacion->recursive = 0;
		$this->set('ubicaciones', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		$this->set('ubicacion', $this->Ubicacion->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ubicacion->create();
			if ($this->Ubicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The ubicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'));
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
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ubicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The ubicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ubicacion->read(null, $id);
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
		$this->Ubicacion->id = $id;
		if (!$this->Ubicacion->exists()) {
			throw new NotFoundException(__('Invalid ubicacion'));
		}
		if ($this->Ubicacion->delete()) {
			$this->Session->setFlash(__('Ubicacion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubicacion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
