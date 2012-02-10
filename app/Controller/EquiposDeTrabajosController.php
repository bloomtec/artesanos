<?php
App::uses('AppController', 'Controller');
/**
 * EquiposDeTrabajos Controller
 *
 * @property EquiposDeTrabajo $EquiposDeTrabajo
 */
class EquiposDeTrabajosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EquiposDeTrabajo->recursive = 0;
		$this->set('equiposDeTrabajos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EquiposDeTrabajo->id = $id;
		if (!$this->EquiposDeTrabajo->exists()) {
			throw new NotFoundException(__('Invalid equipos de trabajo'));
		}
		$this->set('equiposDeTrabajo', $this->EquiposDeTrabajo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EquiposDeTrabajo->create();
			if ($this->EquiposDeTrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The equipos de trabajo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipos de trabajo could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->EquiposDeTrabajo->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EquiposDeTrabajo->id = $id;
		if (!$this->EquiposDeTrabajo->exists()) {
			throw new NotFoundException(__('Invalid equipos de trabajo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EquiposDeTrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The equipos de trabajo has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipos de trabajo could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->EquiposDeTrabajo->read(null, $id);
		}
		$talleres = $this->EquiposDeTrabajo->Taller->find('list');
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
		$this->EquiposDeTrabajo->id = $id;
		if (!$this->EquiposDeTrabajo->exists()) {
			throw new NotFoundException(__('Invalid equipos de trabajo'));
		}
		if ($this->EquiposDeTrabajo->delete()) {
			$this->Session->setFlash(__('Equipos de trabajo deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Equipos de trabajo was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
