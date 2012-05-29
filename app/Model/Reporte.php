<?php
App::uses('AppModel', 'Model');
App::uses('Artesano', 'Model');
App::uses('DatosPersonal', 'Model');
App::uses('Calificacion', 'Model');
/**
 * Reporte Model
 */
class Reporte extends AppModel {
	/**
	 * Nombre del modelo
	 * @var string
	 */
	public $name = 'Reporte';
	/**
	 * Utilizar tabla
	 * @var bool
	 */
	public $useTable = false;
	
}
