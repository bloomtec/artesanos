<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class EquiposController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Equipo->recursive = 0;
		$this->set('equipos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		$this->set('equipo', $this->Equipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipo->create();
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('The equipo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipo could not be saved. Please, try again.'),'crud/error');
			}
		}
		$locales = $this->Equipo->Local->find('list');
		$talleres = $this->Equipo->Taller->find('list');
		$this->set(compact('locales', 'talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('The equipo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipo could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Equipo->read(null, $id);
		}
		$locales = $this->Equipo->Local->find('list');
		$talleres = $this->Equipo->Taller->find('list');
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
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		if ($this->Equipo->delete()) {
			$this->Session->setFlash(__('Equipo deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Equipo was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
