<?php
App::uses('AppModel', 'Model');
/**
 * Equipo Model
 *
 * @property Local $Local
 * @property Taller $Taller
 */
class Equipo extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Local' => array(
			'className' => 'Local',
			'foreignKey' => 'local_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'taller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
