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
		$rol = (int)$this -> Session -> read('Auth.User.rol_id');
		if ($rol === 1) {
			$rol = 'Administrador';
		} elseif ($rol === 2) {
			$role = 'Operador';
		}

		// Armar la ruta
		$ruta = '';
		for ($i = 0; $i < count($this -> params['ruta']); $i++) {
			$ruta .= $this -> params['ruta'][$i];
			if ($i != count($this -> params['ruta']) - 1) {
				$ruta .= '/';
			}
		}
		return $this -> Acl -> check($role, $ruta);
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
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Usuario -> create();
			if ($this -> Usuario -> save($this -> request -> data)) {
				// tratando de arreglar lo del alias en la tabla aros
				$user_id = $this -> Usuario -> id;
				$user_alias = $this -> request -> data['Usuario']['usu_nombre_de_usuario'];
				$this -> Usuario -> query("UPDATE `aros` SET `alias`='$user_alias' WHERE `model`='Usuario' AND `foreign_key`=$user_id");

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
				$this -> _setInfoPermisos($this -> request -> data['Usuario']['id'], $this -> request -> data['Permisos']);
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				//$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Usuario -> read(null, $id);
		}
		$roles = $this -> Usuario -> Rol -> find('list');
		$permisos['Permisos'] = $this -> _getInfoPermisos($id);
		$this -> set(compact('roles', 'permisos'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Usuario -> id = $id;
		if (!$this -> Usuario -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this -> Usuario -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el usuario'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el usuario'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function getInfoPermisos() {
		return $this -> info_permisos;
	}

	private function _getInfoPermisos($id_usuario = null) {
		$data = array();
		$this -> Usuario -> recursive = -1;
		$usuario = $this -> Usuario -> read(null, $id_usuario);
		foreach ($this -> info_permisos as $key => $modulo) {
			foreach ($modulo[key($modulo)] as $key => $accion) {
				$ruta = 'controllers/' . key($modulo) . '/' . $key;
				$data[key($modulo)][$key] = $this -> Acl -> check($usuario['Usuario']['usu_nombre_de_usuario'], $ruta);
			}
		}
		return $data;
	}

	private function _setInfoPermisos($id_usuario = null, $permisos = null) {
		$this -> Usuario -> recursive = -1;
		$usuario = $this -> Usuario -> read(null, $id_usuario);
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
	}

	private $info_permisos = array(0 => array('Usuarios' => array('add' => 'Agregar Usuario', 'edit' => 'Editar Usuario', 'view' => 'Ver Usuario',
	//'delete' => 'Eliminar Usuario',
		'index' => 'Listar Usuarios')), 1 => array('Artesanos' => array('add' => 'Registrar Artesano', 'edit' => 'Editar Artesano', 'view' => 'Ver Artesano',
	//'delete' => 'Eliminar Artesano',
		'index' => 'Listar Artesanos')));

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
		// Limpiar Usuarios
		$this -> Usuario -> query('TRUNCATE TABLE usuarios;');

		exec('/var/www/artesanos/app/Console/cake -app /var/www/artesanos/app/ AclExtras.AclExtras aco_sync');

		/**
		 * Agregar Aro's
		 */
		$aro = &$this -> Acl -> Aro;

		// Here's all of our group info in an array we can iterate through
		$roles = array(0 => array('foreign_key' => 1, 'model' => 'Rol', 'alias' => 'Administrador'), 1 => array('foreign_key' => 2, 'model' => 'Rol', 'alias' => 'Operador'));

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

		/**
		 * Finished
		 */
		echo 'Usuario Administrativo Y Permisos Inicializados';
		exit ;
	}

}
