<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Usuario Model
 *
 * @property Ciudad $Ciudad
 * @property Ubicacion $Ubicacion
 * @property Sector $Sector
 * @property Rol $Rol
 * @property Inspeccion $Inspeccion
 */
class Usuario extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'usuario';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ubicacion' => array(
			'className' => 'Ubicacion',
			'foreignKey' => 'ubicacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sector' => array(
			'className' => 'Sector',
			'foreignKey' => 'sector_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Rol' => array(
			'className' => 'Rol',
			'foreignKey' => 'rol_id',
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
		'Inspeccion' => array(
			'className' => 'Inspeccion',
			'foreignKey' => 'usuario_id',
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
 * beforeSave method
 */
	public function beforeSave() {
	    if (isset($this->data[$this->alias]['contrasena'])) {
	        $this->data[$this->alias]['contrasena'] = AuthComponent::password($this->data[$this->alias]['contrasena']);
	    }
	    return true;
	}

}
