<?php
App::uses('AppModel', 'Model');
/**
 * Artesano Model
 *
 * @property Calificacion $Calificacion
 */
class Artesano extends AppModel {
	
	public $currentUsrId = -1;
	
	public $virtualFields = array(
		'nombre_completo' =>	'SELECT CONCAT(datosA.dat_nombres, " ", datosA.dat_apellido_paterno, " ", datosA.dat_apellido_materno)
								FROM datos_personales AS datosA, datos_personales AS datosB
								WHERE datosA.calificacion_id IN(
								SELECT calificaciones.id
									FROM calificaciones, artesanos
									WHERE calificaciones.artesano_id = artesanos.id
									AND artesanos.id = Artesano.id
								)
								AND datosB.calificacion_id IN(
								SELECT calificaciones.id
									FROM calificaciones, artesanos
									WHERE calificaciones.artesano_id = artesanos.id
									AND artesanos.id = Artesano.id
								)
								AND datosA.id > datosB.id'
	);
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'art_cedula' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Calificacion' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'artesano_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Calificacion.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'artesano_id',
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
