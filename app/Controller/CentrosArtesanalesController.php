<?php
App::uses('AppController', 'Controller');
/**
 * CentrosArtesanales Controller
 *
 * @property CentrosArtesanal $CentrosArtesanal
 */
class CentrosArtesanalesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> CentrosArtesanal -> recursive = 0;
		$this -> set('centrosArtesanales', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		$this -> set('centrosArtesanal', $this -> CentrosArtesanal -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> CentrosArtesanal -> create();
			if ($this -> CentrosArtesanal -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El centro artesanal ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el centro artesanal. Por favor, intenta de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> CentrosArtesanal -> Provincia -> find('list');
		//$cantones = $this -> CentrosArtesanal -> Canton -> find('list');
		//$ciudades = $this -> CentrosArtesanal -> Ciudad -> find('list');
		//$parroquias = $this -> CentrosArtesanal -> Parroquia -> find('list');
		//$this -> set(compact('provincias', 'cantones', 'ciudades', 'parroquias'));
		$this -> set(compact('provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> CentrosArtesanal -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El centro artesanal ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el centro artesanal. Por favor, intenta de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> CentrosArtesanal -> read(null, $id);
		}
		$provincias = $this -> CentrosArtesanal -> Provincia -> find('list');
		$cantones = $this -> CentrosArtesanal -> Canton -> find('list');
		$ciudades = $this -> CentrosArtesanal -> Ciudad -> find('list');
		$parroquias = $this -> CentrosArtesanal -> Parroquia -> find('list');
		$this -> set(compact('provincias', 'cantones', 'ciudades', 'parroquias'));
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
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		if ($this -> CentrosArtesanal -> delete()) {
			$this -> Session -> setFlash(__('Centros artesanal borrado'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar el centro artesanal'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
