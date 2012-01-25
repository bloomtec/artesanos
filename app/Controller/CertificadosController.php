<?php
App::uses('AppController', 'Controller');
/**
 * Certificados Controller
 *
 * @property Certificado $Certificado
 */
class CertificadosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Certificado->recursive = 0;
		$this->set('certificados', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		$this->set('certificado', $this->Certificado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Certificado->create();
			if ($this->Certificado->save($this->request->data)) {
				$this->Session->setFlash(__('The certificado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certificado could not be saved. Please, try again.'));
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
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Certificado->save($this->request->data)) {
				$this->Session->setFlash(__('The certificado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certificado could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Certificado->read(null, $id);
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
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		if ($this->Certificado->delete()) {
			$this->Session->setFlash(__('Certificado deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Certificado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Certificado->recursive = 0;
		$this->set('certificados', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		$this->set('certificado', $this->Certificado->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Certificado->create();
			if ($this->Certificado->save($this->request->data)) {
				$this->Session->setFlash(__('The certificado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certificado could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Certificado->save($this->request->data)) {
				$this->Session->setFlash(__('The certificado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certificado could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Certificado->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Certificado->id = $id;
		if (!$this->Certificado->exists()) {
			throw new NotFoundException(__('Invalid certificado'));
		}
		if ($this->Certificado->delete()) {
			$this->Session->setFlash(__('Certificado deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Certificado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
