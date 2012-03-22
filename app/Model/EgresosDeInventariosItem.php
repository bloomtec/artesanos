<?php
App::uses('AppModel', 'Model');
/**
 * EgresosDeInventariosItem Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property Item $Item
 */
class EgresosDeInventariosItem extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'egresos_de_inventarios_items';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'egresos_de_inventario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'item_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'egr_cantidad' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EgresosDeInventario' => array(
			'className' => 'EgresosDeInventario',
			'foreignKey' => 'egresos_de_inventario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
