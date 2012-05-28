<?php
App::uses('AppController', 'Controller');
/**
 * Trabajadores Controller
 *
 * @property Trabajador $Trabajador
 */
class TrabajadoresController extends AppController {

	/**
	 * Definir características que se requieren globalmente por esta clase.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getData');
	}

	/**
	 * Obtener la información correspondiente a un trabajador
	 *
	 * @param string $cedula ID del trabajador que se quiere tener su información
	 * @return Arreglo codificado en JSON con la información del trabajador
	 */
	public function getData($cedula) {
		$this -> layout = 'ajax';
		if ($cedula) {
			$trabajador = $this -> Trabajador -> find('first', array('conditions' => array('Trabajador.tra_cedula' => $cedula)));
			if ($trabajador) {
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
