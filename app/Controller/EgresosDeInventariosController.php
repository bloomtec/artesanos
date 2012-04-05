<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');

/**
 * IngresosDeInventarios Controller
 *
 * @property IngresosDeInventario $IngresosDeInventario
 */
class EgresosDeInventariosController extends AppController {

	public function reporteEgresosInventarios() {

		$this -> loadModel('Item', true);
		$this -> loadModel('EgresosDeInventariosItem', true);
		$this -> loadModel('EgresosDeInventario', true);
		$this -> loadModel('Persona', true);
		$reporte = false;

		$pagina = "";

		if (isset($this -> params['named']['page'])) {
			$pagina = $this -> params['named']['page'];
		} else {
			$pagina = false;
		}

		if ($this -> request -> is('post') or $pagina != false) {
			$this -> Recursive = 0;
			$conditions = array();
			if ($pagina==false) {
				$condiciones = array();
				$idPersona = $this -> data['Reporte']['persona'];
				$nomDepartamento = $this -> data['Reporte']['departamento'];
				$idProducto = $this -> data['Reporte']['producto'];
				$fecha1 = $this -> data['Reporte']['fecha1'];
				$fecha2 = $this -> data['Reporte']['fecha2'];

				$conditions[] = array('EgresosDeInventario.egr_is_activo_fijo' => 1);
				
				if (!empty($nomDepartamento)) {
					$idsPersonasDep = $this -> Persona -> find('list', array('fields' => array('id'), 'conditions' => array('Persona.per_departamento' => $nomDepartamento)));
					$conditions[] = array('EgresosDeInventario.persona_id' => $idsPersonasDep);
				}

				if (!empty($idProducto)) {
					$idsProductos = $this -> EgresosDeInventariosItem -> find('list', array('fields' => array('egresos_de_inventario_id'), 'conditions' => array('EgresosDeInventariosItem.item_id' => $idProducto)));
					$conditions[] = array('EgresosDeInventario.id' => $idsProductos);
				}

				if (!empty($idPersona)) {
					$conditions[] = array('EgresosDeInventario.persona_id' => $idPersona);
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
				} else if ($fecha2 != null) {
					$conditions[] = array('IngresosDeInventario.created <=' => $fecha2);
				}
			}

			$reporteEgresos = $this -> paginate = array('EgresosDeInventario' => array('limit' => 20, 'conditions' => $conditions));
			$reporteEgresos = $this -> paginate('EgresosDeInventario');
			$this -> Session -> write('reporte', $reporteEgresos);
			$this -> Session -> write('archivo', "ReporteEgresosDeInventarios");
			$reporte = true;
			$this -> set(compact('reporteEgresos', 'reporte'));

		} else {

			$lstPersonasId = $this -> EgresosDeInventario -> find('list', array("fields" => array('persona_id')));
			$lstPersonas = $this -> Persona -> find('list', array('order' => array('per_documento_de_identidad'), 'fields' => array('id', 'datos_completos'), 'conditions' => array('Persona.id' => $lstPersonasId)));

			//$idsItems = $this -> EgresosDeInventariosItem -> find("list", array("fields" => array("item_id")));
			//$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre'), 'conditions' => array('Item.id' => $idsItems, 'ite_is_activo_fijo' => 1)));
			$lstProductos = $this -> Item -> find('list', array('conditions' => array('ite_is_activo_fijo' => 1)));
			$lstDepartamentos = $this -> EgresosDeInventario -> getValores(14);
			$this -> set(compact('lstPersonas', 'lstDepartamentos', 'lstProductos', 'reporte'));
		}

	}

	public function reporteEgresosSuministros() {
		$this -> loadModel('Item', true);
		$this -> loadModel('EgresosDeInventariosItem', true);
		$this -> loadModel('EgresosDeInventario', true);
		$this -> loadModel('Persona', true);
		
		$reporte = false;
		$pagina = "";

		if (isset($this -> params['named']['page'])) {
			$pagina = $this -> params['named']['page'];
		} else {
			$pagina = false;
		}

		if ($this -> request -> is('post') or $pagina != false) {
			$this -> Recursive = 0;
			$conditions = array();
			if ($pagina==false) {
				$idPersona = $this -> data['Reporte']['persona'];
				$nomDepartamento = $this -> data['Reporte']['departamento'];
				$idProducto = $this -> data['Reporte']['producto'];
				$fecha1 = $this -> data['Reporte']['fecha1'];
				$fecha2 = $this -> data['Reporte']['fecha2'];

				$conditions[] = array('EgresosDeInventario.egr_is_activo_fijo' => 0);
				
				if (!empty($nomDepartamento)) {
					$idsPersonasDep = $this -> Persona -> find('list', array('fields' => array('id'), 'conditions' => array('Persona.per_departamento' => $nomDepartamento)));
					$conditions[] = array('EgresosDeInventario.persona_id' => $idsPersonasDep);
				}

				if (!empty($idProducto)) {
					$idsProductos = $this -> EgresosDeInventariosItem -> find('list', array('fields' => array('egresos_de_inventario_id'), 'conditions' => array('EgresosDeInventariosItem.item_id' => $idProducto)));
					$conditions[] = array('EgresosDeInventario.id' => $idsProductos);
				}

				if (!empty($idPersona)) {
					$conditions[] = array('EgresosDeInventario.persona_id' => $idPersona);
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
				} else if ($fecha2 != null) {
					$conditions[] = array('IngresosDeInventario.created <=' => $fecha2);
				}
			}

			$reporteEgresos = $this -> paginate = array('EgresosDeInventario' => array('limit' => 20, 'conditions' => $conditions));
			$reporteEgresos = $this -> paginate('EgresosDeInventario');
			$this -> Session -> write('reporte', $reporteEgresos);
			$this -> Session -> write('archivo', "ReporteEgresosDeSuministros");
			$reporte = true;
			$this -> set(compact('reporteEgresos', 'reporte'));

		} else {

			$lstPersonasId = $this -> EgresosDeInventario -> find('list', array("fields" => array('persona_id')));
			$lstPersonas = $this -> Persona -> find('list', array('order' => array('per_documento_de_identidad'), 'fields' => array('id', 'datos_completos'), 'conditions' => array('Persona.id' => $lstPersonasId)));
			//$idsItems = $this -> EgresosDeInventariosItem -> find("list", array("fields" => array("item_id")));
			//$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre'), 'conditions' => array('Item.id' => $idsItems, 'ite_is_activo_fijo' => 0)));
			$lstProductos = $this -> Item -> find('list', array('conditions' => array('ite_is_activo_fijo' => 0)));
			$lstDepartamentos = $this -> EgresosDeInventario -> getValores(14);
			$this -> set(compact('lstPersonas', 'lstDepartamentos', 'lstProductos', 'reporte'));
		}

	}

	function impReporte() {
		$this -> layout = 'pdf2';
		$reporteEgresos = $this -> Session -> read('reporte');
		$nombre_archivo  = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		//$this -> Session -> delete('reporteIngresos');
		$this -> set(compact('reporteEgresos', 'nombre_archivo', 'tamano'));
	}

	

	function export_csv() {

		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteEgresos = $this -> Session -> read('reporte');
		$cabeceras = array('Código', 'Persona', 'Concepto', 'Fecha egreso', 'Items');
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteEgresos); $i++) {
			$items = "";
			foreach ($reporteEgresos[$i]['Item'] as $key => $value) {
				if ($reporteEgresos[$i]['Item'] != array())
					if ($items == "") {
						$items = $value['ite_nombre'];
					} else {
						$items = $items . ' ' . $value['ite_nombre'];
					}
			}

			$filas = array($reporteEgresos[$i]['EgresosDeInventario']['egr_codigo'], $reporteEgresos[$i]['Persona']['per_nombres'], $reporteEgresos[$i]['EgresosDeInventario']['egr_concepto_entrega'], $reporteEgresos[$i]['EgresosDeInventario']['egr_fecha_de_egreso'], $items);
			$csv -> addRow($filas);
		}
		
		$titulo =$reporteIngresos = $this -> Session -> read('archivo');
		$titulo = "csvEgresosInventarios_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
