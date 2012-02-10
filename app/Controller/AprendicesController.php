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
				$this->Session->setFlash(__('The aprendiz has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->Aprendiz->Taller->find('list');
		$this->set(compact('talleres'));
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
				$this->Session->setFlash(__('The aprendiz has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aprendiz could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Aprendiz->read(null, $id);
		}
		$talleres = $this->Aprendiz->Taller->find('list');
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
		$this->Aprendiz->id = $id;
		if (!$this->Aprendiz->exists()) {
			throw new NotFoundException(__('Invalid aprendiz'));
		}
		if ($this->Aprendiz->delete()) {
			$this->Session->setFlash(__('Aprendiz deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Aprendiz was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
