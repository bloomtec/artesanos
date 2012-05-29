<?php
App::uses('AppController', 'Controller');
/**
 * TiposDeCalificaciones Controller
 *
 * @property TiposDeCalificacion $TiposDeCalificacion
 */
class TiposDeCalificacionesController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre');
	}
	
	/**
	 * Obtener el nombre de un tipo de calificacion.
	 *
	 * @param int $id ID del tipo de calificacion que se quiere obtener el nombre.
	 * @return Nombre del tipo de calificacion cuyo ID fue pasado por parámetro.
	 */
	public function getNombre($id) {
		$tipo_de_calificacion = $this -> TiposDeCalificacion -> read('tip_nombre', $id);
		return $tipo_de_calificacion['TiposDeCalificacion']['tip_nombre'];
	}

}
