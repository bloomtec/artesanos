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
		$this -> Auth -> allow('reporteArtesanos');
	}
	
	public function reporteArtesanos($conditions = null) {
		$this -> DatosPersonal -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array(
			'conditions' => $conditions,
			'order' => array('DatosPersonal.dat_nombres' => 'ASC')
		);
		$artesanos = $this -> paginate();
		foreach($artesanos as $key => $artesano) {
			$tmp = $this -> DatosPersonal -> Calificacion -> Artesano -> read('art_cedula', $artesano['Calificacion']['artesano_id']);
			$artesanos[$key]['DatosPersonal']['dat_cedula'] = $tmp['Artesano']['art_cedula'];
		}
		$this -> set('artesanos', $artesanos);
	}

}