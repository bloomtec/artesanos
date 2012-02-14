<?php
App::uses('AppController', 'Controller');
/**
 * Cantones Controller
 *
 * @property Canton $Canton
 */
class CantonesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getCantones', 'getByProvincia');
	}

	public function beforeRender() {
		$this -> layout = "parametros";
	}

	public function getByProvincia($provId) {
		$this -> layout = "ajax";
		echo json_encode($this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provId))));
		exit(0);
	}

	public function getCantones($provincia_id = null) {
		if ($provincia_id) {
			return $this -> Canton -> find('all', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provincia_id)));
		} else {
			return $this -> Canton -> find('all', array('order' => array('Canton.can_nombre' => 'ASC')));
		}
	}

	public function getNombre($id) {
		$canton = $this -> Canton -> read('can_nombre', $id);
		return $canton['Canton']['can_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Canton -> id = $id;
		if (!$this -> Canton -> exists()) {
			throw new NotFoundException(__('Invalid canton'));
		}
		$this -> set('canton', $this -> Canton -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Canton -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Canton -> create();
			if ($this -> Canton -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The canton has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The canton could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$provincias = $this -> Canton -> Provincia -> find('list');
		$this -> set(compact('provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Canton -> currentUsrId = $this -> Auth -> user('id');
		$this -> Canton -> id = $id;
		if (!$this -> Canton -> exists()) {
			throw new NotFoundException(__('Invalid canton'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Canton -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The canton has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The canton could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Canton -> read(null, $id);
		}
		$provincias = $this -> Canton -> Provincia -> find('list');
		$this -> set(compact('provincias'));
	}

}
