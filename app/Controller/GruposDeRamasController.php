<?php
App::uses('AppController', 'Controller');
/**
 * GruposDeRamas Controller
 *
 * @property GruposDeRama $GruposDeRama
 */
class GruposDeRamasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> GruposDeRama -> recursive = 0;
		$this -> set('gruposDeRamas', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Invalid grupos de rama'));
		}
		$this -> set('gruposDeRama', $this -> GruposDeRama -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GruposDeRama -> create();
			if ($this -> GruposDeRama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The grupos de rama has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The grupos de rama could not be saved. Please, try again.'), 'crud/error');
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Invalid grupos de rama'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> GruposDeRama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The grupos de rama has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The grupos de rama could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> GruposDeRama -> read(null, $id);
		}
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
		$this -> GruposDeRama -> id = $id;
		if (!$this -> GruposDeRama -> exists()) {
			throw new NotFoundException(__('Invalid grupos de rama'));
		}
		if ($this -> GruposDeRama -> delete()) {
			$this -> Session -> setFlash(__('Grupos de rama deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Grupos de rama was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
