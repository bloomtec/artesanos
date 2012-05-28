<?php
App::uses('AppController', 'Controller');
/**
 * Facturas Controller
 *
 * @property Factura $Factura
 */
class FacturasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Factura -> recursive = 0;
		$this -> set('facturas', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Factura -> id = $id;
		if (!$this -> Factura -> exists()) {
			throw new NotFoundException(__('Factura no válida'));
		}
		$this -> set('factura', $this -> Factura -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Factura -> create();
			if ($this -> Factura -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la factura'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar la factura. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Factura -> Provincia -> find('list');
		$cantones = $this -> Factura -> Canton -> find('list');
		$ciudades = $this -> Factura -> Ciudad -> find('list');
		$this -> set(compact('provincias', 'cantones', 'ciudades'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Factura -> id = $id;
		if (!$this -> Factura -> exists()) {
			throw new NotFoundException(__('Factura no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Factura -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la factura'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar la factura. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Factura -> read(null, $id);
		}
		$provincias = $this -> Factura -> Provincia -> find('list');
		$cantones = $this -> Factura -> Canton -> find('list');
		$ciudades = $this -> Factura -> Ciudad -> find('list');
		$this -> set(compact('provincias', 'cantones', 'ciudades'));
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
		$this -> Factura -> id = $id;
		if (!$this -> Factura -> exists()) {
			throw new NotFoundException(__('Factura no válida'));
		}
		if ($this -> Factura -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la factura'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la factura'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
