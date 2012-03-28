<?php
App::uses('AppModel', 'Model');
/**
 * VentasEspecie Model
 *
 * @property JuntasProvincial $JuntasProvincial
 * @property Artesano $Artesano
 * @property EspeciesValorada $EspeciesValorada
 */
class VentasEspecie extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'JuntasProvincial' => array(
			'className' => 'JuntasProvincial',
			'foreignKey' => 'juntas_provincial_id',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EspeciesValorada' => array(
			'className' => 'EspeciesValorada',
			'foreignKey' => 'ventas_especie_id',
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
