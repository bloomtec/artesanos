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
	
	public $currentUsrId = -1;
	
	public $actsAs = array('Acl' => array('type' => 'requester'),'Auditable');
	
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
			'confirmarContraseña' => array(
				'rule' => array('confirmarContraseña'),
				'message' => 'Los campos de contraseña y confirmar contraseña no coinciden.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'usu_numero_identificacion' => array(
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
	
	/**
	 * Validación de confirmación de contraseña
	 */
	public function confirmarContraseña() {
		if(
			(isset($this -> data['Usuario']['usu_contrasena']) && isset($this -> data['Usuario']['usu_contrasena_confirmar'])) &&
			(
				(empty($this -> data['Usuario']['usu_contrasena']) && empty($this -> data['Usuario']['usu_contrasena_confirmar'])) ||
				$this -> data['Usuario']['usu_contrasena'] == $this -> data['Usuario']['usu_contrasena_confirmar']
			)
		) {
			return true;
		} else {
			return false;
		}
	}

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
		),
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'canton_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
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
		),
		'CalificacionTaller' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'cal_inspector_taller',
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
		'CalificacionLocal' => array(
			'className' => 'Calificacion',
			'foreignKey' => 'cal_inspector_local',
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
	 * Obtener las unidades (Parametro informativo con ID 13)
	 */
	public function getUnidades() {
		$fetched_data = $this -> query(
			"SELECT `id`,`val_nombre`
			 FROM `valores`
			 WHERE `parametros_informativo_id`=13;"
		);
		$formatted_data = array();
		foreach ($fetched_data as $key => $value) {
			$formatted_data[$value['valores']['val_nombre']] = $value['valores']['val_nombre'];
		}
		return $formatted_data;
	}
	
	/**
	 * Procedimiento antes de guardar
	 */
	public function beforeSave($model) {
		
	    if (isset($this->data['Usuario']['usu_contrasena'])) {
	        $this->data[$this->alias]['usu_contrasena'] = AuthComponent::password($this->data['Usuario']['usu_contrasena']);
	    }
		if(!isset($this -> data['Usuario']['usu_unidad'])) {
			$this -> data['Usuario']['usu_unidad'] = '';
		}
		/*if(isset($this -> data['Usuario']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Usuario.id' => $this -> data['Usuario']['id'])));
			//$this -> data['OldData']['Permisos'] = $this -> requestAction('/usuarios/getValoresPermisos/' . $this->data['Usuario']['id']);
		}*/
	    return true;
	}
	
	/**
	 * Método requerido por comportamiento de ACL
	 */
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
