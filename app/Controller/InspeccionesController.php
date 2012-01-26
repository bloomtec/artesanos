<?php
App::uses('AppController', 'Controller');
/**
 * Inspecciones Controller
 *
 * @property Inspeccion $Inspeccion
 */
class InspeccionesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Inspeccion->recursive = 0;
		$this->set('inspecciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Inspeccion->id = $id;
		if (!$this->Inspeccion->exists()) {
			throw new NotFoundException(__('Invalid inspeccion'));
		}
		$this->set('inspeccion', $this->Inspeccion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Inspeccion->create();
			if ($this->Inspeccion->save($this->request->data)) {
				$this->Session->setFlash(__('The inspeccion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inspeccion could not be saved. Please, try again.'),'crud/error');
			}
		}
		$usuarios = $this->Inspeccion->Usuario->find('list');
		$artesanos = $this->Inspeccion->Artesano->find('list');
		$talleres = $this->Inspeccion->Taller->find('list');
		$locales = $this->Inspeccion->Local->find('list');
		$this->set(compact('usuarios', 'artesanos', 'talleres', 'locales'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Inspeccion->id = $id;
		if (!$this->Inspeccion->exists()) {
			throw new NotFoundException(__('Invalid inspeccion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Inspeccion->save($this->request->data)) {
				$this->Session->setFlash(__('The inspeccion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inspeccion could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Inspeccion->read(null, $id);
		}
		$usuarios = $this->Inspeccion->Usuario->find('list');
		$artesanos = $this->Inspeccion->Artesano->find('list');
		$talleres = $this->Inspeccion->Taller->find('list');
		$locales = $this->Inspeccion->Local->find('list');
		$this->set(compact('usuarios', 'artesanos', 'talleres', 'locales'));
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
		$this->Inspeccion->id = $id;
		if (!$this->Inspeccion->exists()) {
			throw new NotFoundException(__('Invalid inspeccion'));
		}
		if ($this->Inspeccion->delete()) {
			$this->Session->setFlash(__('Inspeccion deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inspeccion was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
