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
		$this -> layout = 'ajax';
		if($cedula) {
			$trabajador = $this -> Trabajador -> find('first', array('conditions' => array('Trabajador.tra_cedula' => $cedula)));
			if($trabajador) {
				echo json_encode($trabajador);
			} else {
				echo array();
			}
		} else {
			echo array();
		}
		exit(0);
	}

}
