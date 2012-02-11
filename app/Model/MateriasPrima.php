<?php
App::uses('AppModel', 'Model');
/**
 * MateriasPrima Model
 *
 * @property Taller $Taller
 */
class MateriasPrima extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'taller_id' => array(
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
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'taller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
