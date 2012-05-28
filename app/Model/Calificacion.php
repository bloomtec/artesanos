<?php
App::uses('AppModel', 'Model');
/**
 * Calificacion Model
 *
 * @property Rama $Rama
 * @property Artesano $Artesano
 * @property TiposDeCalificacion $TiposDeCalificacion
 * @property DatosPersonal $DatosPersonal
 * @property Local $Local
 * @property Taller $Taller
 * @property TiposDe $TiposDe
 */
class Calificacion extends AppModel {
	
	public $actsAs = array('Auditable');
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
		'tipos_de_calificacion_id' => array(
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
		),
		'TiposDeCalificacion' => array(
			'className' => 'TiposDeCalificacion',
			'foreignKey' => 'tipos_de_calificacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InspectorTaller' => array(
			'className' => 'Usuario',
			'foreignKey' => 'cal_inspector_taller',	
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InspectorLocal' => array(
			'className' => 'Usuario',
			'foreignKey' => 'cal_inspector_local',
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
		'DatosPersonal' => array(
			'className' => 'DatosPersonal',
			'foreignKey' => 'calificacion_id',
			'dependent' => true,
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
			'dependent' => true,
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
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Documento' => array(
			'className' => 'Documento',
			'foreignKey' => 'calificacion_id',
			'dependent' => true,
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
