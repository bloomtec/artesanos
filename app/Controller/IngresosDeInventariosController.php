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
		$reporte = false;

		if ($this -> request -> is('post')) {
			$condiciones = array();
			$idProveedor = $this -> data['Reporte']['proveedor'];
			$idPersona = $this -> data['Reporte']['persona'];
			$nomDepartamento = $this -> data['Reporte']['departamento'];
			$idProducto = $this -> data['Reporte']['producto'];
			$fecha1 = $this -> data['Reporte']['fecha1'];
			$fecha2 = $this -> data['Reporte']['fecha2'];

			//Condiciones
			$conditions = array();
			$conditions[] = array('IngresosDeInventario.ing_is_activo_fijo' => 1);

			if (!empty($nomDepartamento)) {
				$idsPersonasDep = $this -> Persona -> find('list', array('fields' => array('id'), 'conditions' => array('Persona.per_departamento' => $nomDepartamento)));
				$conditions[] = array('IngresosDeInventario.persona_id' => $idsPersonasDep);
			}

			if (!empty($idProducto)) {
				//$this -> IngresosDeInventariosItem ->recursive=-1;
				$idsProductos = $this -> IngresosDeInventariosItem -> find('list', array('fields' => array('ingresos_de_inventario_id'), 'conditions' => array('IngresosDeInventariosItem.item_id' => $idProducto,'ite_is_activo_fijo'=>1)));
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
			} else if ($fecha2 != null) {
				$conditions[] = array('IngresosDeInventario.created <=' => $fecha2);
			}

			//Reporte ingresos
			$this->Paginate();
			$reporteIngresos = $this -> IngresosDeInventario -> find('all', array('conditions' => $conditions));
			$reporte = true;
			$this -> Session -> write('reporteIngresos', $reporteIngresos);
			$this -> set(compact('reporteIngresos','reporte'));

		} else {
			//ids de personas en ingresos
			$lstPersonasId = $this -> IngresosDeInventario -> find('list', array("fields" => array('persona_id')));
			//ids de proveedor en ingresos
			$lstProveedoresId = $this -> IngresosDeInventario -> find('list', array("fields" => array('proveedor_id')));
			//Solamente los  proveedores que aparecen en ingresos
			$lstProveedores = $this -> IngresosDeInventario -> Proveedor -> find('list', array('conditions' => array('Proveedor.id' => $lstProveedoresId), 'fields' => array('id', 'pro_nombre_razon_social')));
			//Solamente las personas que han hecho ingresos
			$lstPersonas = $this -> IngresosDeInventario -> Persona -> find('list', array('conditions' => array('Persona.id' => $lstPersonasId), 'fields' => array('id', 'datos_completos'), 'order' => array('per_documento_de_identidad')));
			//ids Items en IngresosDeInventariosItem
			$idsItems = $this -> IngresosDeInventariosItem -> find("list", array("fields"=>array("item_id")));
			$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre'), 'conditions' => array('Item.id' => $idsItems)));
			//debug($lstProductos);
			
			$lstDepartamentos = $this -> IngresosDeInventario -> getValores(14);
			$this -> set(compact('lstProveedores', 'lstPersonas', 'lstDepartamentos', 'lstProductos','reporte'));
		}
	}

	function impReporteIngresosInventarios() {
		$this -> layout = 'pdf2';
		$reporteIngresos = $this -> Session -> read('reporteIngresos');
		$nombre_archivo = "ReporteIngresosDeInventarios";
		//Tamaño de la fuente
		$tamano = 5;
		//$this -> Session -> delete('reporteIngresos');
		$this -> set(compact('reporteIngresos', 'nombre_archivo', 'tamano'));
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
