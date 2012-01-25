<?php
App::uses('AppModel', 'Model');
/**
 * Local Model
 *
 * @property Artesano $Artesano
 * @property Aprendiz $Aprendiz
 * @property Balance $Balance
 * @property Equipo $Equipo
 * @property Inspeccion $Inspeccion
 * @property Material $Material
 * @property Producto $Producto
 * @property Trabajador $Trabajador
 */
class Local extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		'Aprendiz' => array(
			'className' => 'Aprendiz',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Balance' => array(
			'className' => 'Balance',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Equipo' => array(
			'className' => 'Equipo',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Inspeccion' => array(
			'className' => 'Inspeccion',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Material' => array(
			'className' => 'Material',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'local_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Trabajador' => array(
			'className' => 'Trabajador',
			'foreignKey' => 'local_id',
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
