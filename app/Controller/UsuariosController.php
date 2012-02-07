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
		$this -> Auth -> allow('inicializarAcl');
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
	
	public function getNombreDeUsuario($id) {
		$data = $this -> Usuario -> read('usu_nombre_de_usuario', $id);
		return $data['Usuario']['usu_nombre_de_usuario'];
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
		$permisos['Permisos'] = $this -> getValoresPermisos($id);
		$this -> set(compact('permisos'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Usuario -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Usuario -> create();
			if ($this -> Usuario -> save($this -> request -> data)) {
				// tratando de arreglar lo del alias en la tabla aros
				$user_id = $this -> Usuario -> id;
				$user_alias = $this -> request -> data['Usuario']['usu_nombre_de_usuario'];
				$this -> Usuario -> query("UPDATE `aros` SET `alias`='$user_alias' WHERE `model`='Usuario' AND `foreign_key`=$user_id");
				$this -> setInfoPermisos($this -> Usuario -> id, $this -> request -> data['Permisos']);
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$roles = $this -> Usuario -> Rol -> find('list');
		$this -> set(compact('roles'));
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
				$this -> setInfoPermisos($this -> request -> data['Usuario']['id'], $this -> request -> data['Permisos']);
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Usuario -> read(null, $id);
		}
		$roles = $this -> Usuario -> Rol -> find('list');
		$permisos['Permisos'] = $this -> getValoresPermisos($id);
		$this -> set(compact('roles', 'permisos'));
	}

	public function getInfoPermisos() {
		return $this -> Usuario -> info_permisos;
	}
	
	public function getValoresPermisos($id_usuario = null) {
		$data = array();
		$this -> recursive = -1;
		$usuario = $this -> Usuario -> find('first', array('conditions' => array('Usuario.id' => $id_usuario)));
		foreach ($this -> Usuario -> info_permisos as $key => $modulo) {
			foreach ($modulo[key($modulo)] as $key => $accion) {
				$ruta = 'controllers/' . key($modulo) . '/' . $key;
				$data[key($modulo)][$key] = $this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], $ruta);
			}
		}
		return $data;
	}

	public function setInfoPermisos($id_usuario = null, $permisos = null) {
		$this -> recursive = -1;
		$usuario = $this -> Usuario -> find('first', array('conditions' => array('Usuario.id' => $id_usuario)));
		if($usuario['Usuario']['rol_id'] == 2) {
			// Se es operador. Asignar acorde los permisos asignados.
			$aro_id = $this -> Usuario -> query("SELECT `id` FROM `aros` WHERE `model`='Usuario' AND `foreign_key`=$id_usuario");
			$aro_id = $aro_id[0]['aros']['id'];
			$this -> Usuario -> query("DELETE FROM `aros_acos` WHERE `aro_id`=$aro_id");
			foreach ($permisos as $modulo => $acciones) {
				foreach ($acciones as $accion => $valor) {
					if($valor) {
						$ruta = 'controllers/' . $modulo . '/' . $accion;
						$this -> Acl -> allow($usuario['Usuario']['usu_nombre_de_usuario'], $ruta);
					}
				}
			}
		} elseif($usuario['Usuario']['rol_id'] == 1) {
			// Caso en que se es administrador. No se requiere hacer algo por lo que se tiene acceso a todo.
		}
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
		
		// Operador
		$this -> Usuario -> create();
		$usuario = array();
		$usuario['Usuario']['usu_nombre_de_usuario'] = 'otro';
		$usuario['Usuario']['usu_contrasena'] = 'otro';
		$usuario['Usuario']['usu_cedula'] = 'otro';
		$usuario['Usuario']['usu_nombres_y_apellidos'] = 'otro';
		$usuario['Usuario']['usu_activo'] = true;
		$usuario['Usuario']['rol_id'] = 2;
		$this -> Usuario -> save($usuario);
		
		// tratando de arreglar lo del alias en la tabla aros
		$id_usuario = $this -> Usuario -> id;
		$alias_usuario = $usuario['Usuario']['usu_nombre_de_usuario'];
		$this -> Usuario -> query("UPDATE `aros` SET `alias`='$alias_usuario' WHERE `model`='Usuario' AND `foreign_key`=$id_usuario");

		// Se permite acceso total a los administradores
		$this -> Acl -> allow('Administrador', 'controllers');

		// Se le niega totalmente el acceso a los operadores de manera inicial
		$this -> Acl -> deny('Operador', 'controllers');
		
		// Se permite el acceso a ciertas acciones por defecto para los operadores
		// Modulo Pages
		$this -> Acl -> allow('Operador', 'controllers/Pages/display');
		// Modulo Usuarios
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/logout');
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/verificarAcceso');
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/getNombreDeUsuario');
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/getInfoPermisos');
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/getValoresPermisos');
		$this -> Acl -> allow('Operador', 'controllers/Usuarios/setInfoPermisos');
		
		/**
		 * Finished
		 */
		echo 'Usuario Administrativo Y Permisos Inicializados';
		exit ;
	}

}
