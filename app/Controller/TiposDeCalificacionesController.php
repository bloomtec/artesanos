<?php
App::uses('AppController', 'Controller');
/**
 * TiposDeCalificaciones Controller
 *
 * @property TiposDeCalificacion $TiposDeCalificacion
 */
class TiposDeCalificacionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre');
	}
	
	public function getNombre($id) {
		$tipo_de_calificacion = $this -> TiposDeCalificacion -> read('tip_nombre', $id);
		return $tipo_de_calificacion['TiposDeCalificacion']['tip_nombre'];
	}

}
