<?php
App::uses('AppModel', 'Model');
/**
 * Titulo Model
 *
 * @property Rama $Rama
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 * @property Titulacion $Titulacion
 */
class Titulo extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tit_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'rama_id' => array(
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
		'Rama' => array(
			'className' => 'Rama',
			'foreignKey' => 'rama_id',
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
		'SolicitudesTitulacion' => array(
			'className' => 'SolicitudesTitulacion',
			'foreignKey' => 'titulo_id',
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
		'Titulacion' => array(
			'className' => 'Titulacion',
			'foreignKey' => 'titulo_id',
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
