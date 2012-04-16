<?php
App::uses('AppModel', 'Model');
/**
 * Titulacion Model
 *
 * @property Titulo $Titulo
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 * @property JuntasProvincial $JuntasProvincial
 */
class Titulacion extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo_id';
	public $actsAs = array('Auditable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'titulo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'solicitudes_titulacion_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'juntas_provincial_id' => array(
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
		'Titulo' => array(
			'className' => 'Titulo',
			'foreignKey' => 'titulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SolicitudesTitulacion' => array(
			'className' => 'SolicitudesTitulacion',
			'foreignKey' => 'solicitudes_titulacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'JuntasProvincial' => array(
			'className' => 'JuntasProvincial',
			'foreignKey' => 'juntas_provincial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
