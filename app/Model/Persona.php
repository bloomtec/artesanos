<?php
App::uses('AppModel', 'Model');
/**
 * Persona Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 */
class Persona extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'per_cedula_de_identidad';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EgresosDeInventario' => array(
			'className' => 'EgresosDeInventario',
			'foreignKey' => 'persona_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'IngresosDeInventario' => array(
			'className' => 'IngresosDeInventario',
			'foreignKey' => 'persona_id',
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
