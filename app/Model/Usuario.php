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
			'ParametrosInformativos' => array(
				'index' => 'Listar Parámetros Informativos',
				'view' => 'Ver Parámetro Informativo'
			)
		),
		3 => array(
			'Valores' => array(
				'view' => 'Ver Valor De Parámetro Informativo',
				'add' => 'Agregar Valor De Parámetro Informativo',
				'edit' => 'Editar Valor De Parámetro Informativo',
				'delete' => 'Eliminar Valor De Parámetro Informativo'
			)
		),
		4 => array(
			'Geograficos' => array(
				'index' => 'Ver Configuración Geográfica'
			)
		),
		5 => array(
			'Provincias' => array(
				'view' => 'Ver Provincias',
				'add' => 'Añadir Provincia',
				'edit' => 'Modificar Provincia'
			)
		),
		6 => array(
			'Cantones' => array(
				'view' => 'Ver Cantones',
				'add' => 'Añadir Canton',
				'edit' => 'Modificar Canton'
			)
		),
		7 => array(
			'Ciudades' => array(
				'view' => 'Ver Ciudades',
				'add' => 'Añadir Ciudad',
				'edit' => 'Modificar Ciudad'
			)
		),
		8 => array(
			'Sectores' => array(
				'view' => 'Ver Sectores',
				'add' => 'Añadir Sector',
				'edit' => 'Modificar Sector'
			)
		),
		9 => array(
			'Parroquias' => array(
				'view' => 'Ver Parroquias',
				'add' => 'Añadir Parroquia',
				'edit' => 'Modificar Parroquia'
			)
		),
		10 => array(
			'Configuraciones' => array(
				'index' => 'Listar Parámetros De Configuración',
				'edit' => 'Modificar Parámetros De Configuración'
			)
		),
		11 => array(
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
		)
	);
	
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
			$new_data['Antes'] .= '<table class="audit-table">';
			$new_data['Antes'] .= '<caption>Datos Del Usuario</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Nombre De Usuario</td><td class="audit-data">'. $data['OldData']['Usuario']['usu_nombre_de_usuario'] . '</td></tr>';
			if($data['OldData']['Usuario']['rol_id'] == 2) {
				$new_data['Antes'] .= '<tr><td class="audit-value">Rol</td><td class="audit-data">Operador</td></tr>';
			} else {
				$new_data['Antes'] .= '<tr><td class="audit-value">Rol</td><td class="audit-data">Administrador</td></tr>';
			}
			$new_data['Antes'] .= '<tr><td class="audit-value">Unidad</td><td class="audit-data">' . $data['OldData']['Usuario']['usu_unidad'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Cédula</td><td class="audit-data">' . $data['OldData']['Usuario']['usu_cedula'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Nombres Y Apellidos</td><td class="audit-data">' . $data['OldData']['Usuario']['usu_nombres_y_apellidos'] . '</td></tr>';
			$new_data['Antes'] .= '<caption>Permisos Del Usuario</caption>';
			foreach($data['OldData']['Permisos'] as $modelo => $acciones) {
				foreach($acciones as $accion => $valor) {
					$permiso = null;
					if($valor) {
						$permiso = 'si';
					} else {
						$permiso = 'no';
					}
					$new_data['Antes'] .= '<tr><td class="audit-value">' . $modelo . '::' . $accion . '</td><td class="audit-data">' . $permiso . '</td></tr>';
				}
			}
			$new_data['Antes'] .= '</table>';
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Datos Del Usuario</caption>';
		if(isset($data['OldData']['Usuario']['usu_nombre_de_usuario'])) {
			if($data['OldData']['Usuario']['usu_nombre_de_usuario'] != $data['Usuario']['usu_nombre_de_usuario']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Nombre De Usuario</td><td class="audit-data">'. $data['Usuario']['usu_nombre_de_usuario'] . '</td></tr>';
		if(isset($data['OldData']['Usuario']['rol_id'])) {
			if($data['OldData']['Usuario']['rol_id'] != $data['Usuario']['rol_id']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		if($data['Usuario']['rol_id'] == 2) {
			$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Rol</td><td class="audit-data">Operador</td></tr>';
		} else {
			$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Rol</td><td class="audit-data">Administrador</td></tr>';
		}
		if(isset($data['OldData']['Usuario']['usu_unidad'])) {
			if($data['OldData']['Usuario']['usu_unidad'] != $data['Usuario']['usu_unidad']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Unidad</td><td class="audit-data">' . $data['Usuario']['usu_unidad'] . '</td></tr>';
		if(isset($data['OldData']['Usuario']['usu_cedula'])) {
			if($data['OldData']['Usuario']['usu_cedula'] != $data['Usuario']['usu_cedula']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Cédula</td><td class="audit-data">' . $data['Usuario']['usu_cedula'] . '</td></tr>';
		if(isset($data['OldData']['Usuario']['usu_nombres_y_apellidos'])) {
			if($data['OldData']['Usuario']['usu_nombres_y_apellidos'] != $data['Usuario']['usu_nombres_y_apellidos']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Nombres Y Apellidos</td><td class="audit-data">' . $data['Usuario']['usu_nombres_y_apellidos'] . '</td></tr>';
		$new_data['Despues'] .= '<caption>Permisos Del Usuario</caption>';
		if(isset($data['Permisos'])) {
			foreach($data['Permisos'] as $modelo => $acciones) {
				foreach($acciones as $accion => $valor) {
					$permiso = null;
					if($valor) {
						$permiso = 'si';
					} else {
						$permiso = 'no';
					}
					if(isset($data['OldData']['Permisos'][$modelo][$accion])) {
						if($data['OldData']['Permisos'][$modelo][$accion] != $data['Permisos'][$modelo][$accion]) {
							$class = 'diferente';
						} else {
							$class = 'igual';
						}
					} else {
						$class = 'igual';
					}
					$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">' . $modelo . '::' . $accion . '</td><td class="audit-data">' . $permiso . '</td></tr>';
				}
			}
		}
		$new_data['Despues'] .= '</table>';
		
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
