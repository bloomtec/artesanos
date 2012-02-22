<?php
App::uses('AppModel', 'Model');
/**
 * TiposDeCalificacion Model
 *
 * @property Calificacion $Calificacion
 */
class TiposDeCalificacion extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tip_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tip_nombre' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'tipos_de_calificacion_id',
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
