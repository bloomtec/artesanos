<?php
App::uses('AppController', 'Controller');
/**
 * JuntasProvinciales Controller
 *
 * @property JuntasProvincial $JuntasProvincial
 */
class JuntasProvincialesController extends AppController {

	/**
	 * Listado de juntas provinciales
	 *
	 * @return void
	 */
	public function index() {
		$this -> JuntasProvincial -> recursive = 0;
		$this -> set('juntasProvinciales', $this -> paginate());
	}

	/**
	 * Ver junta provincial
	 *
	 * @param int $id ID de la junta provincial
	 * @return void
	 */
	public function view($id) {
		$this -> JuntasProvincial -> id = $id;
		if (!$this -> JuntasProvincial -> exists()) {
			throw new NotFoundException(__('Junta provincial no valida'));
		}
		$this -> set('juntasProvincial', $this -> JuntasProvincial -> read(null, $id));
	}

	/**
	 * Agregar junta provincial
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
	 * Modificar junta provincial
	 *
	 * @param int $id ID de la junta provincial
	 * @return void
	 */
	public function edit($id) {
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
	 * Eliminar junta provincial
	 *
	 * @param int $id ID de la junta provincial
	 * @return void
	 */
	public function delete($id) {
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
