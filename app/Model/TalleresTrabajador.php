<?php
App::uses('AppModel', 'Model');
/**
 * TalleresTrabajador Model
 *
 * @property Trabajador $Trabajador
 * @property Taller $Taller
 * @property TiposDeTrabajador $TiposDeTrabajador
 */
class TalleresTrabajador extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Trabajador' => array(
			'className' => 'Trabajador',
			'foreignKey' => 'trabajador_id',
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
		'TiposDeTrabajador' => array(
			'className' => 'TiposDeTrabajador',
			'foreignKey' => 'tipos_de_trabajador_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
