<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('inicializarAcl', 'logout', 'verificarAcceso', 'getNombre', 'getNombresYApellidos', 'modificarContrasena');
	}

	public function verificarAcceso() {
		// Armar la ruta
		$ruta = '';
		for ($i = 0; $i < count($this -> params['ruta']); $i++) {
			$ruta .= $this -> params['ruta'][$i];
			if ($i != count($this -> params['ruta']) - 1) {
				$ruta .= '/';
			}
		}
		return $this -> Acl -> check($this -> Session -> read('Auth.User.usu_nombre_de_usuario'), $ruta);
	}
	
	public function getNombre($id) {
		$usuario = $this -> Usuario -> read('usu_nombre_de_usuario', $id);
		if(empty($usuario)) {
			return '<b>:: eliminado ::</b>';
		} else {
			return $usuario['Usuario']['usu_nombre_de_usuario'];
		}
	}
	
	public function getNombresYApellidos($id = null) {
		if($id) {
			$usuario = $this -> Usuario -> read('usu_nombres_y_apellidos', $id);
			if(empty($usuario)) {
				return '<b>:: eliminado ::</b>';
			} else {
				return $usuario['Usuario']['usu_nombres_y_apellidos'];
			}
		}
	}

	/**
	 * login method
	 *
	 * @return void
	 */
	public function login() {
		$this -> layout = "login";
		if ($this -> request -> is('post')) {
			if ($this -> Auth -> login()) {
				return $this -> redirect($this -> Auth -> redirect());
			} else {
				$this -> Session -> setFlash(__('Usuario o contraseña incorrectos.'), 'default', array(), 'auth');
			}
		}
	}

	/**
	 * logout method
	 *
	 * @return void
	 */
	public function logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Usuario -> recursive = 0;
		$this -> set('usuarios', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Usuario -> id = $id;
		if (!$this -> Usuario -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		$this -> set('usuario', $this -> Usuario -> read(null, $id));
		// $permisos['Permisos'] = $this -> getValoresPermisos($id);
		// $this -> set(compact('permisos'));
	}
	
	private function validacionesInspector(){
		if($this->data['Usuario']['rol_id']==3){
				$newValidation = array(
					'usu_inspecciones_por_dia' => array(
		        		'rule'    => array('minLength', 1),
		        		'message' => 'A los inspectores se les debe asignar al menos una inspección por día'
		   	 		),
		   	 		'provincia_id' => array(
						'rule' => array('notempty'),
						'message' => 'Este campo es requerido',
					),
					'canton_id' => array(
						'rule' => array('notempty'),
						'message' => 'Este campo es requerido',
					),
					'ciudad_id' => array(
						'notempty' => array(
						'rule' => array('notempty'),
						'message' => 'Este campo es requerido',
						),
					),
					'sector_id' => array(
						'notempty' => array(
						'rule' => array('notempty'),
						'message' => 'Este campo es requerido',
						),
					),
		   	 		
				);
				$this-> Usuario -> validate = array_merge($this-> Usuario -> validate,$newValidation);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		
		$this -> Usuario -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> validacionesInspector();
			$this -> Usuario -> create();
			if ($this -> Usuario -> save($this -> request -> data)) {
				// tratando de arreglar lo del alias en la tabla aros
				$user_id = $this -> Usuario -> id;
				$user_alias = $this -> request -> data['Usuario']['usu_nombre_de_usuario'];
				$this -> Usuario -> query("UPDATE `aros` SET `alias`='$user_alias' WHERE `model`='Usuario' AND `foreign_key`=$user_id");
				$usuario = $this -> Usuario -> read(null, $user_id);
				$aro_id = $this -> Usuario -> query("SELECT `id` FROM `aros` WHERE `model`='Usuario' AND `foreign_key`=$user_id");
				$aro_id = $aro_id[0]['aros']['id'];
				$this -> Usuario -> query("DELETE FROM `aros_acos` WHERE `aro_id`=$aro_id");
				if($usuario['Usuario']['rol_id'] == 3) {
					$this -> setPermisosInspectores($usuario, true);
				} else {
					$this -> setPermisosInspectores($usuario, false);
				}
				//$this -> setInfoPermisos($this -> Usuario -> id, $this -> request -> data['Permisos']);
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
			//	$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$usu_unidades = $this -> Usuario -> getUnidades();
		$roles = $this -> Usuario -> Rol -> find('list');
		$this -> loadModel('Provincia');
		$this -> loadModel('Canton');
		$provincias = $this -> Provincia -> find('list');
		$cantones = $this -> Canton -> find('list');
		$ciudades = $this -> Usuario -> Ciudad -> find('list');
		$sectores = $this -> Usuario -> Sector -> find('list');
		$this -> set(compact('roles', 'usu_unidades', 'cantones','provincias','ciudades', 'sectores'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Usuario -> currentUsrId = $this -> Auth -> user('id');
		$this -> Usuario -> id = $id;
		if (!$this -> Usuario -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Usuario -> save($this -> request -> data)) {
				// tratando de arreglar lo del alias en la tabla aros
				$user_id = $this -> request -> data['Usuario']['id'];
				$user_alias = $this -> request -> data['Usuario']['usu_nombre_de_usuario'];
				$this -> Usuario -> query("UPDATE `aros` SET `alias`='$user_alias' WHERE `model`='Usuario' AND `foreign_key`=$user_id");
				$usuario = $this -> Usuario -> read(null, $user_id);
				$aro_id = $this -> Usuario -> query("SELECT `id` FROM `aros` WHERE `model`='Usuario' AND `foreign_key`=$id");
				$aro_id = $aro_id[0]['aros']['id'];
				$this -> Usuario -> query("DELETE FROM `aros_acos` WHERE `aro_id`=$aro_id");
				if($usuario['Usuario']['rol_id'] == 3) {
					$this -> setPermisosInspectores($usuario, true);
				} else {
					$this -> setPermisosInspectores($usuario, false);
				}
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Usuario -> read(null, $id);
		}
		$usu_unidades = $this -> Usuario -> getUnidades();
		$roles = $this -> Usuario -> Rol -> find('list');
		$this -> loadModel('Provincia');
		$this -> loadModel('Canton');
		$provincias = $this -> Provincia -> find('list');
		$cantones = $this -> Canton -> find('list');
		$ciudades = $this -> Usuario -> Ciudad -> find('list');
		$sectores = $this -> Usuario -> Sector -> find('list');
		$this -> set(compact('roles', 'permisos', 'usu_unidades', 'cantones', 'provincias','ciudades', 'sectores'));
	}
	/**
	 * modificar contraseña method
	 *
	 * @param string $id
	 * @return void
	 */
	public function modificarContrasena() {
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if(true) {
				if ($this -> Usuario -> save($this -> request -> data)) {
					// tratando de arreglar lo del alias en la tabla aros
					$id = $user_id = $this -> request -> data['Usuario']['id'];
					$user_alias = $this -> request -> data['Usuario']['usu_nombre_de_usuario'];
					$this -> Usuario -> query("UPDATE `aros` SET `alias`='$user_alias' WHERE `model`='Usuario' AND `foreign_key`=$user_id");
					$usuario = $this -> Usuario -> read(null, $user_id);
					$aro_id = $this -> Usuario -> query("SELECT `id` FROM `aros` WHERE `model`='Usuario' AND `foreign_key`=$id");
					$aro_id = $aro_id[0]['aros']['id'];
					$this -> Usuario -> query("DELETE FROM `aros_acos` WHERE `aro_id`=$aro_id");
					if($usuario['Usuario']['rol_id'] == 3) {
						$this -> setPermisosInspectores($usuario, true);
					} else {
						$this -> setPermisosInspectores($usuario, false);
					}
					$this -> Session -> setFlash(__('Se modificó la contraseña'), 'crud/success');
					//$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se pudo modificar la contraseña. Por favor, intente de nuevo.'), 'crud/error');
					if($this -> request -> data['Usuario']['usu_contrasena']!= $this -> request -> data['Usuario']['usu_contrasena_confirmar']){
						$this -> Session -> setFlash(__('Las contraseñas no coinciden. Por favor intente de nuevo'), 'crud/error');	
					}
					//$this -> request -> data = $this -> Usuario -> read(null, $id);
				}
			} else {
				$this -> redirect($this -> referer());
			}
		}
		$id = $this -> Usuario -> id =  $this -> Auth -> user('id');;
		if (!$this -> Usuario -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		$this -> request -> data = $this -> Usuario -> read(null, $id);
	}

	/**
	 * Sección manejo ACL
	 */
	public function permisos($id = null) {
		$this -> Usuario -> recursive = -1;
		$this -> Usuario -> currentUsrId = $this -> Auth -> user('id');
		$this -> Usuario -> id = $id;
		if (!$this -> Usuario -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			//debug($this -> request -> data);
			$usuario = $this -> Usuario -> find('first', array('conditions' => array('Usuario.id' => $id)));
			if($usuario['Usuario']['rol_id'] == 2 || $usuario['Usuario']['rol_id'] == 3) {
				// Se es operador. Asignar acorde los permisos asignados.
				$aro_id = $this -> Usuario -> query("SELECT `id` FROM `aros` WHERE `model`='Usuario' AND `foreign_key`=$id");
				$aro_id = $aro_id[0]['aros']['id'];
				$this -> Usuario -> query("DELETE FROM `aros_acos` WHERE `aro_id`=$aro_id");
				foreach($this -> request -> data['Permisos'] as $modulo => $acceso) {
					if($acceso) {
						$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo");
					} else {
						$this -> Acl -> deny($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo");
					}
				}
				$this -> setPermisosUsuarios($usuario, $this -> request -> data['Permisos']['Usuarios']);
				$this -> setPermisosArtesanos($usuario, $this -> request -> data['Permisos']['Artesanos']);
				$this -> setPermisosMantenimientos($usuario, $this -> request -> data['Permisos']['Mantenimientos']);
				$this -> setPermisosParametrosInformativos($usuario, $this -> request -> data['Permisos']['Informativos']);
				$this -> setPermisosReportes($usuario, $this -> request -> data['Permisos']['Reportes']);
				$this -> setPermisosCalificaciones($usuario, $this -> request -> data['Permisos']['Calificaciones']);
				if($usuario['Usuario']['rol_id'] == 3) {
					$this -> setPermisosInspectores($usuario, true);
				} else {
					$this -> setPermisosInspectores($usuario, false);
				}
				$this -> Session -> setFlash(__('Se asigaron los permisos al usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} elseif($usuario['Usuario']['rol_id'] == 1) {
				// Caso en que se es administrador. No se requiere hacer algo por lo que se tiene acceso a todo.
			}
		} else {
			$usuario = $this -> Usuario -> read(null, $id);
			$usuario['Permisos']['Usuarios'] = $this -> getPermisosUsuarios($usuario);
			$usuario['Permisos']['Artesanos'] = $this -> getPermisosArtesanos($usuario);
			$usuario['Permisos']['Mantenimientos'] = $this -> getPermisosMantenimientos($usuario);
			$usuario['Permisos']['Informativos'] = $this -> getPermisosParametrosInformativos($usuario);
			$usuario['Permisos']['Reportes'] = $this -> getPermisosReportes($usuario);
			$usuario['Permisos']['Calificaciones'] = $this -> getPermisosCalificaciones($usuario);
			$this -> request -> data = $usuario;
		}
	}
	
	private function setPermisosMantenimientos($usuario = null, $permisos = null) {
		foreach($permisos as $modulo => $permisos) {
			if($permisos[$modulo]['index']) {
				$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo/index");
			}
			if($permisos[$modulo]['add']) {
				$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo/add");
			}
		}
	}
	
	private function getPermisosMantenimientos($usuario = null) {
		$permisos = array(
			'GruposDeRamas' => array(
				'index' => true, 'add' => true
			),
			'Ramas' => array(
				'index' => true, 'add' => true
			),
			'TiposEspeciesValoradas' => array(
				'index' => true, 'add' => true
			),
			'CentrosArtesanales' => array(
				'index' => true, 'add' => true
			),
			'Items' => array(
				'index' => true, 'add' => true
			),
			'JuntasProvinciales' => array(
				'index' => true, 'add' => true
			),
			'Personas' => array(
				'index' => true, 'add' => true
			),
			'Proveedores' => array(
				'index' => true, 'add' => true
			),
			'Titulos' => array(
				'index' => true, 'add' => true
			),
			'Alumnos' => array(
				'index' => true, 'add' => true
			),
			'Instructores' => array(
				'index' => true, 'add' => true
			),
		);
		
		foreach($permisos as $modulo => $permisos) {
			if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo/index")) $permisos[$modulo]['index'] = false;
			if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], "controllers/$modulo/add")) $permisos[$modulo]['add'] = false;
		}
		
		return $permisos;
	}
	
	private function setPermisosUsuarios($usuario = null, $permisos = null) {
		if($permisos['index']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/index');
		if($permisos['view']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/view');
		if($permisos['add']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/add');
		if($permisos['edit']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/edit');
	}
	
	private function getPermisosUsuarios($usuario = null) {
		$permisos = array('index' => false, 'view' => false, 'add' => false, 'edit' => false);
		
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/index')) $permisos['index'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/view')) $permisos['view'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/add')) $permisos['add'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Usuarios/edit')) $permisos['edit'] = true;
		
		return $permisos;
	}
	
	private function setPermisosArtesanos($usuario = null, $permisos = null) {
		if($permisos['index']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/index');
		if($permisos['add']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/add');
		if($permisos['agregarArtesano']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/agregarArtesano');
	}
	
	private function getPermisosArtesanos($usuario = null) {
		$permisos = array('index' => false, 'add' => false, 'agregarArtesano' => false);
		
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/index')) $permisos['index'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/add')) $permisos['add'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/agregarArtesano')) $permisos['agregarArtesano'] = true;
		
		return $permisos;
	}

	private function setPermisosCalificaciones($usuario = null, $permisos = null) {
		if($permisos['view']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/view');
		if($permisos['imprimir']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/imprimir');
		if($permisos['modificarCalificacion']) $this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/modificarCalificacion');
	}
	
	private function getPermisosCalificaciones($usuario = null) {
		$permisos = array('view' => false, 'imprimir' => false, 'modificarCalificacion' => false);
		
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/view')) $permisos['view'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/imprimir')) $permisos['imprimir'] = true;
		if($this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/modificarCalificacion')) $permisos['modificarCalificacion'] = true;
		
		return $permisos;
	}
	
	private function setPermisosParametrosInformativos($usuario = null, $permisos = null) {
		if($permisos['index']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/ParametrosInformativos/index');
		}
		if($permisos['view']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/ParametrosInformativos/view');
		}
		if($permisos['modificar']) {
			// Valores
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/view');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/add');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/edit');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/delete');
		}
	}
	
	private function getPermisosParametrosInformativos($usuario = null) {
		$permisos = array('index' => true, 'view' => true, 'modificar' => true);
		
		// Parametros informativos
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/ParametrosInformativos/index')) $permisos['index'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/ParametrosInformativos/view')) $permisos['view'] = false;
		
		// Valores
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/view')) $permisos['modificar'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/add')) $permisos['modificar'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/edit')) $permisos['modificar'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Valores/delete')) $permisos['modificar'] = false;
		
		return $permisos;
	}
	
	private function setPermisosReportes($usuario = null, $permisos = null) {
		if($permisos['artesanos']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteArtesanos');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/DatosPersonales/reporteArtesanos');
		}
		if($permisos['calificaciones_operador']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteCalificacionesOperador');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteCalificacionesOperador');
		}
		if($permisos['calificaciones_artesano']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteCalificacionesArtesano');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteCalificacionesArtesano');
		}
		if($permisos['inspecciones']) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteInspecciones');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteInspecciones');
		}
	}
	
	private function getPermisosReportes($usuario = null) {
		$permisos = array('artesanos' => true, 'calificaciones_operador' => true, 'calificaciones_artesano' => true, 'inspecciones' => true);
		
		// artesanos
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteArtesanos')) $permisos['artesanos'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/DatosPersonales/reporteArtesanos')) $permisos['artesanos'] = false;
		
		// calificaciones_operador
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteCalificacionesOperador')) $permisos['calificaciones_operador'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteCalificacionesOperador')) $permisos['calificaciones_operador'] = false;
		
		// calificaciones_artesano
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteCalificacionesArtesano')) $permisos['calificaciones_artesano'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteCalificacionesArtesano')) $permisos['calificaciones_artesano'] = false;
		
		// inspecciones
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Reportes/reporteInspecciones')) $permisos['inspecciones'] = false;
		if(!$this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/reporteInspecciones')) $permisos['inspecciones'] = false;
		
		return $permisos;
	}
	
	private function setPermisosInspectores($usuario = null, $asignar = null) {
		if($asignar) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/inspecciones');
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Artesanos/modificarCalificacion');
		} else {
			$this -> Acl -> deny($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/inspecciones');
		}
	}
	
	private function getPermisosInspectores($usuario = null) {
		// TODO : Se requiere este método?
	}
	
	private function setPermisosInventarioActivosFijos($usuario = null, $asignar = null) {
		if($asignar) {
			$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/inspecciones');
		} else {
			$this -> Acl -> deny($usuario['Usuario']['usu_nombre_de_usuario'], 'controllers/Calificaciones/inspecciones');
		}
	}
	
	private function getPermisosInventarioActivosFijos($usuario = null) {
		// TODO : Se requiere este método?
	}
	
	/**
	 * initAcl method
	 *
	 * @return void
	 */
	public function inicializarAcl() {
		$this -> autoRender = false;

		/**
		 * Limpiar las tablas
		 */

		// Limpiar ARO's vs ACO's
			$this -> Usuario -> query('TRUNCATE TABLE aros_acos;');
		// Limpiar ARO's
			$this -> Usuario -> query('TRUNCATE TABLE aros;');
		// Limpiar ACO's
			$this -> Usuario -> query('TRUNCATE TABLE acos;');
		// Limpiar Auditorias
			$this -> Usuario -> query('TRUNCATE TABLE auditorias;');
		// Limpiar Usuarios
			$this -> Usuario -> query('TRUNCATE TABLE usuarios;');

		exec('/var/www/artesanos/app/Console/cake -app /var/www/artesanos/app/ AclExtras.AclExtras aco_sync');

		/**
		 * Agregar Aro's
		 */
		$aro = &$this -> Acl -> Aro;

		// Here's all of our group info in an array we can iterate through
		$roles = array(
			0 => array(
				'foreign_key' => 1,
				'model' => 'Rol',
				'alias' => 'Administrador'
			),
			1 => array(
				'foreign_key' => 2,
				'model' => 'Rol',
				'alias' => 'Operador'
			),
			2 => array(
				'foreign_key' => 3,
				'model' => 'Rol',
				'alias' => 'Inspector'
			)
		);

		// Iterate and create ARO groups
		foreach ($roles as $data) {
			// Remember to call create() when saving in loops...
			$aro -> create();

			// Save data
			$aro -> save($data);
		}

		/**
		 * Usuarios
		 */

		// Administrador
		$this -> Usuario -> create();
		$usuario = array();
		$usuario['Usuario']['usu_nombre_de_usuario'] = 'admin';
		$usuario['Usuario']['usu_contrasena'] = 'admin';
		$usuario['Usuario']['usu_cedula'] = 'admin';
		$usuario['Usuario']['usu_nombres_y_apellidos'] = 'admin';
		$usuario['Usuario']['usu_activo'] = true;
		$usuario['Usuario']['rol_id'] = 1;
		$this -> Usuario -> save($usuario);
		
		// tratando de arreglar lo del alias en la tabla aros
		$id_usuario = $this -> Usuario -> id;
		$alias_usuario = $usuario['Usuario']['usu_nombre_de_usuario'];
		$this -> Usuario -> query("UPDATE `aros` SET `alias`='$alias_usuario' WHERE `model`='Usuario' AND `foreign_key`=$id_usuario");
		
		// Se permite acceso total a los administradores
		$this -> Acl -> allow('Administrador', 'controllers');

		// Se le niega totalmente el acceso a los operadores e inspectores de manera inicial
		$this -> Acl -> deny('Operador', 'controllers');
		$this -> Acl -> deny('Inspector', 'controllers');
		
		/**
		 * Finished
		 */
		echo 'Usuario Administrativo Y Permisos Inicializados';
		exit ;
	}

}
