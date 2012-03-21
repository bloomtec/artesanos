<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {
	
	function indexSuministros(){
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate(array('ite_is_activo_fijo'=>false)));
	}
	
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function viewSuministro($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this -> set('item', $this -> Item -> read(null, $id));
	}
	
	private function uploadSuministroFile($tmp_name = null, $filename = null) {
		if($tmp_name && $filename) {			
			$url = 'files/uploads/suministros'.$filename;			
			return move_uploaded_file($tmp_name, $url);
		}
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function agregarSuministro() {
		if ($this -> request -> is('post')) {
			// TODO : Tener en cuenta el tipo de item para este código!!!!
			$max_id = $this -> Item -> query('SELECT MAX(`id`) FROM `items`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if (!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			// Asignar el campo de activo fijo
			$this -> request -> data['Item']['ite_is_activo_fijo'] = false;
			$this -> Item -> create();
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
	}
	
	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function editSuministro($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Item -> read(null, $id);
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
	}
	
	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function deleteSuministro($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> Item -> delete()) {
			$this -> Session -> setFlash(__('Item deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Item was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function indexActivosFijos() {
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate(array('ite_is_activo_fijo'=>true)));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function viewActivoFijo($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this -> set('item', $this -> Item -> read(null, $id));
	}
	
	private function uploadActivoFijoFile($tmp_name = null, $filename = null) {
		if($tmp_name && $filename) {			
			$url = 'files/uploads/activosFijos/'.$filename;			
			return move_uploaded_file($tmp_name, $url);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function agregarActivoFijo() {
		/**
		 * Para el correcto ingreso de item de inventario proceder así:
		 * 1. Tener el listado de ítems para seleccionar el respectivo item a agregar.
		 * 2. Generar el ingreso de inventario.
		 * 3. Generar los items del ingreso de inventario
		 */
		if ($this -> request -> is('post')) {
			if(!empty($this -> request -> data['Documento']['upload']['name']) && !$this -> request -> data['Documento']['upload']['error']) {
				$now = new DateTime('now');
				$filename = $now->format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['Documento']['upload']['name']);
				if($this -> uploadActivoFijoFile($this -> request -> data['Documento']['upload']['tmp_name'], $filename)) {
					$this -> request -> data['IngresosDeInventario']['ing_archivo_soporte'] = 'files/uploads/activosFijos/'.$filename;
				}
			}
			/*
			// TODO : Tener en cuenta el tipo de item para este código!!!!
			$max_id = $this -> Item -> query('SELECT MAX(`id`) FROM `items`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if (!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			// Asignar el campo de activo fijo
			$this -> request -> data['Item']['ite_is_activo_fijo'] = true;
			 */
			$this -> Item -> IngresosDeInventario -> create();
			if ($this -> Item -> IngresosDeInventario -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró el ingreso de activos fijos'), 'crud/success');
				$this -> redirect(array('action' => 'indexActivosFijos'));
			} else {
				$this -> Session -> setFlash(__('No se pudo hacer el registro de activos fijos. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$items = $this -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => true)));
		$tiposDeItems = $this -> Item -> getValores(15);
		$departamentos = $this -> Item -> getValores(14);
		$personas = $this -> Item -> IngresosDeInventario -> Persona -> find('list');
		$proveedores = $this -> Item -> IngresosDeInventario -> Proveedor -> find('list');
		$this -> set(compact('items', 'tiposDeItems', 'departamentos', 'personas', 'proveedores'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function editActivoFijo($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Item -> read(null, $id);
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function deleteActivoFijo($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> Item -> delete()) {
			$this -> Session -> setFlash(__('Item deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Item was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate());
	}
	
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this -> set('item', $this -> Item -> read(null, $id));
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			// TODO : Tener en cuenta el tipo de item para este código!!!!
			$max_id = $this -> Item -> query('SELECT MAX(`id`) FROM `items`');
			$max_id = $max_id[0][0]['MAX(`id`)'];
			if (!$max_id) {
				$max_id = 1;
			} else {
				$max_id += 1;
			}
			$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			$this -> Item -> create();
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
	}
	
	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Item -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The item has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The item could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Item -> read(null, $id);
		}
		$tiposDeItems = $this -> Item -> getValores(15);
		$this -> set(compact('tiposDeItems'));
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
		$this -> Item -> id = $id;
		if (!$this -> Item -> exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this -> Item -> delete()) {
			$this -> Session -> setFlash(__('Item deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Item was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
