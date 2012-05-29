<?php
App::uses('AppController', 'Controller');
/**
 * GruposDeRamas Controller
 *
 * @property GruposDeRama $GruposDeRama
 */
class GruposDeRamasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre');
	}
	
	/**
	 * Obtener el nombre del grupo de ramas
	 * @param int $id ID del grupo de ramas
	 * @return El nombre del grupo de ramas
	 */
	public function getNombre($id) {
		$grupo = $this -> GruposDeRama -> read('gru_nombre', $id);
		if (empty($grupo)) {
			return '<b>:: eliminado ::</b>';
		} else {
			return $grupo['GruposDeRama']['gru_nombre'];
		}
	}

	/**
	 * Listado de grupos de ramas
	 *
	 * @return void
	 */
	public function index() {
		$this -> GruposDeRama -> recursive = 0;
		$this -> set('gruposDeRamas', $this -> paginate());
	}

	/**
	 * Ver un grupo de ramas
	 *
	 * @param int $id ID del grupo de ramas
	 * @return void
	 */
	public function view($id) {
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Grupo de ramas no válido'));
		}
		$this -> set('gruposDeRama', $this -> GruposDeRama -> read(null, $id));
		$this -> set('ramas', $this -> GruposDeRama -> Rama -> find('all', array('order' => array('Rama.ram_nombre' => 'ASC'), 'conditions' => array('Rama.grupos_de_rama_id' => $id))));
	}

	/**
	 * Agregar grupo de ramas
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GruposDeRama -> create();
			if ($this -> GruposDeRama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el grupo de ramas'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el grupo de ramas. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * Modificar grupo de ramas
	 *
	 * @param int $id ID del grupo de ramas
	 * @return void
	 */
	public function edit($id = null) {
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Grupo de ramas no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> GruposDeRama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el grupo de ramas'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el grupo de ramas. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> GruposDeRama -> read(null, $id);
		}
	}

	/**
	 * Eliminar grupo de ramas
	 *
	 * @param int $id ID del grupo de ramas
	 * @return void
	 */
	public function delete($id) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Grupo de ramas no válido'));
		}
		if ($this -> GruposDeRama -> delete()) {
			$this -> Session -> setFlash(__('Se ha eliminado el grupo de ramas'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se ha eliminado el grupo de ramas'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
