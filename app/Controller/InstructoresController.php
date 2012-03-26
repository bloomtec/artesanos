<?php App::uses('AppController', 'Controller');
/**
 * Instructores Controller
 *
 * @property Instructor $Instructor
 */
class InstructoresController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			$instructores = $this -> Instructor -> find('list', array('conditions' => array('OR' => array('Instructor.ins_nombres LIKE' => "%$query%", 'Instructor.ins_apellido_paterno LIKE' => "%$query%", 'Instructor.ins_apellido_materno LIKE' => "%$query%", 'Instructor.ins_nacionalidad LIKE' => "%$query%", 'Instructor.ins_documento_de_identificacion LIKE' => "%$query%", 'Instructor.ins_fecha_de_nacimiento LIKE' => "%$query%")), 'fields' => array('Instructor.id')));
			$conditions['Instructor.id'] = $alumnos;
		}
		$this -> paginate = array('conditions' => $conditions);
		$this -> Instructor -> recursive = 0;
		$this -> set('instructores', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Instructor -> id = $id;
		if (!$this -> Instructor -> exists()) {
			throw new NotFoundException(__('Instructor no válido'));
		}
		$this -> set('instructor', $this -> Instructor -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Instructor -> create();
			if ($this -> Instructor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el instructor'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el instructor. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$nacionalidades = $this -> Instructor -> getValores(1);
		$tipos_de_sangre = $this -> Instructor -> getValores(2);
		$estados_civiles = $this -> Instructor -> getValores(3);
		$grados_de_estudio = $this -> Instructor -> getValores(4);
		$sexos = $this -> Instructor -> getValores(5);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Instructor -> id = $id;
		if (!$this -> Instructor -> exists()) {
			throw new NotFoundException(__('Instructor no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Instructor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el instructor'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el instructor. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Instructor -> read(null, $id);
		}
		$nacionalidades = $this -> Instructor -> getValores(1);
		$tipos_de_sangre = $this -> Instructor -> getValores(2);
		$estados_civiles = $this -> Instructor -> getValores(3);
		$grados_de_estudio = $this -> Instructor -> getValores(4);
		$sexos = $this -> Instructor -> getValores(5);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos'));
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
		$this -> Instructor -> id = $id;
		if (!$this -> Instructor -> exists()) {
			throw new NotFoundException(__('Instructor no válido'));
		}
		if ($this -> Instructor -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el instructor'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el instructor'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
 