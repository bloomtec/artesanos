<?php
App::uses('AppModel', 'Model');
/**
 * Taller Model
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
class Taller extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'razon_social_o_nombre_comercial';

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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
			'foreignKey' => 'taller_id',
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
