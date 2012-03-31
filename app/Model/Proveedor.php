<?php
App::uses('AppModel', 'Model');
/**
 * Proveedor Model
 *
 * @property IngresosDeInventario $IngresosDeInventario
 */
class Proveedor extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'pro_rut';

	public $virtualFields = array(
			'datos_completos' => 'CONCAT(Proveedor.pro_rut, " - ", Proveedor.pro_nombre_razon_social)'
		);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $validate = array(
		'pro_rut' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pro_nombre_razon_social' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pro_representante_legal' => array(
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
		'IngresosDeInventario' => array(
			'className' => 'IngresosDeInventario',
			'foreignKey' => 'proveedor_id',
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
