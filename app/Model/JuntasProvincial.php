<?php
App::uses('AppModel', 'Model');
/**
 * JuntasProvincial Model
 *
 * @property Solicitud $Solicitud
 */
class JuntasProvincial extends AppModel {
	
	public $actsAs = array('Auditable');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'jun_nombre';
	
	public $validate = array(
		'provincia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe seleccionar la provincia a la que correspone la junta',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'jun_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre para la junta',
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
		'Solicitud' => array(
			'className' => 'Solicitud',
			'foreignKey' => 'juntas_provincial_id',
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
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'juntas_provincial_id',
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
	
	public $belongsTo = array(
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
