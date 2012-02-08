<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class ConfiguracionesController extends AppController {
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Configuracion -> recursive = 0;
		$this -> set('configuraciones', $this -> paginate());
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Configuracion -> currentUsrId = $this -> Auth -> user('id');
		$this -> Configuracion -> id = $id;
		if (!$this -> Configuracion -> exists()) {
			throw new NotFoundException(__('Invalid configuracion'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Configuracion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The configuracion has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The configuracion could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Configuracion -> read(null, $id);
		}
	}

}
