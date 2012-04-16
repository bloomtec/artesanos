<?php
App::uses('AppModel', 'Model');

/**
 * Provincia Model
 *
 * @property Canton $Canton
 * @property Local $Local
 * @property Taller $Taller
 */
class Provincia extends AppModel {
	
	public $actsAs = array('Auditable');
	
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'pro_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'pro_nombre' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'provincia_id',
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
		'Local' => array(
			'className' => 'Local',
			'foreignKey' => 'provincia_id',
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
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'provincia_id',
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
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'provincia_id',
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
		'JuntasProvincial' => array(
			'className' => 'JuntasProvincial',
			'foreignKey' => 'provincia_id',
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
		'Instructores' => array(
			'className' => 'Instructores',
			'foreignKey' => 'provincia_id',
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
		'Artesano' => array(
			'className' => 'Artesano',
			'foreignKey' => 'provincia_id',
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
		'Factura' => array(
			'className' => 'Factura',
			'foreignKey' => 'provincia_id',
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
