<?php
App::uses('AppModel', 'Model');
/**
 * Archivo Model
 *
 */
class Archivo extends AppModel {
	
	public $actsAs = array('Auditable');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';
}
