<?php
App::uses('AppModel', 'Model');
/**
 * Persona Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 */
class Persona extends AppModel {
	
	public $virtualFields = array(
		'datos_completos' => 'CONCAT(Persona.per_documento_de_identidad, " - ", Persona.per_nombres, " ", Persona.per_apellidos)'
	);
	
/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'per_cedula_de_identidad';
	public $displayField = 'datos_completos';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $validate = array(
		'per_nombres' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'per_apellidos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'per_documento_de_identidad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
