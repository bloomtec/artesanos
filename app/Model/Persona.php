<?php
App::uses('AppModel', 'Model');
/**
 * Persona Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 * @property Item $Item
 */
class Persona extends AppModel {
	/**
	 * Comportamientos
	 * @var array
	 */
	public $actsAs = array('Auditable');
	/**
	 * Campos virtuales
	 * @var array
	 */
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
	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
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
		'per_is_cedula' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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


	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'item_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
