<?php
App::uses('AppController', 'Controller');
/**
 * Ramas Controller
 *
 * @property Rama $Rama
 */
class RamasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('obtenerPorGrupo', 'getNombre', 'getByCode');
	}
	
	/**
	 * Obtener el nombre de una rama.
	 *
	 * @param int $id ID de la rama que se quiere obtener el nombre.
	 * @return Nombre de la cuya ID fue pasado por parámetro.
	 */
	public function getNombre($id) {
		$rama = $this -> Rama -> read('ram_nombre', $id);
		return $rama['Rama']['ram_nombre'];
	}

	/**
	 * Listado de ramas
	 *
	 * @return void
	 */
	public function index() {
		$this -> Rama -> recursive = 0;
		$this -> set('ramas', $this -> paginate());
	}

	/**
	 * Ver una rama
	 *
	 * @param int $id ID de la rama que se quiere ver
	 * 
	 * @return void
	 */
	public function view($id) {
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Rama no válida'));
		}
		$this -> set('rama', $this -> Rama -> read(null, $id));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * Agregar una rama
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Rama -> create();
			if ($this -> Rama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la rama'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la rama. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$gruposDeRamas = $this -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('gruposDeRamas'));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * Modificar una rama
	 *
	 * @param int $id ID de la rama que se quiere modificar
	 * @return void
	 */
	public function edit($id) {
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Rama no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Rama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la rama'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la rama. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Rama -> read(null, $id);
		}
		$gruposDeRamas = $this -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('gruposDeRamas'));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * Eliminar una rama
	 *
	 * @param int $id ID de la rama que se quiere eliminar
	 * 
	 * @return void
	 */
	public function delete($id) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Rama no válida'));
		}
		if ($this -> Rama -> delete()) {
			$this -> Session -> setFlash(__('Se ha eliminado la rama'), 'crud/success');
			$this -> redirect($this -> referer());
		}
		$this -> Session -> setFlash(__('No se ha eliminado la rama'), 'crud/error');
		$this -> redirect($this -> referer());
	}
	
	/**
	 * Obtener las ramas de un grupo de ramas
	 * 
	 * @param int $grupoRamaId ID del grupo de ramas
	 * 
	 * @return Arreglo codificado en JSON con las ramas pertenecientes al grupo de ramas correspondiente
	 */
	function obtenerPorGrupo($grupoRamaId) {
		echo json_encode($this -> Rama -> find('list', array('conditions' => array('Rama.grupos_de_rama_id' => $grupoRamaId))));
		$this -> autoRender = false;
	}
	
	/**
	 * Obtener una rama por código
	 * 
	 * @param int $code Código de la rama
	 * 
	 * @return Arreglo codificado en JSON con la rama cuyo código corresponde
	 */
	function getByCode($code) {
		$this -> Rama -> recursive = -1;
		echo json_encode($this -> Rama -> find('first', array('conditions' => array('Rama.ram_codigo' => $code))));
		$this -> autoRender = false;
	}

}
