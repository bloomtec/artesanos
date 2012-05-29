<?php
App::uses('AppModel', 'Model');
/**
 * IngresosEspecie Model
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class IngresosEspecie extends AppModel {
	/**
	 * Comportamientos
	 * @var array
	 */
	public $actsAs = array('Auditable');
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'ing_fecha' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ing_cantidad_total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ing_documento_soporte' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe seleccionar el documento de soporte',
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
		'EspeciesValorada' => array(
			'className' => 'EspeciesValorada',
			'foreignKey' => 'ingresos_especie_id',
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
