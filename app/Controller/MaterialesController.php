<?php
App::uses('AppController', 'Controller');
/**
 * Materiales Controller
 *
 * @property Material $Material
 */
class MaterialesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Material->recursive = 0;
		$this->set('materiales', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		$this->set('material', $this->Material->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Material->create();
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'),'crud/error');
			}
		}
		$locales = $this->Material->Local->find('list');
		$talleres = $this->Material->Taller->find('list');
		$this->set(compact('locales', 'talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Material->read(null, $id);
		}
		$locales = $this->Material->Local->find('list');
		$talleres = $this->Material->Taller->find('list');
		$this->set(compact('locales', 'talleres'));
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
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->Material->delete()) {
			$this->Session->setFlash(__('Material deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Material was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
