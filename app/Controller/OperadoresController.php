<?php
App::uses('AppController', 'Controller');
/**
 * Operadores Controller
 *
 * @property Operador $Operador
 */
class OperadoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Operador->recursive = 0;
		$this->set('operadores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Operador->id = $id;
		if (!$this->Operador->exists()) {
			throw new NotFoundException(__('Invalid operador'));
		}
		$this->set('operador', $this->Operador->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Operador->create();
			if ($this->Operador->save($this->request->data)) {
				$this->Session->setFlash(__('The operador has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operador could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->Operador->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Operador->id = $id;
		if (!$this->Operador->exists()) {
			throw new NotFoundException(__('Invalid operador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Operador->save($this->request->data)) {
				$this->Session->setFlash(__('The operador has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operador could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Operador->read(null, $id);
		}
		$talleres = $this->Operador->Taller->find('list');
		$this->set(compact('talleres'));
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
		$this->Operador->id = $id;
		if (!$this->Operador->exists()) {
			throw new NotFoundException(__('Invalid operador'));
		}
		if ($this->Operador->delete()) {
			$this->Session->setFlash(__('Operador deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Operador was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
