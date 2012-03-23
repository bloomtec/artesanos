<?php
App::uses('AppController', 'Controller');
/**
 * IngresosDeInventarios Controller
 *
 * @property IngresosDeInventario $IngresosDeInventario
 */
class EgresosDeInventariosController extends AppController {

	public function reporteEgresosInventarios() {
		
		$this -> loadModel('Item', true);
		$this -> loadModel('IngresosDeInventariosItem', true);
		$this -> loadModel('IngresosDeInventario', true);
		$this -> loadModel('Persona', true);

		if ($this -> request -> is('post')) {
			$this -> Recursive = 0;

			$condiciones = array();
			$idPersona = $this -> data['Reporte']['persona'];
			$nomDepartamento = $this -> data['Reporte']['departamento'];
			$idProducto = $this -> data['Reporte']['producto'];
			$fecha1 = $this -> data['Reporte']['fecha1'];
			$fecha2 = $this -> data['Reporte']['fecha2'];

			//Condiciones
			$conditions = array();

			if (!empty($nomDepartamento)) {
				$idsPersonasDep = $this -> Persona -> find('list', array('fields' => array('id'), 'conditions' => array('Persona.per_departamento' => $nomDepartamento)));
				$conditions[] = array('EgresosDeInventario.persona_id' => $idsPersonasDep);
			}

			if (!empty($idProducto)) {
				$idsProductos = $this -> EgresosDeInventariosItem -> find('list', array('fields' => array('egresos_de_inventario_id'), 'conditions' => array('EgresosDeInventariosItem.item_id' => $idProducto)));
				$conditions[] = array('EgresosDeInventariosItem.id' => $idsProductos);
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
			}

			//Reporte egresos
			$reporteEgresos = $this -> EgresosDeInventario -> find('all', array('conditions' => $conditions));
			$this -> Session -> write('reporteEgresos', $reporteEgresos);
			//debug($reporteEgresos);
			$this -> set(compact('reporteEgresos'));
			
		} else {
			$lstPersonas = $this -> EgresosDeInventario -> Persona -> find('list', array('fields' => array('id', 'datos_completos')));
			$lstProductos = $this -> Item -> find('list', array('fields' => array('id', 'ite_nombre')));
			$lstDepartamentos = $this -> EgresosDeInventario -> getValores(14);
			$this -> set(compact('lstPersonas', 'lstDepartamentos', 'lstProductos'));
		}
		
	}
	
	function impReporteEgresosInventarios() {
		$this -> layout = 'pdf2';
		$reporteEgresos = $this -> Session -> read('reporteEgresos');
		$titulo = "ReporteEgresosDeInventarios";
		//Tamaño de la fuente
		$tamano = 5;
		//$this -> Session -> delete('reporteIngresos');
		$this -> set(compact('reporteEgresos','titulo','tamano'));
	}
	

}
