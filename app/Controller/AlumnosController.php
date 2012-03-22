<?php
App::uses('AppController', 'Controller');
/**
 * Alumnos Controller
 *
 * @property Alumno $Alumno
 */
class AlumnosController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Alumno -> recursive = 0;
		$this -> set('alumnos', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		$this -> set('alumno', $this -> Alumno -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Alumno -> create();
			if ($this -> Alumno -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha registrado el alumno'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar el alumno. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Alumno no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Alumno -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha registrado el alumno'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar el alumno. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Alumno -> read(null, $id);
		}
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
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
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Invalid alumno'));
		}
		if ($this -> Alumno -> delete()) {
			$this -> Session -> setFlash(__('Alumno deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Alumno was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
