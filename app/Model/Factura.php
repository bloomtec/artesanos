<?php
App::uses('AppModel', 'Model');
/**
 * Factura Model
 *
 * @property Provincia $Provincia
 * @property Canton $Canton
 * @property Ciudad $Ciudad
 * @property VentasEspecie $VentasEspecie
 */
class Factura extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fac_numero';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'canton_id',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'factura_id',
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
