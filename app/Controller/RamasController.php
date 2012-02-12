<?php
App::uses('AppController', 'Controller');
/**
 * Ramas Controller
 *
 * @property Rama $Rama
 */
class RamasController extends AppController {
	
	public function beforeRender() {
		$this -> layout = 'parametros';
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Rama -> recursive = 0;
		$this -> set('ramas', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		$this -> set('rama', $this -> Rama -> read(null, $id));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($group_id = null) {
		if ($this -> request -> is('post')) {
			$this -> Rama -> create();
			if ($this -> Rama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The rama has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'grupos_de_ramas', 'action' => 'view', $group_id));
			} else {
				$this -> Session -> setFlash(__('The rama could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$gruposDeRamas = $this -> Rama -> GruposDeRama -> find('list', array('conditions' => array('GruposDeRama.id'=>$group_id)));
		$this -> set(compact('gruposDeRamas'));
		$this -> set('value', $group_id);
		$this -> set('referer', $this -> referer());
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Rama -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The rama has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The rama could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Rama -> read(null, $id);
		}
		$gruposDeRamas = $this -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('gruposDeRamas'));
		$this -> set('referer', $this -> referer());
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
		$this -> Rama -> id = $id;
		if (!$this -> Rama -> exists()) {
			throw new NotFoundException(__('Invalid rama'));
		}
		if ($this -> Rama -> delete()) {
			$this -> Session -> setFlash(__('Rama deleted'), 'crud/success');
			$this -> redirect($this -> referer());
		}
		$this -> Session -> setFlash(__('Rama was not deleted'), 'crud/error');
		$this -> redirect($this -> referer());
	}
	
	function obtenerPorGrupo($grupoRamaId = null){
		return $this -> Rama -> find ('list',array('conditions'=>array('grupo_de_rama_id'=>$grupoRamaId)));
	}

}
