<?php
App::uses('AppController', 'Controller');
/**
 * MateriasPrimas Controller
 *
 * @property MateriasPrima $MateriasPrima
 */
class MateriasPrimasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MateriasPrima->recursive = 0;
		$this->set('materiasPrimas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MateriasPrima->id = $id;
		if (!$this->MateriasPrima->exists()) {
			throw new NotFoundException(__('Invalid materias prima'));
		}
		$this->set('materiasPrima', $this->MateriasPrima->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MateriasPrima->create();
			if ($this->MateriasPrima->save($this->request->data)) {
				$this->Session->setFlash(__('The materias prima has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The materias prima could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->MateriasPrima->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MateriasPrima->id = $id;
		if (!$this->MateriasPrima->exists()) {
			throw new NotFoundException(__('Invalid materias prima'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MateriasPrima->save($this->request->data)) {
				$this->Session->setFlash(__('The materias prima has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The materias prima could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->MateriasPrima->read(null, $id);
		}
		$talleres = $this->MateriasPrima->Taller->find('list');
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
		$this->MateriasPrima->id = $id;
		if (!$this->MateriasPrima->exists()) {
			throw new NotFoundException(__('Invalid materias prima'));
		}
		if ($this->MateriasPrima->delete()) {
			$this->Session->setFlash(__('Materias prima deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Materias prima was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
