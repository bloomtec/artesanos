<?php
App::uses('AppModel', 'Model');
/**
 * IngresosEspecie Model
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class IngresosEspecie extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

 	public $validate = array(
		'ing_fecha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Digite la fecha',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ing_documento_soporte' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione el documento de soporte',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $hasAndBelongsToMany = array(
		'EspeciesValorada' => array(
			'className' => 'EspeciesValorada',
			'joinTable' => 'especies_valoradas_ingresos_especies',
			'foreignKey' => 'ingresos_especie_id',
			'associationForeignKey' => 'especies_valorada_id',
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
