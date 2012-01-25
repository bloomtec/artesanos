<?php
App::uses('AppModel', 'Model');
/**
 * Balance Model
 *
 * @property Taller $Taller
 * @property Local $Local
 */
class Balance extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'taller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Local' => array(
			'className' => 'Local',
			'foreignKey' => 'local_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
