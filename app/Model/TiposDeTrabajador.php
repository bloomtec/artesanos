<?php
App::uses('AppModel', 'Model');
/**
 * TiposDeTrabajador Model
 *
 * @property TalleresTrabajador $TalleresTrabajador
 */
class TiposDeTrabajador extends AppModel {
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
		'TalleresTrabajador' => array(
			'className' => 'TalleresTrabajador',
			'foreignKey' => 'tipos_de_trabajador_id',
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
