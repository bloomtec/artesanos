<?php
App::uses('AppController', 'Controller');
/**
 * Ramas Controller
 *
 * @property Rama $Rama
 */
class RamasController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('obtenerPorGrupo', 'getNombre', 'getByCode');
	}

	public function beforeRender() {
		//$this -> layout = 'parametros';
	}
	
	public function getNombre($id) {
		$rama = $this -> Rama -> read('ram_nombre', $id);
		return $rama['Rama']['ram_nombre'];
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
			throw new NotFoundException(__('Rama no válida'));
		}
		$this -> set('rama', $this -> Rama -> read(null, $id));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * add method
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
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
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
			throw new NotFoundException(__('Rama no válida'));
		}
		if ($this -> Rama -> delete()) {
			$this -> Session -> setFlash(__('Se ha eliminado la rama'), 'crud/success');
			$this -> redirect($this -> referer());
		}
		$this -> Session -> setFlash(__('No se ha eliminado la rama'), 'crud/error');
		$this -> redirect($this -> referer());
	}

	
	function obtenerPorGrupo($grupoRamaId = null){
		echo json_encode($this -> Rama -> find ('list',array('conditions'=>array('Rama.grupos_de_rama_id'=>$grupoRamaId))));
		$this -> autoRender = false;
	}
	
	function getByCode($code) {
		$this -> Rama -> recursive = -1;
		echo json_encode($this -> Rama -> find('first', array('conditions' => array('Rama.ram_codigo' => $code))));
		$this -> autoRender = false;
	}

}