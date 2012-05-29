<?php
App::uses('AppController', 'Controller');
/**
 * Personas Controller
 *
 * @property Persona $Persona
 */
class PersonasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getPersonasByDepartment');
	}

	/**
	 * Listar personas
	 *
	 * @return void
	 */
	public function index() {
		$this -> Persona -> recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			$conditions = array('OR' => array('Persona.per_nombres LIKE' => "%$query%", 'Persona.per_apellidos LIKE' => "%$query%", 'Persona.per_departamento LIKE' => "%$query%", 'Persona.per_documento_de_identidad	 LIKE' => "%$query%", ));

		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$this -> set('personas', $this -> paginate());
	}

	/**
	 * Ver persona
	 *
	 * @param int $id ID de la persona
	 * @return void
	 */
	public function view($id) {
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Persona no encontrada'));
		}
		$this -> set('persona', $this -> Persona -> read(null, $id));
	}

	/**
	 * Agregar persona
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Persona -> create();
			if ($this -> Persona -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La persona se ha guardado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la persona. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$departamentos = $this -> Persona -> getValores(14);
		$this -> set('departamentos', $departamentos);
	}

	/**
	 * Modificar persona
	 *
	 * @param int $id ID de la persona
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Persona no encontrada'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Persona -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La persona se ha guardado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la persona. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Persona -> read(null, $id);
		}
		$departamentos = $this -> Persona -> getValores(14);
		$this -> set('departamentos', $departamentos);
	}

	/**
	 * Eliminar persona
	 *
	 * @param int $id ID de la persona
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Persona no encontrada'));
		}
		if ($this -> Persona -> delete()) {
			$this -> Session -> setFlash(__('Persona borrada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar la persona'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function getPersonasByDepartment($dep_name = null) {
		$this -> layout = 'ajax';
		echo json_encode($this -> Persona -> find('list', array('conditions' => array('Persona.per_departamento' => $dep_name))));
		exit(0);
	}

}
