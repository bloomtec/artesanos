<?php
App::uses('AppController', 'Controller');
/**
 * Feriados Controller
 *
 * @property Feriado $Feriado
 */
class FeriadosController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('esFechaValida', 'anadirDiasValidosFecha');
	}
	
	public function anadirDiasValidosFecha($fecha = null, $dias = null) {
		// Fecha de expiración más treinta días habiles
		for($i = $dias; $i > 0; $i -= 1) {
			do {
				$dias_sumados = 1;
				$fecha = strtotime("+$dias_sumados day", strtotime($fecha));
				$fecha = date('Y-m-d', $fecha);
			} while(!$this -> esFechaValida($fecha));
		}
		echo $fecha;
		exit(0);
	}
	
	public function esFechaValida($fecha = null) {
		if($fecha) {
			if($this -> esDiaFeriado($fecha) || $this -> esSabado($fecha) || $this -> esDomingo($fecha)) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	private function esDiaFeriado($fecha = null) {
		if($fecha) {
			$conditions = array('Feriado.fer_fecha' => $fecha);
			if($this -> Feriado -> find('first', array('conditions' => $conditions))) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	private function esSabado($fecha = null) {
		if($fecha) {
			if(date('N', strtotime(date($fecha))) == 6) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	private function esDomingo($fecha = null) {
		if($fecha) {
			if(date('N', strtotime(date($fecha))) == 7) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Feriado -> recursive = 0;
		$this -> set('feriados', $this -> paginate());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Feriado -> create();
			if ($this -> Feriado -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la fecha'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la fecha. Por favor, intente de nuevo.'), 'crud/error');
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
		$this -> Feriado -> id = $id;
		if (!$this -> Feriado -> exists()) {
			throw new NotFoundException(__('Fecha no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Feriado -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la fecha'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la fecha. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Feriado -> read(null, $id);
		}
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Feriado -> id = $id;
		if (!$this -> Feriado -> exists()) {
			throw new NotFoundException(__('Fecha no válida'));
		}
		if ($this -> Feriado -> delete()) {
			$this -> Session -> setFlash(__('Se ha eliminado la fecha'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se ha eliminado la fecha'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
