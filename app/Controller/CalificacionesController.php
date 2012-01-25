<?php
App::uses('AppController', 'Controller');
/**
 * Calificaciones Controller
 *
 * @property Calificacion $Calificacion
 */
class CalificacionesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Calificacion->recursive = 0;
		$this->set('calificaciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Calificacion->id = $id;
		if (!$this->Calificacion->exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		$this->set('calificacion', $this->Calificacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Calificacion->create();
			if ($this->Calificacion->save($this->request->data)) {
				$this->Session->setFlash(__('The calificacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calificacion could not be saved. Please, try again.'),'crud/error');
			}
		}
		$ramas = $this->Calificacion->Rama->find('list');
		$this->set(compact('ramas'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Calificacion->id = $id;
		if (!$this->Calificacion->exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Calificacion->save($this->request->data)) {
				$this->Session->setFlash(__('The calificacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calificacion could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Calificacion->read(null, $id);
		}
		$ramas = $this->Calificacion->Rama->find('list');
		$this->set(compact('ramas'));
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
		$this->Calificacion->id = $id;
		if (!$this->Calificacion->exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		if ($this->Calificacion->delete()) {
			$this->Session->setFlash(__('Calificacion deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Calificacion was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
