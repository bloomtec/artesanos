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
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> CentrosArtesanal -> recursive = 0;
		$this -> set('centrosArtesanales', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
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
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> CentrosArtesanal -> create();
			if ($this -> CentrosArtesanal -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('El centro artesanal ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el centro artesanal. Por favor, intenta de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> CentrosArtesanal -> Provincia -> find('list');
		//$cantones = $this -> CentrosArtesanal -> Canton -> find('list');
		//$ciudades = $this -> CentrosArtesanal -> Ciudad -> find('list');
		//$parroquias = $this -> CentrosArtesanal -> Parroquia -> find('list');
		//$this -> set(compact('provincias', 'cantones', 'ciudades', 'parroquias'));
		$this -> set(compact('provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> CentrosArtesanal -> id = $id;
		if (!$this -> CentrosArtesanal -> exists()) {
			throw new NotFoundException(__('No se encontró el centro artesanal'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
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
		$cantones = $this -> CentrosArtesanal -> Canton -> find('list');
		$ciudades = $this -> CentrosArtesanal -> Ciudad -> find('list');
		$parroquias = $this -> CentrosArtesanal -> Parroquia -> find('list');
		$this -> set(compact('provincias', 'cantones', 'ciudades', 'parroquias'));
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
	 * reporte method
	 *
	 * @return void
	 */

	public function reporte() {
		$reporte = false;
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

				$provincia = $this -> data["Reporte"]["provincia"];
				$fechaCreacion = $this -> data["Reporte"]["fecha_creacion"];
				$fecha1 = $this -> data["Reporte"]["fecha_creacion"];
				$fecha2 = $this -> data["Reporte"]["fecha_creacion"];

				if (!empty($provincia)) {
					$conditions[] = array('CentrosArtesanal.provincia_id' => $provincia);
				}

				if (!empty($fechaCreacion)) {
					$conditions[] = array('CentrosArtesanal.created' => $fechaCreacion);
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

					$conditions[] = array('CentrosArtesanal.created between ? and ?' => array($fecha1, $fecha2));

				} else if ($fecha1 != null) {
					$conditions[] = array('CentrosArtesanal.created >=' => $fecha1);
				} else if ($fecha2 != null) {
					$conditions[] = array('CentrosArtesanal.created <=' => $fecha2);
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
		} else {
			$idsProvincias = $this -> CentrosArtesanal -> find("list", array("fields" => array("provincia_id")));
			$provincias = $this -> CentrosArtesanal -> Provincia -> find("list", array("conditions" => array("Provincia.id" => $idsProvincias)));
			$this -> set(compact('provincias', 'reporte'));
		}

	}

	public function impReporte() {
		$this -> layout = 'pdf2';
		$reporteCentrosArtesanales = $this -> Session -> read('reporte');
		$nombre_archivo = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		$this -> set(compact('reporteCentrosArtesanales', 'nombre_archivo', 'tamano'));
	}

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
		$titulo =  $this -> Session -> read('archivo');
		$titulo = "csv_".$titulo."_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
