<?php
App::uses('AppController', 'Controller');
/**
 * SolicitudesTitulaciones Controller
 *
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 */
class SolicitudesTitulacionesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> SolicitudesTitulacion -> recursive = 0;
		$this -> set('solicitudesTitulaciones', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> SolicitudesTitulacion -> id = $id;
		if (!$this -> SolicitudesTitulacion -> exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		$this -> loadModel('Archivo');
		$archivos = $this -> Archivo -> find(
			'all',
			array(
				'conditions' => array(
					'Archivo.model' => 'SolicitudesTitulacion',
					'Archivo.foreign_key' => $id
				)
			)
		);
		$this -> set('archivos', $archivos);
		$this -> set('solicitudesTitulacion', $this -> SolicitudesTitulacion -> read(null, $id));
	}
	
	private function cleanupFiles() {
		$this -> loadModel('Archivo');
		$items = $this -> Archivo -> find('all');
		$db_files = array();
		foreach ($items as $key => $item) {
			$db_files[] = $item['Archivo']['ruta'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot/files/uploads/solicitudesTitulacion';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if($entry != 'empty' && is_file($dir_path . DS . $entry)) $dir_files[] = 'files/uploads/solicitudesTitulacion/' . $entry;
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
	public function add() {
		if ($this -> request -> is('post')) {
			//debug($this -> request -> data);
			$archivos = null;
			if($this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 1) {
				$archivos = $this -> request -> data['Archivos1'];
			} elseif($this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 2 || $this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 3) {
				$archivos = $this -> request -> data['Archivos2'];
			}
			// Verificar los documentos requeridos
			$documentosValidos = true;
			foreach($archivos as $key => $archivo) {
				if((key($archivo) != 'cedulaMilitar') && $archivo[key($archivo)]['error']) {
					$documentosValidos = false;
				}
			}
			if($documentosValidos) {
				$this -> SolicitudesTitulacion -> create();
				if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
					$this -> loadModel('Archivo');
					foreach($archivos as $key => $archivo) {
						if(!$archivo[key($archivo)]['error']) {
							$this -> Archivo -> create();
							$this -> Archivo -> set('model', 'SolicitudesTitulacion');
							$this -> Archivo -> set('foreign_key', $this -> SolicitudesTitulacion -> id);
							$now = new DateTime('now');
							$filename = $now -> format('Y-m-d_H-i-s') . '_' . key($archivo) . '_' . $this -> SolicitudesTitulacion -> id . '_' . $archivo[key($archivo)]['name'];
							$this -> Archivo -> set('nombre', $filename);
							$this -> Archivo -> set('ruta', 'files/uploads/solicitudesTitulacion/' . $filename);
							if($this -> Archivo -> save()) {
								$url = 'files/uploads/solicitudesTitulacion/' . $filename;
								move_uploaded_file($archivo[key($archivo)]['tmp_name'], $url);
								$this -> cleanupFiles();
							}
						}
					}
					
					$this -> Session -> setFlash(__('Se registro la solicitud de titulación'), 'crud/success');
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se pudo registrar la solicitud de titulación. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash(__('Hace falta un documento requerido. No olvide incluir la cedula militar si aplica.'), 'crud/error');
			}
		}
		$estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
		$titulos = $this -> SolicitudesTitulacion -> Titulo -> find('list');
		$tiposSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> TiposSolicitudesTitulacion -> find('list');
		$artesanos = $this -> SolicitudesTitulacion -> Artesano -> find('list');
		$this -> set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 *
	public function edit($id = null) {
		$this -> SolicitudesTitulacion -> id = $id;
		if (!$this -> SolicitudesTitulacion -> exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The solicitudes titulacion has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The solicitudes titulacion could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> SolicitudesTitulacion -> read(null, $id);
		}
		$estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
		$titulos = $this -> SolicitudesTitulacion -> Titulo -> find('list');
		$tiposSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> TiposSolicitudesTitulacion -> find('list');
		$artesanos = $this -> SolicitudesTitulacion -> Artesano -> find('list');
		$this -> set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
	}*/

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
		$this -> SolicitudesTitulacion -> id = $id;
		if (!$this -> SolicitudesTitulacion -> exists()) {
			throw new NotFoundException(__('Invalid solicitudes titulacion'));
		}
		if ($this -> SolicitudesTitulacion -> delete()) {
			$this -> Session -> setFlash(__('Solicitudes titulacion deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Solicitudes titulacion was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}
	
	public function revision($id = null) {
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró el cambio'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar el cambio. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			if(!$id) {
				
			} else {
				$this -> loadModel('Archivo');
				$archivos = $this -> Archivo -> find(
					'all',
					array(
						'conditions' => array(
							'Archivo.model' => 'SolicitudesTitulacion',
							'Archivo.foreign_key' => $id
						)
					)
				);
				$estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
				$this -> set(compact('estadosSolicitudesTitulaciones'));
				$this -> set('archivos', $archivos);
				$solicitud = $this -> SolicitudesTitulacion -> read(null, $id);
				$this -> request -> data = $solicitud;
				//$this -> set('solicitud', $solicitud);
			}
		}
	}
	
	public function reporte() {
		if($this -> request -> is('post')) {
			if(!empty($this -> request -> data['VentasEspecie']['fecha_inicio']) && !empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array('VentasEspecie.created BETWEEN ? AND ?' => array($this -> request -> data['VentasEspecie']['fecha_inicio'], $this -> request -> data['VentasEspecie']['fecha_fin']));
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif(!empty($this -> request -> data['VentasEspecie']['fecha_inicio'])) {
				$conditions = array('VentasEspecie.created >=' => $this -> request -> data['VentasEspecie']['fecha_inicio']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif(!empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array('VentasEspecie.created <=' => $this -> request -> data['VentasEspecie']['fecha_fin']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} else {
				$this -> set('ingresos', $this -> paginate());
			}
		}
		if(isset($this -> params['named']['sort'])) {
			$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
			$this -> set('ingresos', $this -> paginate());
		}
	}
	
	public function imprimirReporte() {
		$this -> layout = 'pdf2';
		$nombre_archivo = "ReporteSolicitudesTitulaciones";
		$tamano = 5;
		$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
		$ingresos = $this -> paginate();
		$this -> set(compact('ingresos', 'nombre_archivo', 'tamano'));
	}
	
	function export_csv() {

		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteIngresos = $this -> Session -> read('reporteIngresos');

		$cabeceras = array('Proveedor', 'Ciudad', 'Persona', '# Memorando', 'Asunto', 'Sub total', 'IVA', 'Total', 'Items', 'Fecha');

		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteIngresos); $i++) {
			$items = "";
			foreach ($reporteIngresos[$i]['Item'] as $key => $value) {
				if ($reporteIngresos[$i]['Item'] != array())
					if ($items == "") {
						$items = $value['ite_nombre'];
					} else {
						$items = $items . ' ' . $value['ite_nombre'];
					}
			}

			$filas = array($reporteIngresos[$i]['Proveedor']['pro_nombre_razon_social'], $reporteIngresos[$i]['Ciudad']['ciu_nombre'], $reporteIngresos[$i]['Persona']['per_nombres'], $reporteIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'], $reporteIngresos[$i]['IngresosDeInventario']['ing_asunto'], $reporteIngresos[$i]['IngresosDeInventario']['ing_subtotal'], $reporteIngresos[$i]['IngresosDeInventario']['ing_iva'], $reporteIngresos[$i]['IngresosDeInventario']['ing_total'], $items, $reporteIngresos[$i]['IngresosDeInventario']['created']);

			$csv -> addRow($filas);

		}
		$titulo = "csvVentasEspecies_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
