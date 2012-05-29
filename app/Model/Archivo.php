<?php
App::uses('AppModel', 'Model');
/**
 * Archivo Model
 *
 */
class Archivo extends AppModel {
	/**
	 * Comportamientos
	 * @var array
	 */
	public $actsAs = array('Auditable');
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'nombre';
}
