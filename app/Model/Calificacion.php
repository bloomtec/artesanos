<?php
App::uses('AppModel', 'Model');
/**
 * Calificacion Model
 *
 * @property Rama $Rama
 * @property Artesano $Artesano
 * @property Balance $Balance
 * @property DatosPersonal $DatosPersonal
 * @property Local $Local
 * @property Taller $Taller
 * @property TiposDe $TiposDe
 */
class Calificacion extends AppModel {
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
		'artesano_id' => array(
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
		),
		'Artesano' => array(
			'className' => 'Artesano',
			'foreignKey' => 'artesano_id',
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
		'Balance' => array(
			'className' => 'Balance',
			'foreignKey' => 'calificacion_id',
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
		'DatosPersonal' => array(
			'className' => 'DatosPersonal',
			'foreignKey' => 'calificacion_id',
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
			'foreignKey' => 'calificacion_id',
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
			'foreignKey' => 'calificacion_id',
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
		'TiposDe' => array(
			'className' => 'TiposDe',
			'joinTable' => 'tipos_de_calificaciones',
			'foreignKey' => 'calificacion_id',
			'associationForeignKey' => 'tipos_de_id',
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
