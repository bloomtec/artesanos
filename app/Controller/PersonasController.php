<?php
App::uses('AppController', 'Controller');
/**
 * Personas Controller
 *
 * @property Persona $Persona
 */
class PersonasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Persona -> recursive = 0;
		$this -> set('personas', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Invalid persona'));
		}
		$this -> set('persona', $this -> Persona -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Persona -> create();
			if ($this -> Persona -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The persona has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The persona could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$departamentos = $this -> Persona -> getValores(14);
		$this -> set('departamentos', $departamentos);
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Invalid persona'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Persona -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The persona has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The persona could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Persona -> read(null, $id);
		}
		$departamentos = $this -> Persona -> getValores(14);
		$this -> set('departamentos', $departamentos);
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
		$this -> Persona -> id = $id;
		if (!$this -> Persona -> exists()) {
			throw new NotFoundException(__('Invalid persona'));
		}
		if ($this -> Persona -> delete()) {
			$this -> Session -> setFlash(__('Persona deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Persona was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
