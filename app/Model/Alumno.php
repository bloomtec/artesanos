<?php
App::uses('AppModel', 'Model');
/**
 * Alumno Model
 *
 * @property Curso $Curso
 */
class Alumno extends AppModel {
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'alu_documento_de_identificacion';
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'alu_documento_de_identificacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la identificación',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_apellido_paterno' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el apellido paterno',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_apellido_materno' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el apellido materno',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_nombres' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese el nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_tipo_de_sangre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el tipo de sangre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_estado_civil' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el estado civil',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_grado_de_estudio' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el grado de estudio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_sexo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione sexo',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alu_nacionalidad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione nacionalidad',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'joinTable' => 'cursos_alumnos',
			'foreignKey' => 'alumno_id',
			'associationForeignKey' => 'curso_id',
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
