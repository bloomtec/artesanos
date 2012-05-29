<?php
App::uses('AppController', 'Controller');
/**
 * Feriados Controller
 *
 * @property Feriado $Feriado
 */
class FeriadosController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('esFechaValida', 'anadirDiasValidosFecha');
	}
	
	/**
	 * Agregar días válidos a una fecha especifica
	 * @param date $fecha Fecha inicial
	 * @param int $dias Dias que se le añadirán a $fecha
	 * @return La fecha codificada en JSON con los días extras
	 */
	public function anadirDiasValidosFecha($fecha, $dias) {
		if($fecha && $dias) {
			// Fecha de expiración más treinta días habiles
			for($i = $dias - 1; $i > 0; $i -= 1) {
				do {
					$dias_sumados = 1;
					$fecha = strtotime("+$dias_sumados day", strtotime($fecha));
					$fecha = date('Y-m-d', $fecha);
				} while(!$this -> esFechaValida($fecha));
			}
			echo json_encode($fecha);
		} else {
			echo json_encode(false);
		}
		exit(0);
	}
	
	/**
	 * Verificar si una fecha es válida (no es feriado, sabado o domingo)
	 * @param date $fecha La fecha a verificar
	 * @return true o false acorde si $fecha es válido o no
	 */
	public function esFechaValida($fecha) {
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
	
	/**
	 * Verificar si una fecha es día feriado
	 * @param date $fecha La fecha a verificar
	 * @return true o false acorde si $fecha es feriado o no
	 */
	private function esDiaFeriado($fecha) {
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
	
	/**
	 * Verificar si una fecha es sabado
	 * @param date $fecha La fecha a verificar
	 * @return true o false acorde si $fecha es sabado o no
	 */
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
	
	/**
	 * Verificar si una fecha es domingo
	 * @param date $fecha La fecha a verificar
	 * @return true o false acorde si $fecha es domingo o no
	 */
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
	 * Listado de fechas feriadas
	 *
	 * @return void
	 */
	public function index() {
		$this -> Feriado -> recursive = 0;
		$this -> set('feriados', $this -> paginate());
	}

	/**
	 * Agregar fecha feriada
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
	 * Modificar fecha feriada
	 *
	 * @param int $id ID de la fecha feriada
	 * @return void
	 */
	public function edit($id) {
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
	 * Eliminar fecha feriada
	 *
	 * @param int $id ID de la fecha feriada
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
