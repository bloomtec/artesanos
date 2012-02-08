<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class GeograficosController extends AppController {
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {}

}
