<?php
App::uses('AppModel', 'Model');
/**
 * Local Model
 *
 * @property Calificacion $Calificacion
 * @property Provincia $Provincia
 * @property Canton $Canton
 * @property Ciudad $Ciudad
 * @property Sector $Sector
 * @property Parroquia $Parroquia
 */
class Local extends AppModel {
	
	public $order = array('created' => 'DESC');
	
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
		),
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'canton_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sector' => array(
			'className' => 'Sector',
			'foreignKey' => 'sector_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Parroquia' => array(
			'className' => 'Parroquia',
			'foreignKey' => 'parroquia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
