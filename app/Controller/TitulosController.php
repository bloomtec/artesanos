<?php
App::uses('AppController', 'Controller');
/**
 * Titulos Controller
 *
 * @property Titulo $Titulo
 */
class TitulosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Titulo->recursive = 0;
		$this->set('titulos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		$this->set('titulo', $this->Titulo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Titulo->create();
			if ($this->Titulo->save($this->request->data)) {
				$this->Session->setFlash(__('The titulo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The titulo could not be saved. Please, try again.'),'crud/error');
			}
		}
		$ramas = $this->Titulo->Rama->find('list');
		$this->set(compact('ramas'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Titulo->save($this->request->data)) {
				$this->Session->setFlash(__('The titulo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The titulo could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Titulo->read(null, $id);
		}
		$ramas = $this->Titulo->Rama->find('list');
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
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		if ($this->Titulo->delete()) {
			$this->Session->setFlash(__('Titulo deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Titulo was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
