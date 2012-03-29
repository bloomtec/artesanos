<?php
App::uses('AppController', 'Controller');
/**
 * JuntasProvinciales Controller
 *
 * @property JuntasProvincial $JuntasProvincial
 */
class JuntasProvincialesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> JuntasProvincial -> recursive = 0;
		$this -> set('juntasProvinciales', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> JuntasProvincial -> id = $id;
		if (!$this -> JuntasProvincial -> exists()) {
			throw new NotFoundException(__('Junta provincial no valida'));
		}
		$this -> set('juntasProvincial', $this -> JuntasProvincial -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> JuntasProvincial -> create();
			if ($this -> JuntasProvincial -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la junta provincial'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar la junta provincial. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> JuntasProvincial -> Provincia -> find('list');
		$this -> set(compact('provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> JuntasProvincial -> id = $id;
		if (!$this -> JuntasProvincial -> exists()) {
			throw new NotFoundException(__('Junta provincial no valida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> JuntasProvincial -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la junta provincial'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar la junta provincial. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> JuntasProvincial -> read(null, $id);
		}
		$provincias = $this -> JuntasProvincial -> Provincia -> find('list');
		$this -> set(compact('provincias'));
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
		$this -> JuntasProvincial -> id = $id;
		if (!$this -> JuntasProvincial -> exists()) {
			throw new NotFoundException(__('Junta provincial no valida'));
		}
		if ($this -> JuntasProvincial -> delete()) {
			$this -> Session -> setFlash(__('Juntas provincial deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Juntas provincial was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
