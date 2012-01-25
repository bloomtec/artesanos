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
				$this->Session->setFlash(__('The rama has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'),'crud/error');
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
				$this->Session->setFlash(__('The rama has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rama could not be saved. Please, try again.'),'crud/error');
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
			$this->Session->setFlash(__('Rama deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rama was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
