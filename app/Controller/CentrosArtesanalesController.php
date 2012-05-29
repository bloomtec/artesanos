<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');

/**
 * CentrosArtesanales Controller
 *
 * @property CentrosArtesanal $CentrosArtesanal
 */
class CentrosArtesanalesController extends AppController {

	/**
	 * Formatear un valor numérico
	 * @param string $valor Valor a formatear
	 * @return Valor formateado
	 */
	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * Listado de centros artesanales
	 *
	 * @return void
	 */
	public function index() {
		$this -> CentrosArtesanal -> recursive = 0;
		$this -> set('centrosArtesanales', $this -> paginate());
	}

	/**
	 * Ver centro artesanal
	 *
	 * @param int $id ID del centro artesanal
	 * @return void
	 */
	public function view($id = null) {
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		$this -> set('centrosArtesanal', $this -> CentrosArtesanal -> read(null, $id));
	}

	/**
	 * Agregar centro artesanal
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> CentrosArtesanal -> create();
			$this -> request -> data['CentrosArtesanal']['cen_costo_mensual_local'] = $this -> formatearValor($this -> request -> data['CentrosArtesanal']['cen_costo_mensual_local']);
			if ($this -> CentrosArtesanal -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El centro artesanal ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el centro artesanal. Por favor, intenta de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> CentrosArtesanal -> Provincia -> find('list');
		$ramas = $this -> CentrosArtesanal -> Rama -> find('list');
		$sostenimientos = $this -> CentrosArtesanal -> getValores(19);
		$tipos = $this -> CentrosArtesanal -> getValores(20);
		$modalidades = $this -> CentrosArtesanal -> getValores(21);
		$lenguajes = $this -> CentrosArtesanal -> getValores(22);
		$condiciones = $this -> CentrosArtesanal -> getValores(23);
		$estados = $this -> CentrosArtesanal -> getValores(24);
		$this -> set(compact('provincias', 'ramas', 'sostenimientos', 'tipos', 'modalidades', 'lenguajes', 'condiciones', 'estados'));
	}

	/**
	 * Modificar centro artesanal
	 *
	 * @param int $id ID del centro artesanal
	 * @return void
	 */
	public function edit($id = null) {
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['CentrosArtesanal']['cen_costo_mensual_local'] = $this -> formatearValor($this -> request -> data['CentrosArtesanal']['cen_costo_mensual_local']);
			if ($this -> CentrosArtesanal -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El centro artesanal ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el centro artesanal. Por favor, intenta de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> CentrosArtesanal -> read(null, $id);
		}
		$provincias = $this -> CentrosArtesanal -> Provincia -> find('list');
		$ramas = $this -> CentrosArtesanal -> Rama -> find('list');
		$sostenimientos = $this -> CentrosArtesanal -> getValores(19);
		$tipos = $this -> CentrosArtesanal -> getValores(20);
		$modalidades = $this -> CentrosArtesanal -> getValores(21);
		$lenguajes = $this -> CentrosArtesanal -> getValores(22);
		$condiciones = $this -> CentrosArtesanal -> getValores(23);
		$estados = $this -> CentrosArtesanal -> getValores(24);
		$this -> set(compact('provincias', 'ramas', 'sostenimientos', 'tipos', 'modalidades', 'lenguajes', 'condiciones', 'estados'));
	}

	/**
	 * Eliminar centro artesanal
	 *
	 * @param int $id ID del centro artesanal
	 * @return void
	 */
	public function delete($id) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		if ($this -> CentrosArtesanal -> delete()) {
			$this -> Session -> setFlash(__('Centros artesanal borrado'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar el centro artesanal'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	/**
	 * Reporte de centros artesanales
	 *
	 * @return void
	 */
	public function reporte() {
		$reporte = false;
		$provincias = array(0 => 'Seleccione...');
		$provincias_tmp = $this -> CentrosArtesanal -> Provincia -> find('list');
		foreach ($provincias_tmp as $key => $value) {
			$provincias[$key] = $value;
		}
		$ramas = $this -> CentrosArtesanal -> Rama -> find('list');
		$sostenimientos = $this -> CentrosArtesanal -> getValores(19);
		$tipos = $this -> CentrosArtesanal -> getValores(20);
		$modalidades = $this -> CentrosArtesanal -> getValores(21);
		$lenguajes = $this -> CentrosArtesanal -> getValores(22);
		$this -> set(compact('ramas', 'modalidades', 'lenguajes', 'tipos', 'sostenimientos', 'provincias', 'reporte'));
		$pagina = "";

		if (isset($this -> params['named']['page'])) {
			$pagina = $this -> params['named']['page'];
		} else if (isset($this -> params["named"]["sort"])) {
			$pagina = true;
		} else {
			$pagina = false;
		}

		if ($this -> request -> is('post') or $pagina != false) {
			$this -> Recursive = 0;
			$conditions = array();
			if ($pagina == false) {
				$provincia = $this -> data["Reporte"]["provincia_id"];
				$fechaCreacion = $this -> data["Reporte"]["fecha_creacion"];
				$fecha1 = $this -> data["Reporte"]["fecha1"];
				$fecha2 = $this -> data["Reporte"]["fecha2"];
				$rama = $this -> data['Reporte']['rama_id'];
				$modalidad = $this -> data['Reporte']['cen_modalidad'];
				$lenguaje = $this -> data['Reporte']['cen_lenguaje'];
				$tipo = $this -> data['Reporte']['cen_tipo'];
				$sostenimiento = $this -> data['Reporte']['cen_sostenimiento'];
				if (!empty($rama)) {
					$conditions['CentrosArtesanal.rama_id'] = $rama;
				}
				if (!empty($modalidad)) {
					$conditions['CentrosArtesanal.cen_modalidad'] = $modalidad;
				}
				if (!empty($lenguaje)) {
					$conditions['CentrosArtesanal.cen_lenguaje'] = $lenguaje;
				}
				if (!empty($tipo)) {
					$conditions['CentrosArtesanal.cen_tipo'] = $tipo;
				}
				if (!empty($sostenimiento)) {
					$conditions['CentrosArtesanal.cen_sostenimiento'] = $sostenimiento;
				}
				if (!empty($provincia)) {
					$conditions['CentrosArtesanal.provincia_id'] = $provincia;
				}
				if (!empty($fechaCreacion)) {
					$conditions['CentrosArtesanal.created BETWEEN ? AND ?'] = array($fechaCreacion . ' 00:00:00', $fechaCreacion . ' 23:59:59');
				}
				if ($fecha1 != null) {
					$conditions['CentrosArtesanal.cen_fecha_periodo_inicial'] = $fecha1;
				}
				if ($fecha2 != null) {
					$conditions['CentrosArtesanal.cen_fecha_periodo_final'] = $fecha2;
				}
				if (($fecha1 != null) && ($fecha2 != null) && ($fecha1 > $fecha2)) {
					$this -> Session -> setFlash(__('La fecha inicial debe ser menor a la fecha final', true));
					return;
				}
			}
			$reporteCentrosArtesanales = $this -> paginate = array('CentrosArtesanal' => array('limit' => 20, 'conditions' => $conditions));
			$reporteCentrosArtesanales = $this -> paginate('CentrosArtesanal');
			$cabecerasCsv = array("RUC", "Nombre", "Provincia", "Canton", "Ciudad", "Parroquia", "Dirección", "Fecha creación");
			$this -> Session -> write('reporte', $reporteCentrosArtesanales);
			$this -> Session -> write('archivo', "reporteCentrosArtesanales");
			$this -> Session -> write('cabeceras', $cabecerasCsv);
			$reporte = true;

			$this -> set(compact('reporteCentrosArtesanales', 'reporte'));
		}

		$this -> set('fechaActual', date('Y-m-d', strtotime('now')));
	}

	/**
	 * Imprimir reporte
	 * @return void
	 */
	public function impReporte() {
		$this -> layout = 'bpdf';
		$reporteCentrosArtesanales = $this -> Session -> read('reporte');
		$nombre_archivo = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		$this -> set(compact('reporteCentrosArtesanales', 'nombre_archivo', 'tamano'));
	}

	/**
	 * Exportar a CSV
	 */
	public function export_csv() {
		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteCentrosArtesanales = $this -> Session -> read('reporte');
		$cabeceras = $this -> Session -> read('cabeceras');
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteCentrosArtesanales); $i++) {
			$filas = array($reporteCentrosArtesanales[$i]["CentrosArtesanal"]["cen_ruc"], $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["cen_nombre"], $reporteCentrosArtesanales[$i]["Provincia"]["pro_nombre"], $reporteCentrosArtesanales[$i]["Canton"]["can_nombre"], $reporteCentrosArtesanales[$i]["Ciudad"]["ciu_nombre"], $reporteCentrosArtesanales[$i]["Parroquia"]["par_nombre"], $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["direccion"], $reporteCentrosArtesanales[$i]["CentrosArtesanal"]["created"]);
			$csv -> addRow($filas);

		}
		$titulo = $this -> Session -> read('archivo');
		$titulo = "csv_" . $titulo . "_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
