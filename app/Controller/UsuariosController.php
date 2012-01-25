<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'crud/error');
			}
		}
		$ciudades = $this->Usuario->Ciudad->find('list');
		$ubicaciones = $this->Usuario->Ubicacion->find('list');
		$sectores = $this->Usuario->Sector->find('list');
		$roles = $this->Usuario->Rol->find('list');
		$this->set(compact('ciudades', 'ubicaciones', 'sectores', 'roles'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
		}
		$ciudades = $this->Usuario->Ciudad->find('list');
		$ubicaciones = $this->Usuario->Ubicacion->find('list');
		$sectores = $this->Usuario->Sector->find('list');
		$roles = $this->Usuario->Rol->find('list');
		$this->set(compact('ciudades', 'ubicaciones', 'sectores', 'roles'));
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
