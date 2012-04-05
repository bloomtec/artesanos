<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 * @property Persona $Persona
 */
class Item extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'items';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ite_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ite_codigo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ite_is_activo_fijo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ite_cantidad' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'EgresosDeInventario' => array(
			'className' => 'EgresosDeInventario',
			'joinTable' => 'egresos_de_inventarios_items',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'egresos_de_inventario_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'IngresosDeInventario' => array(
			'className' => 'IngresosDeInventario',
			'joinTable' => 'ingresos_de_inventarios_items',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'ingresos_de_inventario_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Persona' => array(
			'className' => 'Persona',
			'joinTable' => 'items_personas',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'persona_id',
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
