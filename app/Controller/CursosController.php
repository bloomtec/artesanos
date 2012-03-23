<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 */
class CursosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$this->set('curso', $this->Curso->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The curso has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curso could not be saved. Please, try again.'),'crud/error');
			}
		}
		$solicitudes = $this->Curso->Solicitud->find('list');
		$instructores = $this->Curso->Instructor->find('list');
		$alumnos = $this->Curso->Alumno->find('list');
		$this->set(compact('solicitudes', 'instructores', 'alumnos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The curso has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curso could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Curso->read(null, $id);
		}
		$solicitudes = $this->Curso->Solicitud->find('list');
		$instructores = $this->Curso->Instructor->find('list');
		$alumnos = $this->Curso->Alumno->find('list');
		$this->set(compact('solicitudes', 'instructores', 'alumnos'));
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
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this->Curso->delete()) {
			$this->Session->setFlash(__('Curso deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Curso was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
