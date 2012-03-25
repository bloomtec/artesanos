<?php
App::uses('AppModel', 'Model');
/**
 * Curso Model
 *
 * @property Solicitud $Solicitud
 * @property Instructor $Instructor
 * @property Alumno $Alumno
 */
class Curso extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cur_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'solicitud_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe registrar la solicitud de creación del curso',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cur_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre para el curso',
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
		'Solicitud' => array(
			'className' => 'Solicitud',
			'foreignKey' => 'solicitud_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Instructor' => array(
			'className' => 'Instructor',
			'foreignKey' => 'instructor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Alumno' => array(
			'className' => 'Alumno',
			'joinTable' => 'cursos_alumnos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'alumno_id',
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