<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getCantidad');
	}
	
	public function getCantidad($item_id = null) {
		$this -> layout = 'ajax';
		$cantidad = $this -> Item -> read('ite_cantidad', $item_id);
		echo $cantidad['Item']['ite_cantidad'];
		exit(0);
	}

	public function indexSuministros() {
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate(array('ite_is_activo_fijo' => false)));
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
		if ($tmp_name && $filename) {
			$url = 'files/uploads/suministros' . $filename;
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
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			$conditions = array(
						'OR' => array(
							'Item.ite_codigo' => "%$query%",
							'Item.ite_nombre LIKE' => "%$query%",
							'Item.ite_descripcion LIKE' => "%$query%",
				
							)
					);

		}
		$conditions['ite_is_activo_fijo']=true;
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$this -> set('items', $this -> paginate());
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
		if ($tmp_name && $filename) {
			$url = 'files/uploads/activosFijos/' . $filename;
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
		 * falta el código que debe ser consecutivo acorde a los activos fijos o suministros
		 */
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['name']) && !$this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['error']) {
				$now = new DateTime('now');
				$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['name']);
				if ($this -> uploadActivoFijoFile($this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['tmp_name'], $filename)) {
					$this -> request -> data['IngresosDeInventario']['ing_archivo_soporte'] = 'files/uploads/activosFijos/' . $filename;
				}
			}
			$this -> request -> data['IngresosDeInventario']['ing_is_activo_fijo'] = true;
			
			$max_id = $this -> Item -> query('SELECT MAX(`ing_codigo`) FROM `ingresos_de_inventarios` WHERE `ing_is_activo_fijo` = 1');
			$max_id = $max_id[0][0]['MAX(`ing_codigo`)'];
			if (!$max_id) {
				$max_id = 1;
				$this -> request -> data['IngresosDeInventario']['ing_codigo'] = 1000000 + $max_id;
			} else {
				$max_id += 1;
				$this -> request -> data['IngresosDeInventario']['ing_codigo'] = $max_id;
			}			
			$this -> Item -> IngresosDeInventario -> create();
			if ($this -> Item -> IngresosDeInventario -> save($this -> request -> data)) {
				$id = $this -> Item -> IngresosDeInventario -> id;
				// Registrar los items
				foreach($this -> request -> data['ActivosFijos'] as $key => $activoFijo) {
					if($activoFijo['item_id'] && $activoFijo['ing_cantidad'] && ($activoFijo['ing_cantidad'] >= 1) && ($activoFijo['ing_precio_unitario'] > 0) && ($activoFijo['ing_precio_total'] > 0)) {
						$activoFijo['ingresos_de_inventario_id'] = $id;
						$this -> Item -> IngresosDeInventario -> IngresosDeInventariosItem -> create();
						if($this -> Item -> IngresosDeInventario -> IngresosDeInventariosItem -> save($activoFijo)) {
							$item = $this -> Item -> read(null, $activoFijo['item_id']);
							$item['Item']['ite_cantidad'] = $item['Item']['ite_cantidad'] + $activoFijo['ing_cantidad'];
							$item['Item']['item_id'] = $activoFijo['item_id'];
							$this -> Item -> save($item);
						}
					}
				}
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
		/**
		 * Provincias y demas
		 */
		$this -> loadModel('Provincia');
		$this -> loadModel('Canton');
		$this -> loadModel('Ciudad');
		// $provincias_con_inspectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Usuario -> find('list', array('fields' => array('Usuario.provincia_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		$provincias = array(0 => 'Seleccione...');
		// $provincias_tmp = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list', array('conditions' => array('Provincia.id' => $provincias_con_inspectores)));
		$provincias_tmp = $this -> Provincia -> find('list');
		foreach ($provincias_tmp as $key => $value) {
			$provincias[$key] = $value;
		}
		// $cantones = $this -> Canton -> find('list');
		// $ciudades = $this -> Ciudad -> find('list');
		$this -> set(compact('items', 'tiposDeItems', 'departamentos', 'personas', 'proveedores', 'provincias'));
	}
	
	public function egresoActivoFijo() {
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['name']) && !$this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['error']) {
				$now = new DateTime('now');
				$this -> request ->data['EgresosDeInventario']['egr_fecha_de_egreso'] = $now -> format('Y-m-d H:i:s');
				$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['name']);
				if ($this -> uploadActivoFijoFile($this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['tmp_name'], $filename)) {
					$this -> request -> data['EgresosDeInventario']['egr_archivo_soporte'] = 'files/uploads/activosFijos/' . $filename;
				}
			}
			$this -> request -> data['EgresosDeInventario']['egr_is_activo_fijo'] = true;
			
			$max_id = $this -> Item -> query('SELECT MAX(`egr_codigo`) FROM `egresos_de_inventarios` WHERE `egr_is_activo_fijo` = 1');
			$max_id = $max_id[0][0]['MAX(`egr_codigo`)'];
			if (!$max_id) {
				$max_id = 1;
				$this -> request -> data['EgresosDeInventario']['egr_codigo'] = 1000000 + $max_id;
			} else {
				$max_id += 1;
				$this -> request -> data['EgresosDeInventario']['egr_codigo'] = $max_id;
			}
			$this -> Item -> EgresosDeInventario -> create();
			if ($this -> Item -> EgresosDeInventario -> save($this -> request -> data)) {
				$id = $this -> Item -> EgresosDeInventario -> id;
				// Registrar los items
				foreach($this -> request -> data['ActivosFijos'] as $key => $activoFijo) {
					if($activoFijo['item_id'] && $activoFijo['egr_cantidad'] && ($activoFijo['egr_cantidad'] >= 1)) {
						$activoFijo['egresos_de_inventario_id'] = $id;
						$this -> Item -> EgresosDeInventario -> EgresosDeInventariosItem -> create();
						if($this -> Item -> EgresosDeInventario -> EgresosDeInventariosItem -> save($activoFijo)) {
							$item = $this -> Item -> read(null, $activoFijo['item_id']);
							$item['Item']['ite_cantidad'] = $item['Item']['ite_cantidad'] - $activoFijo['egr_cantidad'];
							$item['Item']['item_id'] = $activoFijo['item_id'];
							$this -> Item -> save($item);
						}
					}
				}
				$this -> Session -> setFlash(__('Se registró el egreso de activos fijos'), 'crud/success');
				$this -> redirect(array('action' => 'indexActivosFijos'));
			} else {
				$this -> Session -> setFlash(__('No se pudo hacer el egreso de activos fijos. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$items = $this -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => true)));
		$departamentos = $this -> Item -> getValores(14);
		$personas = $this -> Item -> EgresosDeInventario -> Persona -> find('list');
		$this -> set(compact('items', 'departamentos', 'personas'));
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
