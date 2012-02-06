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
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'usu_nombre_de_usuario';
	
	public $info_permisos = array(
		0 => array(
			'Usuarios' => array(
				'index' => 'Listar Usuarios',
				'view' => 'Ver Usuario',
				'add' => 'Agregar Usuario',
				'edit' => 'Editar Usuario'				
			)
		),
		1 => array(
			'Artesanos' => array(
				'index' => 'Listar Artesanos',
				'view' => 'Ver Artesano',
				'add' => 'Registrar Artesano',
				'edit' => 'Editar Artesano'			
			)
		),
		2 => array(
			'Auditorias' => array(
				'index' => 'Listar Auditorias',
				'view' => 'Ver Auditoria'
			)
		)
	);
	
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
	
	public function beforeSave($model) {
	    if (isset($this->data[$this->alias]['usu_contrasena'])) {
	        $this->data[$this->alias]['usu_contrasena'] = AuthComponent::password($this->data[$this->alias]['usu_contrasena']);
	    }
		if(!isset($this -> data['Usuario']['usu_unidad'])) {
			$this -> data['Usuario']['usu_unidad'] = '';
		}
		if(isset($this -> data['Usuario']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Usuario.id' => $this -> data['Usuario']['id'])));
			$this -> data['OldData']['Permisos'] = $this -> requestAction('/usuarios/getValoresPermisos/' . $this->data['Usuario']['id']);
		}
	    return true;
	}

	public function afterSave($created) {
		$data = $this -> parseData($this -> data);
		$auditoria = array();
		// Corregir añadir el primer usuario
		if($this -> currentUsrId == -1) {
			$this -> currentUsrId = 1;
		}
		if($created) {
			// Se ha creado un usuario
			$this -> Auditoria -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $this -> currentUsrId,
				'aud_nombre_modelo' => 'Usuario',
				'aud_llave_foranea' => $this -> id,
				'aud_datos_previos' => $data['Antes'],
				'aud_datos_nuevos' => $data['Despues'],
				'aud_add' => true,
				'aud_edit' => false,
				'aud_delete' => false
			);
			$this -> Auditoria -> save($auditoria);
		} else {
			// Se ha modificado un usuario
			$this -> Auditoria -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $this -> currentUsrId,
				'aud_nombre_modelo' => 'Usuario',
				'aud_llave_foranea' => $this -> id,
				'aud_datos_previos' => $data['Antes'],
				'aud_datos_nuevos' => $data['Despues'],
				'aud_add' => false,
				'aud_edit' => true,
				'aud_delete' => false
			);
			$this -> Auditoria -> save($auditoria);
		}
	}

	private function parseData($data) {
		$new_data = array();
		$new_data['Antes'] = '';
		$new_data['Despues'] = '';
		
		// Revisar si hay información vieja para registrarla
		if(isset($data['OldData'])) {
			$new_data['Antes'] .= '-- Datos Del Usuario --' . htmlspecialchars(chr(10));
			$new_data['Antes'] .= 'Nombre De Usuario'.chr(9).':: ' . $data['OldData']['Usuario']['usu_nombre_de_usuario'] . chr(10);
			if($data['OldData']['Usuario']['rol_id'] == 2) {
				$new_data['Antes'] .= 'Rol'.chr(9).chr(9).chr(9).':: ' . 'Operador' . chr(10);
			} else {
				$new_data['Antes'] .= 'Rol'.chr(9).chr(9).chr(9).':: ' . 'Administrador' . chr(10);
			}
			$new_data['Antes'] .= 'Unidad'.chr(9).chr(9).chr(9).':: ' . $data['OldData']['Usuario']['usu_unidad'] . chr(10);
			$new_data['Antes'] .= 'Cédula'.chr(9).chr(9).chr(9).':: ' . $data['OldData']['Usuario']['usu_cedula'] . chr(10);
			$new_data['Antes'] .= 'Nombres Y Apellidos'.chr(9).':: ' . $data['OldData']['Usuario']['usu_nombres_y_apellidos'] . chr(10);
			$new_data['Antes'] .= '-- Permisos Del Usuario --' . chr(10);
			foreach($data['OldData']['Permisos'] as $modelo => $acciones) {
				foreach($acciones as $accion => $valor) {
					$permiso = null;
					if($valor) {
						$permiso = 'si';
					} else {
						$permiso = 'no';
					}
					$new_data['Antes'] .= $modelo . chr(9) . '::' . chr(9) . $accion . chr(9) . '::' . chr(9) . $permiso . chr(10);
				}
			}
		}
		
		// Registrar la información nueva
		$new_data['Despues'] .= '-- Datos Del Usuario --' . htmlspecialchars(chr(10));
		$new_data['Despues'] .= 'Nombre De Usuario'.chr(9).':: ' . $data['Usuario']['usu_nombre_de_usuario'] . chr(10);
		if($data['Usuario']['rol_id'] == 2) {
			$new_data['Despues'] .= 'Rol'.chr(9).chr(9).chr(9).':: ' . 'Operador' . chr(10);
		} else {
			$new_data['Despues'] .= 'Rol'.chr(9).chr(9).chr(9).':: ' . 'Administrador' . chr(10);
		}
		$new_data['Despues'] .= 'Unidad'.chr(9).chr(9).chr(9).':: ' . $data['Usuario']['usu_unidad'] . chr(10);
		$new_data['Despues'] .= 'Cédula'.chr(9).chr(9).chr(9).':: ' . $data['Usuario']['usu_cedula'] . chr(10);
		$new_data['Despues'] .= 'Nombres Y Apellidos'.chr(9).':: ' . $data['Usuario']['usu_nombres_y_apellidos'] . chr(10);
		$new_data['Despues'] .= '-- Permisos Del Usuario --' . chr(10);
		if(isset($data['Permisos'])) {
			foreach($data['Permisos'] as $modelo => $acciones) {
				foreach($acciones as $accion => $valor) {
					$permiso = null;
					if($valor) {
						$permiso = 'si';
					} else {
						$permiso = 'no';
					}
					$new_data['Despues'] .= $modelo . chr(9) . '::' . chr(9) . $accion . chr(9) . '::' . chr(9) . $permiso . chr(10);
				}
			}
		}
		
		return $new_data;
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
