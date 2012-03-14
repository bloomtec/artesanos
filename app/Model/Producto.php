<?php
App::uses('AppModel', 'Model');
/**
 * Producto Model
 *
 * @property EgresosDeInventario $EgresosDeInventario
 * @property IngresosDeInventario $IngresosDeInventario
 */
class Producto extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'pro_name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'InventariosDeProducto' => array(
			'className' => 'InventariosDeProducto',
			'foreignKey' => 'producto_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'EgresosDeInventario' => array(
			'className' => 'EgresosDeInventario',
			'joinTable' => 'egresos_de_inventarios_productos',
			'foreignKey' => 'producto_id',
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
			'joinTable' => 'ingresos_de_inventarios_productos',
			'foreignKey' => 'producto_id',
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
		)
	);

}