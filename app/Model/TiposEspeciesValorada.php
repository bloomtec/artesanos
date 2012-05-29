<?php
App::uses('AppModel', 'Model');
/**
 * TiposEspeciesValorada Model
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class TiposEspeciesValorada extends AppModel {
	
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
	public $displayField = 'tip_nombre';
	
	/**
	 * Campos virtuales
	 * @var array
	 */
	public $virtualFields = array(
		'total_especies_para_vender' => 'SELECT COUNT(*)
							FROM especies_valoradas, tipos_especies_valoradas
							WHERE especies_valoradas.tipos_especies_valorada_id = tipos_especies_valoradas.id 
							AND tipos_especies_valoradas.id = TiposEspeciesValorada.id
							AND especies_valoradas.ventas_especie_id IS NULL',
		'total_especies_vendidas' => 'SELECT COUNT(*)
							FROM especies_valoradas, tipos_especies_valoradas
							WHERE especies_valoradas.tipos_especies_valorada_id = tipos_especies_valoradas.id 
							AND tipos_especies_valoradas.id = TiposEspeciesValorada.id
							AND especies_valoradas.ventas_especie_id IS NOT NULL'
	);
	
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
		'tip_codigo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		'EspeciesValorada' => array(
			'className' => 'EspeciesValorada',
			'foreignKey' => 'tipos_especies_valorada_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SolicitudesTitulacion' => array(
			'className' => 'SolicitudesTitulacion',
			'foreignKey' => 'tipos_especies_valorada_id',
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
