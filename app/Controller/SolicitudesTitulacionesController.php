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
		$this -> set('solicitudesTitulacion', $this -> SolicitudesTitulacion -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> SolicitudesTitulacion -> create();
			if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The solicitudes titulacion has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The solicitudes titulacion could not be saved. Please, try again.'), 'crud/error');
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
	 */
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
