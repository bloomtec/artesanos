<?php
App::uses('AppModel', 'Model');
App::uses('Auditoria', 'Model');
/**
 * ParametrosInformativo Model
 *
 * @property Valor $Valor
 */
class ParametrosInformativo extends AppModel {
	
	public $actsAs = array('Auditable');
	
	public $displayField = 'par_nombre';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'par_nombre' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Valor' => array(
			'className' => 'Valor',
			'foreignKey' => 'parametros_informativo_id',
			'dependent' => true,
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
