<?php
App::uses('AppModel', 'Model');
/**
 * Solicitud Model
 *
 * @property JuntasProvincial $JuntasProvincial
 * @property Curso $Curso
 */
class Solicitud extends AppModel {
	
	/**
	 * Comportamientos
	 * @var array
	 */
	public $actsAs = array('Auditable');
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'sol_numero_de_memorandum';
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'sol_numero_de_memorandum' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese un número de memorandum',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este valor ya ha sido asignado a otra solicitud',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_nombre_de_la_capacitacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_fecha_inicio_de_la_capacitacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la fecha de inicio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_fecha_de_fin_de_la_capacitacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la fecha de finalización',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_costos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese los costos',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_duracion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la duración',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'La duración debe ser un valor numérico',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sol_numero_de_participantes' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la cantidad de participantes',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Participantes es un valor númerico',
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
		'CentrosArtesanal' => array(
			'className' => 'CentrosArtesanal',
			'foreignKey' => 'centros_artesanal_id',
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
		),
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'solicitud_id',
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
