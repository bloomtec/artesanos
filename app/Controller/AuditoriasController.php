<?php
App::uses('AppController', 'Controller');
/**
 * Auditorias Controller
 *
 * @property Auditoria $Auditoria
 */
class AuditoriasController extends AppController {

	/**
	 * Listado de auditorías
	 *
	 * @return void
	 */
	public function index() {
		$this -> Auditoria -> recursive = 0;
		$this -> set('auditorias', $this -> paginate());
	}

	/**
	 * Ver una auditoría
	 *
	 * @param int $id ID de la auditoría
	 * @return void
	 */
	public function view($id) {
		$this -> Auditoria -> id = $id;
		if (!$this -> Auditoria -> exists()) {
			throw new NotFoundException(__('Invalid auditoria'));
		}
		$this -> set('auditoria', $this -> Auditoria -> read(null, $id));
	}

}
