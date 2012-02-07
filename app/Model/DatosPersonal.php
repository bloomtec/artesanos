<?php
App::uses('AppModel', 'Model');
/**
 * DatosPersonal Model
 *
 * @property Calificacion $Calificacion
 */
class DatosPersonal extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'calificacion_id' => array(
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
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'calificacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
