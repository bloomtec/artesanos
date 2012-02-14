<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class ReportesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('*');
	}
	
	public function reporteArtesanos() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
			$conditions = array();
			$this -> Session -> delete('conditions');
			$this -> Session -> write('conditions', $conditions);
			$this -> redirect(array('controller' => 'datos_personales', 'action' => 'reporteArtesanos'));
		}
	}
	
	public function reporteCalificacionesOperador() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}
	
	public function reporteCalificacionesArtesano() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}
	
	public function reporteInspecciones() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}
	
	public function reporteEstadisticoCalificaciones() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}

}