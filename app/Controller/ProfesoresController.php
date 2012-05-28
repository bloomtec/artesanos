<?php
App::uses('AppController', 'Controller');
/**
 * Profesores Controller
 *
 * @property Profesor $Profesor
 */
class ProfesoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Profesor->recursive = 0;
		$this->set('profesores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Profesor->id = $id;
		if (!$this->Profesor->exists()) {
			throw new NotFoundException(__('Profesor no válido'));
		}
		$this->set('profesor', $this->Profesor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profesor->create();
			if ($this->Profesor->save($this->request->data)) {
				$this->Session->setFlash(__('El profesor ha sido guardado'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar el Profesor. Por favor, intente de nuevo.'),'crud/error');
			}
		}
		$tipos_de_sangre = $this -> Profesor -> getValores(2);
		$nacionalidades = $this -> Profesor -> getValores(1);
		$sexos = $this -> Profesor -> getValores(5);
		$centrosArtesanales = $this->Profesor->CentrosArtesanal->find('list');
		$this->set(compact('centrosArtesanales','sexos','tipos_de_sangre','nacionalidades'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Profesor->id = $id;
		if (!$this->Profesor->exists()) {
			throw new NotFoundException(__('Profesor no valido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Profesor->save($this->request->data)) {
				$this->Session->setFlash(__('El profesor ha sido guardado'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar el Profesor. Por favor, intente de nuevo.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Profesor->read(null, $id);
		}
		$tipos_de_sangre = $this -> Profesor -> getValores(2);
		$nacionalidades = $this -> Profesor -> getValores(1);
		$sexos = $this -> Profesor -> getValores(5);
		$centrosArtesanales = $this->Profesor->CentrosArtesanal->find('list');
		$this->set(compact('centrosArtesanales','sexos','tipos_de_sangre','nacionalidades'));
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
		$this->Profesor->id = $id;
		if (!$this->Profesor->exists()) {
			throw new NotFoundException(__('Profesor no valido'));
		}
		if ($this->Profesor->delete()) {
			$this->Session->setFlash(__('No se pudo borrar el Profesor. Por favor, intente de nuevo'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Profesor was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
