<?php
App::uses('AppModel', 'Model');
/**
 * EspeciesValorada Model
 *
 * @property VentasEspecie $VentasEspecie
 * @property TiposEspeciesValorada $TiposEspeciesValorada
 * @property IngresosEspecie $IngresosEspecie
 */
class EspeciesValorada extends AppModel {
	
	public $actsAs = array('Auditable');
	
	/**
	 * Virtual fields
	 *
	 * @var array
	 */
	public $virtualFields = array(
		'valor_unitario' => 'SELECT tip_valor_unitario FROM tipos_especies_valoradas WHERE id = EspeciesValorada.tipos_especies_valorada_id',
		'nombre_especie' => 'SELECT tip_nombre FROM tipos_especies_valoradas WHERE id = EspeciesValorada.tipos_especies_valorada_id'
	);
	
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'esp_serie';
	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'tipos_especies_valorada_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ingresos_especie_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'esp_serie' => array(
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
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'ventas_especie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TiposEspeciesValorada' => array(
			'className' => 'TiposEspeciesValorada',
			'foreignKey' => 'tipos_especies_valorada_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'IngresosEspecie' => array(
			'className' => 'IngresosEspecie',
			'foreignKey' => 'ingresos_especie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
