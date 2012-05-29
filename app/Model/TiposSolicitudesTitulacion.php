<?php
App::uses('AppModel', 'Model');
/**
 * TiposSolicitudesTitulacion Model
 *
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 */
class TiposSolicitudesTitulacion extends AppModel {
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'tip_nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'SolicitudesTitulacion' => array(
			'className' => 'SolicitudesTitulacion',
			'foreignKey' => 'tipos_solicitudes_titulacion_id',
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
