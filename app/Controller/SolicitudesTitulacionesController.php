<?php
App::uses('AppController', 'Controller');
/**
 * SolicitudesTitulaciones Controller
 *
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 */
class SolicitudesTitulacionesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SolicitudesTitulacion->recursive = 0;
		$this->set('solicitudesTitulaciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SolicitudesTitulacion->id = $id;
		if (!$this->SolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		$this->set('solicitudesTitulacion', $this->SolicitudesTitulacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SolicitudesTitulacion->create();
			if ($this->SolicitudesTitulacion->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitudes titulacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitudes titulacion could not be saved. Please, try again.'),'crud/error');
			}
		}
		$estadosSolicitudesTitulaciones = $this->SolicitudesTitulacion->EstadosSolicitudesTitulacion->find('list');
		$titulos = $this->SolicitudesTitulacion->Titulo->find('list');
		$tiposSolicitudesTitulaciones = $this->SolicitudesTitulacion->TiposSolicitudesTitulacion->find('list');
		$artesanos = $this->SolicitudesTitulacion->Artesano->find('list');
		$this->set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SolicitudesTitulacion->id = $id;
		if (!$this->SolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SolicitudesTitulacion->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitudes titulacion has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitudes titulacion could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->SolicitudesTitulacion->read(null, $id);
		}
		$estadosSolicitudesTitulaciones = $this->SolicitudesTitulacion->EstadosSolicitudesTitulacion->find('list');
		$titulos = $this->SolicitudesTitulacion->Titulo->find('list');
		$tiposSolicitudesTitulaciones = $this->SolicitudesTitulacion->TiposSolicitudesTitulacion->find('list');
		$artesanos = $this->SolicitudesTitulacion->Artesano->find('list');
		$this->set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
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
		$this->SolicitudesTitulacion->id = $id;
		if (!$this->SolicitudesTitulacion->exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		if ($this->SolicitudesTitulacion->delete()) {
			$this->Session->setFlash(__('Solicitudes titulacion deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Solicitudes titulacion was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
