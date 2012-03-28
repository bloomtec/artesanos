<?php
App::uses('AppController', 'Controller');
/**
 * VentasEspecies Controller
 *
 * @property VentasEspecie $VentasEspecie
 */
class VentasEspeciesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> VentasEspecie -> recursive = 0;
		$this -> set('ventasEspecies', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		$this -> set('ventasEspecie', $this -> VentasEspecie -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			debug($this -> request -> data);
			$juntas_provincial_id = null;
			if(
				(!$this -> request -> data['VentasEspecie']['juntas_provincial_id'] && $this -> request -> data['VentasEspecie']['artesano_id'])
				|| ($this -> request -> data['VentasEspecie']['juntas_provincial_id'] && !$this -> request -> data['VentasEspecie']['artesano_id'])
			) {
				$this -> VentasEspecie -> create();
				if ($this -> VentasEspecie -> save($this -> request -> data)) {
					
					foreach($this -> request -> data['EspeciesValorada'] as $key => $datosEspecieValorada) {
						if($datosEspecieValorada['cantidad']) {
							
							$especieValorada = $this -> VentasEspecie -> EspeciesValorada -> find(
								'first',
								array(
									'conditions' => array(
										'EspeciesValorada.tipos_especies_valorada_id' => $datosEspecieValorada['tipos_especies_valorada_id'],
										'EspeciesValorada.ventas_especie_id' => null
									)
								)
							);
							
							$especieValorada['EspeciesValorada']['ventas_especie_id'] = $this -> VentasEspecie -> id;
							
							$this -> VentasEspecie -> EspeciesValorada -> save($especieValorada); 
							
						}
					}
					
					$this -> Session -> setFlash(__('Se registró la venta de especie valorada'), 'crud/success');
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se registró la venta de especie valorada. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash('La venta de especies es para un individuo o una junta provincial', 'crud/error');
			}
		}
		$juntasProvinciales = $this -> VentasEspecie -> JuntasProvincial -> find('list');
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all');
		$this -> set(compact('juntasProvinciales', 'tiposEspeciesValorada'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> VentasEspecie -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la venta de especie valorada'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se registró la venta de especie valorada. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> VentasEspecie -> read(null, $id);
		}
		$juntasProvinciales = $this -> VentasEspecie -> JuntasProvincial -> find('list');
		$artesanos = $this -> VentasEspecie -> Artesano -> find('list');
		$especiesValoradas = $this -> VentasEspecie -> EspeciesValorada -> find('list');
		$this -> set(compact('juntasProvinciales', 'artesanos', 'especiesValoradas'));
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
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		if ($this -> VentasEspecie -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la venta de especie'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la venta de especie'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function reporte() {
		if($this -> request -> is('post')) {
			debug($this -> request -> data);
			/*
			if(!empty($this -> request -> data['IngresosEspecie']['fecha_inicio']) && !empty($this -> request -> data['IngresosEspecie']['fecha_fin'])) {
				$conditions = array('IngresosEspecie.ing_fecha BETWEEN ? AND ?' => array($this -> request -> data['IngresosEspecie']['fecha_inicio'], $this -> request -> data['IngresosEspecie']['fecha_fin']));
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif(!empty($this -> request -> data['IngresosEspecie']['fecha_inicio'])) {
				$conditions = array('IngresosEspecie.ing_fecha >=' => $this -> request -> data['IngresosEspecie']['fecha_inicio']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif(!empty($this -> request -> data['IngresosEspecie']['fecha_fin'])) {
				$conditions = array('IngresosEspecie.ing_fecha <=' => $this -> request -> data['IngresosEspecie']['fecha_fin']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} else {
				$this -> set('ingresos', $this -> paginate());
			}
			*/
		}
		if(isset($this -> params['named']['sort'])) {
			$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
			$this -> set('ingresos', $this -> paginate());
		}
	}
	
	public function imprimirReporte() {
		$this -> layout = 'pdf2';
		$nombre_archivo = "ReporteEgresosEspecies";
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
		$titulo = "csvIngresosInventarios_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
