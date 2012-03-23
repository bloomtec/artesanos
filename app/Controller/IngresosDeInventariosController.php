<?php
App::uses('AppController', 'Controller');
/**
 * IngresosDeInventarios Controller
 *
 * @property IngresosDeInventario $IngresosDeInventario
 */
class IngresosDeInventariosController extends AppController {

	//Reporte reporteIngresosProveedores

	public function reporteIngresosInventarios($imp=0) {
		
		$this -> loadModel('Item', true);
		$this -> loadModel('IngresosDeInventariosItem', true);
		$this -> loadModel('IngresosDeInventario', true);
		$this -> loadModel('Persona', true);
		
		if($imp==1) {
			$this -> layout = 'pdf2';
		}
		if ($this -> request -> is('post')) {
			
			$this -> Recursive = 0;

			$condiciones = array();
			$idProveedor = $this -> data['Reporte']['proveedor'];
			$idPersona = $this -> data['Reporte']['persona'];
			$nomDepartamento = $this -> data['Reporte']['departamento'];
			$idProducto = $this -> data['Reporte']['producto'];
			$fecha1 = $this -> data['Reporte']['fecha1'];
			$fecha2 = $this -> data['Reporte']['fecha2'];

			$condiciones = array();
			$condiciones = array('IngresosDeInventario.proveedor_id' => $idProveedor, 'IngresosDeInventario.persona_id' => $idPersona);

			$reportes = array();
			foreach ($condiciones as $indice => $valor) {
				if ($valor != "") {
					$reportes[$indice] = $valor;
				}
			}

			if ($fecha1 > $fecha2) {
				$this -> Session -> setFlash(__('La fecha inicial debe ser menor a la fecha final', true));
				return;
			}

			if ($fecha1 != null && $fecha2 != null) {
				list($ano, $mes, $dia) = explode("-", $fecha1);
				$fecha1 = $ano . "-" . $mes . "-" . ($dia);

				list($ano, $mes, $dia) = explode("-", $fecha2);

				if ($dia == 31) {
					$fecha2 = $ano . "-" . $mes . "-" . ($dia);
				} else {
					$fecha2 = $ano . "-" . $mes . "-" . ($dia + 1);
				}

				$fechas = array('IngresosDeInventario.created between ? and ?' => array($fecha1, $fecha2));
				array_push($reportes, $fechas);
			}

			$reporteIngresos = $this -> IngresosDeInventario -> find('all', array('conditions' => $reportes));

			if (!empty($idProducto)) {
				for ($i = 0; $i < count($reporteIngresos); $i++) {
					for ($x = 0; $x <= count($reporteIngresos[$i]['Item']) - 1; $x++) {
						if (intval($reporteIngresos[$i]['Item'][$x]['id']) != intval($idProducto)) {
							unset($reporteIngresos[$i]['Item'][$x]);
						}
					}
				}
			}

			if (!empty($nomDepartamento)) {
				for ($i = 0; $i < count($reporteIngresos); $i++) {
					if (strval($reporteIngresos[$i]['Persona']['per_departamento']) != strval($nomDepartamento)) {
						unset($reporteIngresos[$i]['Persona']);
					}

				}
			}

			$this -> set(compact('reporteIngresos'));
		} else {

		$lstProveedores = $this -> IngresosDeInventario -> Proveedor -> find('list', array('fields' => array('id', 'pro_nombre_razon_social')));
		$lstPersonas = $this -> IngresosDeInventario -> Persona -> find('list', array('fields' => array('id', 'per_nombres')));
		$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre')));
		$lstDepartamentos = $this -> IngresosDeInventario -> getValores(14);
		$this -> set(compact('lstProveedores', 'lstPersonas', 'lstDepartamentos', 'lstProductos'));
		}
	}
	function view()
	{
		$this -> layout = 'pdf2';
	}
}
