<?php
App::uses('AppController', 'Controller');
/**
 * TiposSolicitudesTitulaciones Controller
 *
 * @property TiposSolicitudesTitulacion $TiposSolicitudesTitulacion
 */
class TiposSolicitudesTitulacionesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TiposSolicitudesTitulacion->recursive = 0;
		$this->set('tiposSolicitudesTitulaciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TiposSolicitudesTitulacion->id = $id;
		if (!$this->TiposSolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid tipos solicitudes titulacion'));
		}
		$this->set('tiposSolicitudesTitulacion', $this->TiposSolicitudesTitulacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposSolicitudesTitulacion->create();
			if ($this->TiposSolicitudesTitulacion->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos solicitudes titulacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos solicitudes titulacion could not be saved. Please, try again.'),'crud/error');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TiposSolicitudesTitulacion->id = $id;
		if (!$this->TiposSolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid tipos solicitudes titulacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TiposSolicitudesTitulacion->save($this->request->data)) {
				$this->Session->setFlash(__('The tipos solicitudes titulacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipos solicitudes titulacion could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->TiposSolicitudesTitulacion->read(null, $id);
		}
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
		$this->TiposSolicitudesTitulacion->id = $id;
		if (!$this->TiposSolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid tipos solicitudes titulacion'));
		}
		if ($this->TiposSolicitudesTitulacion->delete()) {
			$this->Session->setFlash(__('Tipos solicitudes titulacion deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tipos solicitudes titulacion was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
