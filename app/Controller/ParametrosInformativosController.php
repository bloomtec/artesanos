<?php
App::uses('AppController', 'Controller');
/**
 * ParametrosInformativos Controller
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class ParametrosInformativosController extends AppController {
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> ParametrosInformativo -> recursive = 0;
		$this -> set('parametrosInformativos', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> ParametrosInformativo -> id = $id;
		if (!$this -> ParametrosInformativo -> exists()) {
			throw new NotFoundException(__('Invalid parametros informativo'));
		}
		$this -> set('parametrosInformativo', $this -> ParametrosInformativo -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> ParametrosInformativo -> create();
			if ($this -> ParametrosInformativo -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The parametros informativo has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The parametros informativo could not be saved. Please, try again.'), 'crud/error');
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
		$this -> ParametrosInformativo -> id = $id;
		if (!$this -> ParametrosInformativo -> exists()) {
			throw new NotFoundException(__('Invalid parametros informativo'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> ParametrosInformativo -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The parametros informativo has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The parametros informativo could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> ParametrosInformativo -> read(null, $id);
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
		$this -> ParametrosInformativo -> id = $id;
		if (!$this -> ParametrosInformativo -> exists()) {
			throw new NotFoundException(__('Invalid parametros informativo'));
		}
		if ($this -> ParametrosInformativo -> delete()) {
			$this -> Session -> setFlash(__('Parametros informativo deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Parametros informativo was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
