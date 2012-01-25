<?php
App::uses('AppModel', 'Model');
/**
 * Inspeccion Model
 *
 * @property Usuario $Usuario
 * @property Artesano $Artesano
 * @property Taller $Taller
 * @property Local $Local
 */
class Inspeccion extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Artesano' => array(
			'className' => 'Artesano',
			'foreignKey' => 'artesano_id',
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
