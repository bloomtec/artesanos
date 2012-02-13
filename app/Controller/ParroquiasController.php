<?php
App::uses('AppController', 'Controller');
/**
 * Parroquias Controller
 *
 * @property Parroquia $Parroquia
 */
class ParroquiasController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getParroquias');
	}
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}
	
	public function getParroquias($sector_id = null) {
		if($sector_id) {
			return $this -> Parroquia -> find('all', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $sector_id)));
		} else {
			return $this -> Parroquia -> find('all', array('order' => array('Parroquia.par_nombre' => 'ASC')));
		}
	}
	
	public function getNombre($id) {
		$parroquia = $this -> Parroquia -> read('par_nombre', $id);
		return $parroquia['Parroquia']['par_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Parroquia -> id = $id;
		if (!$this -> Parroquia -> exists()) {
			throw new NotFoundException(__('Invalid parroquia'));
		}
		$this -> set('parroquia', $this -> Parroquia -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Parroquia -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Parroquia -> create();
			if ($this -> Parroquia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The parroquia has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The parroquia could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$sectores = $this -> Parroquia -> Sector -> find('list');
		$this -> set(compact('sectores'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Parroquia -> currentUsrId = $this -> Auth -> user('id');
		$this -> Parroquia -> id = $id;
		if (!$this -> Parroquia -> exists()) {
			throw new NotFoundException(__('Invalid parroquia'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Parroquia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The parroquia has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The parroquia could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Parroquia -> read(null, $id);
		}
		$sectores = $this -> Parroquia -> Sector -> find('list');
		$this -> set(compact('sectores'));
	}

}
