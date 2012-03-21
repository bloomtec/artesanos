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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
