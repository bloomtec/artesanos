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
		$this -> Auth -> allow('getCantidad', 'getCantidadAsignada');
	}
	
	public function getCantidad($item_id = null) {
		$this -> layout = 'ajax';
		$cantidad = $this -> Item -> read('ite_cantidad', $item_id);
		$options=array('0'=>'0');
		for($i=1;$i<=$cantidad['Item']['ite_cantidad'];$i++){
			$options[$i]=$i;
		}
		echo json_encode($options);
		exit(0);
	}

/*
	public function indexSuministros() {
		$this -> Item -> recursive = 0;
		$this -> set('items', $this -> paginate(array('ite_is_activo_fijo' => false)));
	}
*/
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function viewSuministro($id = null) {
		$this -> Item -> recursive = -1;
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
	
	/*
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
*/
	public function agregarSuministro() {
		/**
		 * falta el código que debe ser consecutivo acorde a los activos fijos o suministros
		 */
		
		
		if ($this -> request -> is('post')) {
			
			if (!empty($this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['name']) && !$this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['error']) {
				$now = new DateTime('now');
				$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['name']);
				if ($this -> uploadActivoFijoFile($this -> request -> data['IngresosDeInventario']['ing_archivo_soporte']['tmp_name'], $filename)) {
					$this -> request -> data['IngresosDeInventario']['ing_archivo_soporte'] = 'files/uploads/sumnistros/' . $filename;
				}
			}
			$this -> request -> data['IngresosDeInventario']['ing_is_activo_fijo'] = false;
			
			$max_id = $this -> Item -> query('SELECT MAX(`ing_codigo`) FROM `ingresos_de_inventarios` WHERE `ing_is_activo_fijo` = 0');
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
				$this -> Session -> setFlash(__('Se registró el suministro'), 'crud/success');
				$this -> redirect(array('action' => 'indexSuministros'));
			} else {
				$this -> Session -> setFlash(__('No se pudo hacer el registro del suministro. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$items = $this -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => false)));
		$tiposDeItems = $this -> Item -> getValores(15);
		$departamentos = $this -> Item -> getValores(14);
		//$personas = $this -> Item -> IngresosDeInventario -> Persona -> find('list');
		$proveedores = $this -> Item -> IngresosDeInventario -> Proveedor -> find('list', array('fields'=>'datos_completos'));
	
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
		$this -> set(compact('items', 'tiposDeItems', 'departamentos',/* 'personas',*/ 'proveedores', 'provincias'));
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
	/*
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
*/
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

	public function indexSuministros() {
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
		$conditions['ite_is_activo_fijo']=false;
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
		$this -> cleanupActivoFijoFiles();
		if ($tmp_name && $filename) {
			$url = 'files/uploads/activosFijos/' . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}
	
	private function cleanupActivoFijoFiles() {
		$items = $this -> Item -> IngresosDeInventario -> find('all', array('conditions' => array('IngresosDeInventario.ing_is_activo_fijo' => true)));
		$db_files = array();
		foreach ($items as $key => $item) {
			$db_files[] = $item['IngresosDeInventario']['ing_archivo_soporte'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot/files/uploads/activosFijos';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if($entry != 'empty' && is_file($dir_path . DS . $entry)) $dir_files[] = 'files/uploads/activosFijos/' . $entry;
			}
			closedir($handle);
		}
		foreach($dir_files as $file) {
			if(!in_array($file, $db_files)) {
				$file = explode('/', $file);
				$file = $file[count($file) - 1];
				$tmp_file_path = $dir_path . DS . $file;
				unlink($tmp_file_path);
			}
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
		$proveedores = $this -> Item -> IngresosDeInventario -> Proveedor -> find('list', array('fields'=>'datos_completos'));
	
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

	public function darDeBajaActivoFijo() {
		
	}
	
	public function asignarActivoFijo($activoFijoId = null) {
		if(!$activoFijoId) {
			
		}
		if($this -> request -> is('post')) {
			$this -> Item -> ItemsPersona -> create();
			if($this -> Item -> ItemsPersona -> save($this -> request -> data)) {
				$this -> Session -> setFlash('Se asigno el activo fijo a la persona.', 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('No se asigno el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/error');
			}
		}
		$this -> Item -> recursive = -1;
		$item = $this -> Item -> read(null, $activoFijoId);
		$departamentos = $this -> Item -> getValores(14);
		$cantidades = $this -> Item -> query("SELECT SUM(`ite_cantidad`) FROM `items_personas` WHERE `item_id` = $activoFijoId");
		$cantidades = $cantidades[0][0]['SUM(`ite_cantidad`)'];
		$tmp_cantidades = $item['Item']['ite_cantidad'] - $cantidades;
		$cantidades = array();
		for($i = 0; $i <= $tmp_cantidades; $i += 1) {
			$cantidades[$i] = $i;
		}
		$this -> set(compact('item', 'departamentos', 'cantidades'));
	}
	
	public function desasignarActivoFijo($activoFijoId = null) {
		if($activoFijoId) {
			if($this -> request -> is('post')) {
				foreach($this -> request -> data as $itemsPersona) {
					if($itemsPersona['ItemsPersona']['cantidad_desasignar']) {
						if($itemsPersona['ItemsPersona']['ite_cantidad'] == $itemsPersona['ItemsPersona']['cantidad_desasignar']) {
							// Eliminar el registro
							$this -> Item -> ItemsPersona -> delete($itemsPersona['ItemsPersona']['id']);
						} else {
							// Reducir cantidad
							$itemsPersona['ItemsPersona']['ite_cantidad'] -= $itemsPersona['ItemsPersona']['cantidad_desasignar'];
							$this -> Item -> ItemsPersona -> save($itemsPersona);
						}
					}
				}
				$this -> Session -> setFlash('Se registraron los cambios', 'crud/success');
				$this -> redirect(array('action' => 'indexActivosFijos'));
			}
			$itemsPersonas = $this -> Item -> ItemsPersona -> find('all', array('conditions' => array('ItemsPersona.item_id' => $activoFijoId)));
			$personas = array();
			foreach($itemsPersonas as $key => $value) {
				$personas[$value['ItemsPersona']['persona_id']] = $value['ItemsPersona']['persona_id'];
			}
			$personas = $this -> Item -> Persona -> find('all', array('conditions' => array('Persona.id' => $personas), 'recursive' => -1));
			foreach($personas as $key => $persona) {
				$item = $this -> Item -> ItemsPersona -> find('first', array('conditions' => array('ItemsPersona.item_id' => $activoFijoId, 'ItemsPersona.persona_id' => $persona['Persona']['id'])));
				$personas[$key]['ItemsPersona'] = $item['ItemsPersona'];
			}
			$this -> set(compact('personas'));
		}
	}
	
	public function traspasoActivoFijo() {
		if($this -> request -> is('post')) {
			$this -> Item -> ItemsPersona -> recursive = -1;
			$asignacionOriginal = $this -> Item -> ItemsPersona -> read(null, $this -> request -> data['ItemsPersona']['id']);
			//debug($asignacionOriginal);
			$asignacionNueva = $this -> request -> data;
			unset($asignacionNueva['Item']);
			$asignacionNueva['ItemsPersona']['item_id'] = $asignacionOriginal['ItemsPersona']['item_id'];
			//debug($asignacionNueva);
			if($asignacionNueva['ItemsPersona']['ite_cantidad'] == $asignacionOriginal['ItemsPersona']['ite_cantidad']) {
				// Traspaso total, cambiar la persona solamente
				$tmp_asignacion = $this -> Item -> ItemsPersona -> find(
					'first',
					array(
						'conditions' => array(
							'ItemsPersona.item_id' => $asignacionNueva['ItemsPersona']['item_id'],
							'ItemsPersona.persona_id' => $asignacionNueva['ItemsPersona']['persona_id']
						),
						'recursive' => -1
					)
				);
				if($tmp_asignacion) {
					$tmp_asignacion['ItemsPersona']['ite_cantidad'] += $asignacionNueva['ItemsPersona']['ite_cantidad'];
					if($this -> Item -> ItemsPersona -> save($tmp_asignacion)) {
						$this -> Item -> ItemsPersona -> delete($asignacionOriginal['ItemsPersona']['id']);
						$this -> Session -> setFlash('Se traspasó el activo fijo a la persona.', 'crud/success');
						$this -> redirect(array('action' => 'index'));
					} else {
						$this -> Session -> setFlash('No se traspasó el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/success');
					}
				} else {
					if($this -> Item -> ItemsPersona -> save($asignacionNueva)) {
						$this -> Session -> setFlash('Se traspasó el activo fijo a la persona.', 'crud/success');
						$this -> redirect(array('action' => 'index'));
					} else {
						$this -> Session -> setFlash('No se traspasó el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/success');
					}
				}
			} else {
				// Traspaso parcial, crear nuevo registro y reducir la cantidad asignada de la original
				unset($asignacionNueva['ItemsPersona']['id']);
				$this -> Item -> ItemsPersona -> create();
				if($this -> Item -> ItemsPersona -> save($asignacionNueva)) {
					$asignacionOriginal['ItemsPersona']['ite_cantidad'] -= $asignacionNueva['ItemsPersona']['ite_cantidad'];
					if($this -> Item -> ItemsPersona -> save($asignacionOriginal)) {
						$this -> Session -> setFlash('Se traspasó el activo fijo a la persona.', 'crud/success');
						$this -> redirect(array('action' => 'index'));
					} else {
						$this -> Session -> setFlash('No se traspasó el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/success');
					}
				} else {
					$this -> Session -> setFlash('No se traspasó el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/success');
				}
			}
			/*$this -> Item -> ItemsPersona -> create();
			if($this -> Item -> ItemsPersona -> save($this -> request -> data)) {
				$this -> Session -> setFlash('Se asigno el activo fijo a la persona.', 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('No se asigno el activo fijo a la persona. Por favor, intente de nuevo.', 'crud/error');
			}*/
		}
		$tmp_asignaciones = $this -> Item -> ItemsPersona -> find('all');
		foreach($tmp_asignaciones as $key => $asignacion) {
			$this -> Item -> recursive = -1;
			$this -> Item -> Persona -> recursive = -1;
			$tmpItem = $this -> Item -> find('first', array('conditions' => array('Item.id' => $asignacion['ItemsPersona']['item_id'])));
			$tmp_asignaciones[$key]['Item'] = $tmpItem['Item'];
			//$tmp_asignaciones[] = $this -> Item -> ItemsPersona -> Persona -> findById($asignacion['ItemsPersona']['persona_id']);
			$tmpPersona = $this -> Item -> Persona -> find('first', array('conditions' => array('Persona.id' => $asignacion['ItemsPersona']['persona_id'])));
			$tmp_asignaciones[$key]['Persona'] = $tmpPersona['Persona'];
		}
		$asignaciones = array();
		foreach($tmp_asignaciones as $key => $asignacion) {
			$asignaciones[$asignacion['ItemsPersona']['id']] = $asignacion['Item']['ite_codigo'] . ' - ' . $asignacion['Item']['ite_nombre'] . ' -> ' . $asignacion['Persona']['datos_completos'] . ' -> ' . $asignacion['ItemsPersona']['ite_cantidad'];
		}
		$departamentos = $this -> Item -> getValores(14);
		$this -> set(compact('departamentos', 'asignaciones'));
	}
	
	public function getCantidadAsignada($asginacion_id = null) {
		$this -> Item -> ItemsPersona -> recursive = -1;
		$asignacion = $this -> Item -> ItemsPersona -> read(null, $asginacion_id);
		$cantidades = array();
		for($i = 1; $i <= $asignacion['ItemsPersona']['ite_cantidad']; $i += 1) {
			$cantidades[$i] = $i;
		}
		echo json_encode($cantidades);
		exit(0);
	}

	public function deleteSuministro() {
		if ($this -> request -> is('post')) {
			
			$cantidades_validas = true;
			foreach($this -> request -> data['ActivosFijos'] as $key => $activoFijo) {
				if($activoFijo['item_id'] && $activoFijo['egr_cantidad'] && ($activoFijo['egr_cantidad'] >= 1)) {
					$item = $this -> Item -> read(null, $activoFijo['item_id']);
					if($activoFijo['egr_cantidad'] > $item['Item']['ite_cantidad']) $cantidades_validas = false;
				}
			}
			if($cantidades_validas) {
				if (!empty($this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['name']) && !$this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['error']) {
					$now = new DateTime('now');
					$this -> request ->data['EgresosDeInventario']['egr_fecha_de_egreso'] = $now -> format('Y-m-d H:i:s');
					$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['name']);
					if ($this -> uploadActivoFijoFile($this -> request -> data['EgresosDeInventario']['egr_archivo_soporte']['tmp_name'], $filename)) {
						$this -> request -> data['EgresosDeInventario']['egr_archivo_soporte'] = 'files/uploads/suministros/' . $filename;
					}
				}
				$this -> request -> data['EgresosDeInventario']['egr_is_activo_fijo'] = false;
				
				$max_id = $this -> Item -> query('SELECT MAX(`egr_codigo`) FROM `egresos_de_inventarios` WHERE `egr_is_activo_fijo` = 0');
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
					$this -> Session -> setFlash(__('Se registró el suministro'), 'crud/success');
					$this -> redirect(array('action' => 'indexSuministros'));
				} else {
					$this -> Session -> setFlash(__('No se pudo hacer el egreso del suministro. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash(__('No se pudo hacer el egreso de suministros por una cantidad seleccionada. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$items = $this -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => false)));
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
		$this -> Item -> recursive = 0;
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
			$activoFijo = $this -> request -> data['Item']['ite_is_activo_fijo'];
			if($activoFijo) {
				$activoFijo = 1;
			} else {
				$activoFijo = 0;
			}
			$max_id = $this -> Item -> query("SELECT MAX(`ite_codigo`) FROM `items` WHERE `ite_is_activo_fijo` = $activoFijo");
			$max_id = $max_id[0][0]['MAX(`ite_codigo`)'];
			if (!$max_id) {
				$max_id = 1;
				$this -> request -> data['Item']['ite_codigo'] = 1000000 + $max_id;
			} else {
				$max_id += 1;
				$this -> request -> data['Item']['ite_codigo'] = $max_id;
			}
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
