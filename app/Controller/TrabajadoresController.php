<?php
App::uses('AppController', 'Controller');
/**
 * Trabajadores Controller
 *
 * @property Trabajador $Trabajador
 */
class TrabajadoresController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getData');
	}

	public function getData($cedula = null) {
		if($cedula) {
			
		} else {
			echo array();
		}
	}

}
