<?php
App::uses('AppController', 'Controller');
/**
 * Valores Controller
 *
 * @property Valor $Valor
 */
class ValoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Valor->recursive = 0;
		$this->set('valores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Valor->id = $id;
		if (!$this->Valor->exists()) {
			throw new NotFoundException(__('Invalid valor'));
		}
		$this->set('valor', $this->Valor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Valor->create();
			if ($this->Valor->save($this->request->data)) {
				$this->Session->setFlash(__('The valor has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The valor could not be saved. Please, try again.'),'crud/error');
			}
		}
		$parametrosInformativos = $this->Valor->ParametrosInformativo->find('list');
		$this->set(compact('parametrosInformativos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Valor->id = $id;
		if (!$this->Valor->exists()) {
			throw new NotFoundException(__('Invalid valor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Valor->save($this->request->data)) {
				$this->Session->setFlash(__('The valor has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The valor could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Valor->read(null, $id);
		}
		$parametrosInformativos = $this->Valor->ParametrosInformativo->find('list');
		$this->set(compact('parametrosInformativos'));
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
		$this->Valor->id = $id;
		if (!$this->Valor->exists()) {
			throw new NotFoundException(__('Invalid valor'));
		}
		if ($this->Valor->delete()) {
			$this->Session->setFlash(__('Valor deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Valor was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
