<?php
App::uses('AppModel', 'Model');
/**
 * Calificacion Model
 *
 * @property Rama $Rama
 */
class Calificacion extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Rama' => array(
			'className' => 'Rama',
			'foreignKey' => 'rama_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
