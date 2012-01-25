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
				$this->Session->setFlash(__('The ubicacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'),'crud/error');
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
				$this->Session->setFlash(__('The ubicacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubicacion could not be saved. Please, try again.'),'crud/error');
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
			$this->Session->setFlash(__('Ubicacion deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ubicacion was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
