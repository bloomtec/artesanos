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

	public $hasMany = array(
		'Inventario' => array(
			'className' => 'Inventario',
			'foreignKey' => 'item_id',
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
		)
	);
	
	public function getValores($param_id = null) {
		$fetched_data = $this -> query(
			"SELECT `id`,`val_nombre`
			 FROM `valores`
			 WHERE `parametros_informativo_id`=$param_id
			 ORDER BY `val_nombre` ASC;"
		);
		$formatted_data = array();
		foreach ($fetched_data as $key => $value) {
			$formatted_data[$value['valores']['val_nombre']] = $value['valores']['val_nombre'];
		}
		return $formatted_data;
	}

}
