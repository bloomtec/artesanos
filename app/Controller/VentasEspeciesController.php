<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');
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
		$this -> paginate = array('EspeciesValorada' => array('limit' => 10, 'conditions' => array('EspeciesValorada.ventas_especie_id' => $id)));
		$especiesValoradas = $this -> paginate('EspeciesValorada');
		$this -> set('especiesValoradas', $especiesValoradas);
		$this -> set('ventasEspecie', $this -> VentasEspecie -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {

			if ((!$this -> request -> data['VentasEspecie']['juntas_provincial_id'] && $this -> request -> data['VentasEspecie']['artesano_id']) || ($this -> request -> data['VentasEspecie']['juntas_provincial_id'] && !$this -> request -> data['VentasEspecie']['artesano_id'])) {

				$this -> VentasEspecie -> create();

				$this -> request -> data['VentasEspecie']['ven_cantidad'] = 0;
				$this -> request -> data['VentasEspecie']['ven_valor'] = 0;

				//debug($this -> request -> data);
				foreach ($this -> request -> data['EspeciesValorada'] as $key => $datosEspecieValorada) {
					//debug($datosEspecieValorada);
					if ($datosEspecieValorada['cantidad']) {
						$tipoEspecie = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> read(null, $datosEspecieValorada['tipos_especies_valorada_id']);
						$this -> request -> data['VentasEspecie']['ven_valor'] += ($tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario'] * $datosEspecieValorada['cantidad']);
						$this -> request -> data['VentasEspecie']['ven_cantidad'] += $datosEspecieValorada['cantidad'];
					}
				}

				if ($this -> VentasEspecie -> save($this -> request -> data)) {
					//debug($this -> request -> data);
					foreach ($this -> request -> data['EspeciesValorada'] as $key => $datosEspecieValorada) {
						//debug($datosEspecieValorada);
						if ($datosEspecieValorada['cantidad']) {
							for ($tmp = $datosEspecieValorada['cantidad']; $tmp > 0; $tmp -= 1) {
								$especieValorada = $this -> VentasEspecie -> EspeciesValorada -> find('first', array('conditions' => array('EspeciesValorada.tipos_especies_valorada_id' => $datosEspecieValorada['tipos_especies_valorada_id'], 'EspeciesValorada.ventas_especie_id' => null), 'recursive' => -1));

								$especieValorada['EspeciesValorada']['ventas_especie_id'] = $this -> VentasEspecie -> id;
								//debug($especieValorada);
								$this -> VentasEspecie -> EspeciesValorada -> save($especieValorada);
							}
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
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all',array('conditions'=>array('TiposEspeciesValorada.total_especies_para_vender >'=>0)));
		$this -> set(compact('juntasProvinciales', 'tiposEspeciesValorada'));

		//Para el modal agregar artesano
		$this -> loadModel("Artesano", true);
		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad'));

	}

	public function addToOthers() {
		
		if($this -> request -> data){
			debug($this -> request -> data);
		}
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all',array('conditions'=>array('TiposEspeciesValorada.total_especies_para_vender >'=>0)));
		//debug($tiposEspeciesValorada);
		$this -> set(compact('tiposEspeciesValorada'));
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
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data['VentasEspecie']['fecha_inicio']) && !empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array('VentasEspecie.created BETWEEN ? AND ?' => array($this -> request -> data['VentasEspecie']['fecha_inicio'], $this -> request -> data['VentasEspecie']['fecha_fin']." 23:59:59"));
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif (!empty($this -> request -> data['VentasEspecie']['fecha_inicio'])) {
				$conditions = array('VentasEspecie.created >=' => $this -> request -> data['VentasEspecie']['fecha_inicio']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} elseif (!empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array('VentasEspecie.created <=' => $this -> request -> data['VentasEspecie']['fecha_fin']." 23:59:59");
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> set('ingresos', $this -> paginate());
			} else {
				$this -> set('ingresos', $this -> paginate());
			}
		}
		if (isset($this -> params['named']['sort'])) {
			$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
			$this -> set('ingresos', $this -> paginate());
		}
	}

	public function imprimirReporte() {
		$this -> layout = 'pdf2';
		$nombre_archivo = "ReporteVentasEspecies";
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
