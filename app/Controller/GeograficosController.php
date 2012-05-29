<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class GeograficosController extends AppController {

	/**
	 * Listado de las opciones geográficas
	 *
	 * @return void
	 */
	public function index() {
		$provincias = $this -> requestAction('/provincias/getProvincias');
		$cantones = $this -> requestAction('/cantones/getCantones');
		$ciudades = $this -> requestAction('/ciudades/getCiudades');
		$sectores = $this -> requestAction('/sectores/getSectores');
		$parroquias = $this -> requestAction('/parroquias/getParroquias');
		$this -> set(compact('provincias', 'cantones', 'ciudades', 'sectores', 'parroquias'));
	}

}
