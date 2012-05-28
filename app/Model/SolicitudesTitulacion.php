<?php
App::uses('AppModel', 'Model');
/**
 * SolicitudesTitulacion Model
 *
 * @property EstadosSolicitudesTitulacion $EstadosSolicitudesTitulacion
 * @property Titulo $Titulo
 * @property TiposSolicitudesTitulacion $TiposSolicitudesTitulacion
 * @property Artesano $Artesano
 * @property Titulacion $Titulacion
 */
class SolicitudesTitulacion extends AppModel {
	
	public $actsAs = array('Auditable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'estados_solicitudes_titulacion_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'tipos_solicitudes_titulacion_id' => array(
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
		
		'tipos_especies_valorada_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debes seleccionar un tipo de especie',
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
		'EstadosSolicitudesTitulacion' => array(
			'className' => 'EstadosSolicitudesTitulacion',
			'foreignKey' => 'estados_solicitudes_titulacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Titulo' => array(
			'className' => 'Titulo',
			'foreignKey' => 'titulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TiposSolicitudesTitulacion' => array(
			'className' => 'TiposSolicitudesTitulacion',
			'foreignKey' => 'tipos_solicitudes_titulacion_id',
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
		'TiposEspeciesValorada' => array(
			'className' => 'TiposEspeciesValorada',
			'foreignKey' => 'tipos_especies_valorada_id',
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
		'Titulacion' => array(
			'className' => 'Titulacion',
			'foreignKey' => 'solicitudes_titulacion_id',
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
