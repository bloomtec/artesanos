<?php
App::uses('AppModel', 'Model');
/**
 * Artesano Model
 *
 * @property Local $Local
 * @property Taller $Taller
 * @property Inspeccion $Inspeccion
 */
class Artesano extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombres';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Local' => array(
			'className' => 'Local',
			'foreignKey' => 'artesano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'artesano_id',
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
		'Inspeccion' => array(
			'className' => 'Inspeccion',
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
