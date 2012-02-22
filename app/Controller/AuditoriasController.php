<?php
App::uses('AppController', 'Controller');
/**
 * Auditorias Controller
 *
 * @property Auditoria $Auditoria
 */
class AuditoriasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Auditoria->recursive = 0;
		$this->set('auditorias', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Auditoria->id = $id;
		if (!$this->Auditoria->exists()) {
			throw new NotFoundException(__('Invalid auditoria'));
		}
		$this->set('auditoria', $this->Auditoria->read(null, $id));
	}
	
}
