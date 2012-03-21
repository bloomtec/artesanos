<?php
App::uses('AppModel', 'Model');
/**
 * IngresosDeInventario Model
 *
 * @property Proveedor $Proveedor
 * @property Ciudad $Ciudad
 * @property Persona $Persona
 * @property Item $Item
 */
class IngresosDeInventario extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ing_archivo_soporte' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe seleccionar un archivo de soporte',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'proveedor_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe seleccionar un proveedor',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'persona_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe seleccionar una persona',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Proveedor' => array(
			'className' => 'Proveedor',
			'foreignKey' => 'proveedor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Persona' => array(
			'className' => 'Persona',
			'foreignKey' => 'persona_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
			'joinTable' => 'ingresos_de_inventarios_items',
			'foreignKey' => 'ingresos_de_inventario_id',
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
