<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');

/**
 * IngresosDeInventarios Controller
 *
 * @property IngresosDeInventario $IngresosDeInventario
 */
class IngresosDeInventariosController extends AppController {

	public function reporteIngresosInventarios() {

		$this -> loadModel('Item', true);
		$this -> loadModel('IngresosDeInventariosItem', true);
		$this -> loadModel('IngresosDeInventario', true);
		$this -> loadModel('Persona', true);

		if ($this -> request -> is('post')) {

			$this -> Recursive = 0;

			$condiciones = array();
			$idProveedor = $this -> data['Reporte']['proveedor'];
			$idPersona = $this -> data['Reporte']['persona'];
			$nomDepartamento = $this -> data['Reporte']['departamento'];
			$idProducto = $this -> data['Reporte']['producto'];
			$fecha1 = $this -> data['Reporte']['fecha1'];
			$fecha2 = $this -> data['Reporte']['fecha2'];

			//Condiciones
			$conditions = array();

			if (!empty($nomDepartamento)) {
				$idsPersonasDep = $this -> Persona -> find('list', array('fields' => array('id'), 'conditions' => array('Persona.per_departamento' => $nomDepartamento)));
				$conditions[] = array('IngresosDeInventario.persona_id' => $idsPersonasDep);
			}

			if (!empty($idProducto)) {
				$idsProductos = $this -> IngresosDeInventariosItem -> find('list', array('fields' => array('ingresos_de_inventario_id'), 'conditions' => array('IngresosDeInventariosItem.item_id' => $idProducto)));
				$conditions[] = array('IngresosDeInventario.id' => $idsProductos);
			}

			if (!empty($idPersona)) {
				$conditions[] = array('IngresosDeInventario.persona_id' => $idPersona);
			}

			if (!empty($idProveedor)) {
				$conditions[] = array('IngresosDeInventario.proveedor_id' => $idProveedor);
			}

			if ($fecha1 != null && $fecha2 != null) {

				if ($fecha1 > $fecha2) {
					$this -> Session -> setFlash(__('La fecha inicial debe ser menor a la fecha final', true));
					return;
				}

				list($ano, $mes, $dia) = explode("-", $fecha1);
				$fecha1 = $ano . "-" . $mes . "-" . ($dia);

				list($ano, $mes, $dia) = explode("-", $fecha2);

				if ($dia == 31) {
					$fecha2 = $ano . "-" . $mes . "-" . ($dia);
				} else {
					$fecha2 = $ano . "-" . $mes . "-" . ($dia + 1);
				}

				$conditions[] = array('IngresosDeInventario.created between ? and ?' => array($fecha1, $fecha2));

			} else if ($fecha1 != null) {
				$conditions[] = array('IngresosDeInventario.created >=' => $fecha1);
			}

			//Reporte ingresos
			$reporteIngresos = $this -> IngresosDeInventario -> find('all', array('conditions' => $conditions));
			$this -> Session -> write('reporteIngresos', $reporteIngresos);
			$this -> set(compact('reporteIngresos'));

		} else {

			$lstProveedores = $this -> IngresosDeInventario -> Proveedor -> find('list', array('fields' => array('id', 'pro_nombre_razon_social')));
			$lstPersonas = $this -> IngresosDeInventario -> Persona -> find('list', array('fields' => array('id', 'datos_completos')));
			$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre')));
			$lstDepartamentos = $this -> IngresosDeInventario -> getValores(14);
			$this -> set(compact('lstProveedores', 'lstPersonas', 'lstDepartamentos', 'lstProductos'));
		}
	}

	function impReporteIngresosInventarios() {
		$this -> layout = 'pdf2';
		$reporteIngresos = $this -> Session -> read('reporteIngresos');
		$titulo = "ReporteIngresosDeInventarios";
		//Tamaño de la fuente
		$tamano = 5;
		//$this -> Session -> delete('reporteIngresos');
		$this -> set(compact('reporteIngresos', 'titulo', 'tamano'));
	}

	function export_csv() {

		$this -> layout = "";
		$this -> render(false);
	
		$csv = new csvHelper();
		$reporteIngresos = $this -> Session -> read('reporteIngresos');

		$cabeceras = array('Proveedor', 'Ciudad', 'Persona', '# Memorando','Asunto', 'Sub total', 'IVA', 'Total', 'Items', 'Fecha');
		
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteIngresos); $i++) {
			$items = "";
			foreach ($reporteIngresos[$i]['Item'] as $key => $value) {
					 if ($reporteIngresos[$i]['Item'] != array())
					 if($items==""){
					 	$items = $value['ite_nombre'];
					 }else {
					 	$items = $items.' '.$value['ite_nombre'];
					 }
			 }

			$filas = array($reporteIngresos[$i]['Proveedor']['pro_nombre_razon_social'], 
			$reporteIngresos[$i]['Ciudad']['ciu_nombre'], 
			$reporteIngresos[$i]['Persona']['per_nombres'], 
			$reporteIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'], 
			$reporteIngresos[$i]['IngresosDeInventario']['ing_asunto'], 
			$reporteIngresos[$i]['IngresosDeInventario']['ing_subtotal'], 
			$reporteIngresos[$i]['IngresosDeInventario']['ing_iva'], 
			$reporteIngresos[$i]['IngresosDeInventario']['ing_total'], 
			$items, 
			$reporteIngresos[$i]['IngresosDeInventario']['created']);

			$csv -> addRow($filas);
		
		}
		$titulo = "csvIngresosInventarios_".date("Y-m-d H:i:s", time()).".csv";
		echo $csv -> render($titulo); 
	}
}
