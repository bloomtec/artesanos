<?php
App::uses('AppModel', 'Model');
/**
 * Artesano Model
 *
 * @property Calificacion $Calificacion
 */
class Artesano extends AppModel {
	
	public $currentUsrId = -1;
	
	public $virtualFields = array(
		'nombre_completo' =>	'concat(art_nombres," ",art_apellido_paterno," ",art_apellido_materno)'
	);
	
	public $displayField = 'art_cedula';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'art_cedula' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique'=>array(
				'rule'    => 'isUnique',
        		'message' => 'Este número de identidad ya se encuentra registrado.'
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'artesano_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Calificacion.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'artesano_id',
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
