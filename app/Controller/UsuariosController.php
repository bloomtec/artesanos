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
		$this -> Auth -> allow('initAcl');
		// $this -> Auth -> allow();
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
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$ciudades = $this -> Usuario -> Ciudad -> find('list');
		$ubicaciones = $this -> Usuario -> Ubicacion -> find('list');
		$sectores = $this -> Usuario -> Sector -> find('list');
		$roles = $this -> Usuario -> Rol -> find('list');
		$this -> set(compact('ciudades', 'ubicaciones', 'sectores', 'roles'));
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
				$this -> Session -> setFlash(__('Se guardó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Usuario -> read(null, $id);
		}
		$ciudades = $this -> Usuario -> Ciudad -> find('list');
		$ubicaciones = $this -> Usuario -> Ubicacion -> find('list');
		$sectores = $this -> Usuario -> Sector -> find('list');
		$roles = $this -> Usuario -> Rol -> find('list');
		$this -> set(compact('ciudades', 'ubicaciones', 'sectores', 'roles'));
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

	/**
	 * initAcl method
	 *
	 * @return void
	 */
	public function initAcl() {
		$this -> autoRender = false;

		/**
		 * Limpiar las tablas
		 */

		// Limpiar usuarios
		$this -> Usuario -> query('TRUNCATE TABLE usuarios;');
		// Limpiar roles
		$this -> Usuario -> Rol -> query('TRUNCATE TABLE roles;');

		/**
		 * Roles
		 */

		// Administrador
		$this -> Usuario -> Rol -> create();
		$rol = array();
		$rol['Rol']['nombre'] = 'Administrador';
		$rol['Rol']['descripcion'] = '';
		$this -> Usuario -> Rol -> save($rol);
		
		// Administrador
		$this -> Usuario -> Rol -> create();
		$rol = array();
		$rol['Rol']['nombre'] = 'Operador';
		$rol['Rol']['descripcion'] = '';
		$this -> Usuario -> Rol -> save($rol);

		/**
		 * Usuarios
		 */

		// Administrador
		$this -> Usuario -> create();
		$usuario = array();
		$usuario['Usuario']['usuario'] = 'admin';
		$usuario['Usuario']['contrasena'] = 'admin';
		$usuario['Usuario']['con_acceso'] = true;
		$usuario['Usuario']['rol_id'] = 1;
		$this -> Usuario -> save($usuario);

		echo 'Usuarios Y Permisos Inicializados';
	}

}
