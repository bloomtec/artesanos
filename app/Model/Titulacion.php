<?php
App::uses('AppModel', 'Model');
/**
 * Titulacion Model
 *
 * @property Rama $Rama
 * @property Artesanos $Artesanos
 */
class Titulacion extends AppModel {
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
		'artesanos_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tit_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'Artesanos' => array(
			'className' => 'Artesanos',
			'foreignKey' => 'artesanos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
