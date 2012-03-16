<?php
App::uses('AppModel', 'Model');
/**
 * Documento Model
 *
 * @property Calificacion $Calificacion
 */
class Documento extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'doc_name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'doc_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'doc_path' => array(
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
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'calificacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
