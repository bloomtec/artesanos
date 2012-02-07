<?php
App::uses('AppModel', 'Model');
/**
 * Valor Model
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class Valor extends AppModel {
	
	public $displayField = 'val_nombre';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'parametros_informativo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'val_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre.',
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
		'ParametrosInformativo' => array(
			'className' => 'ParametrosInformativo',
			'foreignKey' => 'parametros_informativo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
