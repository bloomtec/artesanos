<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class DatosPersonalesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('reporteCalificacionesArtesano', 'getNombreArtesano');
	}

	public function reporteArtesanos() {
		$this -> DatosPersonal -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('DatosPersonal.dat_nombres' => 'ASC'));
		$artesanos = $this -> paginate();
		foreach ($artesanos as $key => $artesano) {
			$tmp = $this -> DatosPersonal -> Calificacion -> Artesano -> read('art_cedula', $artesano['Calificacion']['artesano_id']);
			$artesanos[$key]['DatosPersonal']['dat_cedula'] = $tmp['Artesano']['art_cedula'];
		}
		$this -> set('artesanos', $artesanos);
	}
	
	public function getNombreArtesano($cal_id) {
		$datos = $this -> DatosPersonal -> find('first', array('conditions' => array('DatosPersonal.calificacion_id' => $cal_id), 'order' => array('DatosPersonal.created' => 'DESC')));
		if(!empty($datos)) {
			return $datos['DatosPersonal']['dat_nombres'] . ' ' . $datos['DatosPersonal']['dat_apellido_paterno'] . ' ' . $datos['DatosPersonal']['dat_apellido_materno'];
		} else {
			return '<b>:: eliminado ::</b>';
		}
	}

}
