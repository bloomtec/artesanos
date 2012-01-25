<?php
App::uses('AppModel', 'Model');
/**
 * Rol Model
 *
 * @property Usuario $Usuario
 */
class Rol extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'rol_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
