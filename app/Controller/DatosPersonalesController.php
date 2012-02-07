<?php
App::uses('AppController', 'Controller');
/**
 * DatosPersonales Controller
 *
 * @property DatosPersonal $DatosPersonal
 */
class DatosPersonalesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DatosPersonal->recursive = 0;
		$this->set('datosPersonales', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DatosPersonal->id = $id;
		if (!$this->DatosPersonal->exists()) {
			throw new NotFoundException(__('Invalid datos personal'));
		}
		$this->set('datosPersonal', $this->DatosPersonal->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DatosPersonal->create();
			if ($this->DatosPersonal->save($this->request->data)) {
				$this->Session->setFlash(__('The datos personal has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datos personal could not be saved. Please, try again.'),'crud/error');
			}
		}
		$calificaciones = $this->DatosPersonal->Calificacion->find('list');
		$this->set(compact('calificaciones'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->DatosPersonal->id = $id;
		if (!$this->DatosPersonal->exists()) {
			throw new NotFoundException(__('Invalid datos personal'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DatosPersonal->save($this->request->data)) {
				$this->Session->setFlash(__('The datos personal has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datos personal could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->DatosPersonal->read(null, $id);
		}
		$calificaciones = $this->DatosPersonal->Calificacion->find('list');
		$this->set(compact('calificaciones'));
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
		$this->DatosPersonal->id = $id;
		if (!$this->DatosPersonal->exists()) {
			throw new NotFoundException(__('Invalid datos personal'));
		}
		if ($this->DatosPersonal->delete()) {
			$this->Session->setFlash(__('Datos personal deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Datos personal was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
