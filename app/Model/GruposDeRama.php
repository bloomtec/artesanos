<?php
App::uses('AppModel', 'Model');
/**
 * GruposDeRama Model
 *
 * @property Rama $Rama
 */
class GruposDeRama extends AppModel {
	/**
	 * Comportamientos
	 * @var array
	 */
	public $actsAs = array('Auditable');
	/**
	 * Campo para mostrar
	 * @var string
	 */
	public $displayField = 'gru_nombre';
	 
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'gru_nombre' => array(
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
		'Rama' => array(
			'className' => 'Rama',
			'foreignKey' => 'grupos_de_rama_id',
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
