<?php
App::uses('AppModel', 'Model');
/**
 * Trabajador Model
 *
 * @property TiposDeTrabajador $TiposDeTrabajador
 * @property Taller $Taller
 */
class Trabajador extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tra_cedula';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tipos_de_trabajador_id' => array(
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
		'TiposDeTrabajador' => array(
			'className' => 'TiposDeTrabajador',
			'foreignKey' => 'tipos_de_trabajador_id',
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
		'Taller' => array(
			'className' => 'Taller',
			'joinTable' => 'talleres_trabajadores',
			'foreignKey' => 'trabajador_id',
			'associationForeignKey' => 'taller_id',
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
