<?php
App::uses('AppModel', 'Model');
/**
 * Producto Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 */
class Item extends AppModel {
	
	public $useTable = 'items';
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ite_nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'EgresosDeInventario' => array(
			'className' => 'EgresosDeInventario',
			'joinTable' => 'egresos_de_inventarios_items',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'egresos_de_inventario_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'IngresosDeInventario' => array(
			'className' => 'IngresosDeInventario',
			'joinTable' => 'ingresos_de_inventarios_items',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'ingresos_de_inventario_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Persona' => array(
			'className' => 'ItemsPersona',
			'joinTable' => 'items_personas',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'persona_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
