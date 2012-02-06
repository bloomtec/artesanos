<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Usuario Model
 *
 * @property Rol $Rol
 * @property Auditoria $Auditoria
 */
class Usuario extends AppModel {
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'usu_nombre_de_usuario';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'rol_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe seleccionar un rol para este usuario. Seleccione un rol e intente de nuevo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usu_nombre_de_usuario' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre de usuario.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Existe otro usuario con este nombre. Escoja otro nombre de usuario e intente de nuevo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usu_contrasena' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar una contraseña.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usu_cedula' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar la cédula del usuario.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Existe otro usuario con esta cédula. Verifique la cédula e intente de nuevo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usu_nombres_y_apellidos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar los nombres y apellidos del usuario.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		'Auditoria' => array(
			'className' => 'Auditoria',
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
	
	public function beforeSave() {
	    if (isset($this->data[$this->alias]['usu_contrasena'])) {
	        $this->data[$this->alias]['usu_contrasena'] = AuthComponent::password($this->data[$this->alias]['usu_contrasena']);
	    }
	    return true;
	}
	
	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    $data = $this->data;
	    if (empty($this->data)) {
	        $data = $this->read();
	    }
	    if (!$data['Usuario']['rol_id']) {
	        return null;
	    } else {
	        return array('Rol' => array('id' => $data['Usuario']['rol_id']));
	    }
	}

}
