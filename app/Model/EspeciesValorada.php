<?php
App::uses('AppModel', 'Model');
/**
 * EspeciesValorada Model
 *
 * @property IngresosEspecie $IngresosEspecie
 * @property VentasEspecie $VentasEspecie
 */
class EspeciesValorada extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'esp_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'esp_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'esp_codigo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Este campo es debe ser númerico',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'esp_valor_unitario' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'IngresosEspecie' => array(
			'className' => 'IngresosEspecie',
			'joinTable' => 'especies_valoradas_ingresos_especies',
			'foreignKey' => 'especies_valorada_id',
			'associationForeignKey' => 'ingresos_especie_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'joinTable' => 'especies_valoradas_ventas_especies',
			'foreignKey' => 'especies_valorada_id',
			'associationForeignKey' => 'ventas_especie_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
