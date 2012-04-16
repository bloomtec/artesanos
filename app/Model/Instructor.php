<?php
App::uses('AppModel', 'Model');
/**
 * Instructor Model
 *
 * @property Curso $Curso
 */
class Instructor extends AppModel {
	
	public $actsAs = array('Auditable');
	
	public $displayField = 'nombre_completo';
/**
 * Validation rules
 *
 * @var array
 */
	public $virtualFields=array(
		'nombre_completo'=>'CONCAT(ins_nombres," ",ins_apellido_paterno," ",ins_apellido_materno )'
	);
	
	public $validate = array(
		'ins_nacionalidad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione la nacionalidad',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_is_cedula' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_documento_de_identificacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la identificación',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_apellido_paterno' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el apellido paterno',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_apellido_materno' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el apellido materno',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_nombres' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_fecha_de_nacimiento' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la fecha de nacimiento',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_tipo_de_sangre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el tipo de sangre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_estado_civil' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el estado civil',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_especialidad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la especialidad',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ins_experiencia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la experiencia',
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'instructor_id',
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
