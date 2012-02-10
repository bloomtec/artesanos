<?php
App::uses('AppModel', 'Model');
/**
 * GruposDeRama Model
 *
 */
class GruposDeRama extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'gru_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'gru_nombre' => array(
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
}
