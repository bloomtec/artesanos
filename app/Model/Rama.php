<?php
App::uses('AppModel', 'Model');
/**
 * Rama Model
 *
 * @property Calificacion $Calificacion
 */
class Rama extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'rama_id',
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
