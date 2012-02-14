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
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array(
			'conditions' => $conditions,
			'order' => array('DatosPersonal.dat_nombres' => 'ASC')
		);
		$this -> set('artesanos', $this -> paginate());
	}

}