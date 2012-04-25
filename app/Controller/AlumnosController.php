<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');
/**
 * Alumnos Controller
 *
 * @property Alumno $Alumno
 */
class AlumnosController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Alumno -> recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			$alumnos = $this -> Alumno -> find('list', array('conditions' => array('OR' => array('Alumno.alu_nombres LIKE' => "%$query%", 'Alumno.alu_apellido_paterno LIKE' => "%$query%", 'Alumno.alu_apellido_materno LIKE' => "%$query%", 'Alumno.alu_nacionalidad LIKE' => "%$query%", 'Alumno.alu_documento_de_identificacion LIKE' => "%$query%", 'Alumno.alu_fecha_de_nacimiento LIKE' => "%$query%")), 'fields' => array('Alumno.id')));
			$conditions['Alumno.id'] = $alumnos;
		}
		$this -> paginate = array('conditions' => $conditions);
		$this -> set('alumnos', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Alumno no válido'));
		}
		$this -> set('alumno', $this -> Alumno -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			if(!isset($this -> request -> data['Alumno']['centros_artesanal_id'])){
				$this -> request -> data['Alumno']['centros_artesanal_id']=null;
			}
			$this -> Alumno -> create();
			if ($this -> Alumno -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha registrado el alumno'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar el alumno. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		
		$centrosArtesanales = $this -> Alumno -> CentrosArtesanal -> find('list');
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos','centrosArtesanales'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Alumno no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if(!isset($this -> request -> data['Alumno']['centros_artesanal_id'])){
				$this -> request -> data['Alumno']['centros_artesanal_id']=null;
			}
			if ($this -> Alumno -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha registrado el alumno'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo registrar el alumno. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Alumno -> read(null, $id);
		}
		$centrosArtesanales = $this -> Alumno -> CentrosArtesanal -> find('list');
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos','centrosArtesanales'));
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
		$this -> Alumno -> id = $id;
		if (!$this -> Alumno -> exists()) {
			throw new NotFoundException(__('Alumno no válido'));
		}
		if ($this -> Alumno -> delete()) {
			$this -> Session -> setFlash(__('Se elminó el alumno'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se elminó el alumno'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function get($document,$centroArtesanal) {
		$this -> autorender = false;
		$this -> Alumno -> recursive = 0;
		echo json_encode($this -> Alumno -> find('first', array('conditions' => array('Alumno.alu_documento_de_identificacion' => $document,'Alumno.centros_artesanal_id'=>$centroArtesanal))));
		exit(0);
	}

	//Función para registrar el nuevo alumno
	public function modalRegNuevoAlumno() {
		$this -> autoRender = false;
		$this -> layout = 'ajax';
		$msj = "";
		if ($this -> request -> is('post')) {;
			$this -> Alumno -> create();
			if ($this -> Alumno -> save($this -> request -> data)) {
				$msj["msj"] = 'Se ha registrado el alumno';
				$msj["res"] = true;
			} else {
				$msj = 'No se pudo registrar el alumno. Por favor, intente de nuevo.';
				$msj["res"] = false;
			}
			echo json_encode($msj);
		}
	}

	/**
	 * reporte method
	 * @return void
	 */
	//Reporte alumnos provincias fecha de creacion
	public function reporte() {
		$this -> loadModel("CentrosArtesanal", true);
		$this -> loadModel("Solicitud", true);
		$this -> loadModel("CursosAlumno", true);
		$this -> loadModel("Curso", true);
		$this -> loadModel("Provincia", true);
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
			
			$idsAlumnos = $this -> CursosAlumno -> find("list", array("fields" => array("alumno_id")));
			$conditions[] = array('Alumno.id' => $idsAlumnos);
			
			if ($pagina == false) {
				$provincia = $this -> data["Reporte"]["provincia"];
				$fechaCreacion = $this -> data["Reporte"]["fecha_creacion"];
				$fecha1 = $this -> data["Reporte"]["fecha1"];
				$fecha2 = $this -> data["Reporte"]["fecha2"];

				if (!empty($provincia)) {
					$idsCentrosArtesanales = $this -> CentrosArtesanal -> find("list", array("fields" => array("id"), "conditions" => array("CentrosArtesanal.provincia_id" => $provincia)));
					$idsSolicitudes = $this -> Solicitud -> find("list", array("fields" => array("id"), "conditions" => array("Solicitud.centros_artesanal_id" => $idsCentrosArtesanales)));
					$idsCursos = $this -> Curso -> find("list", array("fields" => array("id"), "conditions" => array("Curso.solicitud_id" => $idsSolicitudes)));
					$idsAlumnos = $this -> CursosAlumno -> find("list", array("fields" => array("alumno_id"), "conditions" => array("CursosAlumno.curso_id" => $idsCursos)));
					$conditions[] = array('Alumno.id' => $idsAlumnos);
				}

				if (!empty($fechaCreacion)) {
					$conditions[] = array('Alumno.created' => $fechaCreacion);
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

					$conditions[] = array('Alumno.created between ? and ?' => array($fecha1, $fecha2));

				} else if ($fecha1 != null) {
					$conditions[] = array('Alumno.created >=' => $fecha1);
				} else if ($fecha2 != null) {
					$conditions[] = array('Alumno.created <=' => $fecha2);
				}
			}

			$reporteAlumnos = $this -> paginate = array('Alumno' => array('limit' => 20, 'conditions' => $conditions));
			$reporteAlumnos = $this -> paginate('Alumno');
			$cabecerasCsv = array("Doc. identificación", "Nacionalidad", "Nombres", "Apellidos", "Sexo", "Fec. nacimiento", "Tip. sangre", "Estado civil", "Grado estudio", "Cursos - nota", "Fecha creación");
			$this -> Session -> write('reporte', $reporteAlumnos);
			$this -> Session -> write('archivo', "reporteAlumnos");
			$this -> Session -> write('cabeceras', $cabecerasCsv);
			$reporte = true;
			$this -> set(compact('reporteAlumnos', 'reporte'));
		} else {
			$idsCursosAlumnos = $this -> CursosAlumno -> find("list", array("fields" => array("curso_id")));
			$idsSolicitudesCursos = $this -> Curso -> find("list", array("fields" => array("solicitud_id"), "conditions" => array("Curso.id" => $idsCursosAlumnos)));
			$idsCentrosArtesanales = $this -> Solicitud -> find("list", array("fields" => array("centros_artesanal_id"), "conditions" => array("Solicitud.id" => $idsSolicitudesCursos)));
			$idsProvincias = $this -> CentrosArtesanal -> find("list", array("fields" => array("provincia_id"), "conditions" => array("CentrosArtesanal.id" => $idsCentrosArtesanales)));
			$provincias = $this -> Provincia -> find("list", array("conditions" => array("Provincia.id" => $idsProvincias)));
			$this -> set(compact('provincias', 'reporte'));
		}

	}

	/**
	 * impReporte method
	 *
	 * @return void
	 */

	//Reporte alumnos provincias
	public function impReporte() {
		$this -> layout = 'pdf2';
		$reporteAlumnos = $this -> Session -> read('reporte');
		$nombre_archivo = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		$this -> set(compact('reporteAlumnos', 'nombre_archivo', 'tamano'));
	}

	/**
	 * impReporte method
	 *
	 * @return void
	 */

	//Reporte alumnos provincias
	public function impReporte2() {
		$this -> layout = 'pdf2';
		$reporteNotasAlumnos = $this -> Session -> read('reporte');
		$nombre_archivo = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		$this -> set(compact('reporteNotasAlumnos', 'nombre_archivo', 'tamano'));
	}

	/**
	 * export_csv method
	 *
	 * @return void
	 */
	public function export_csv() {
		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteAlumnos = $this -> Session -> read('reporte');
		$cabeceras = $this -> Session -> read('cabeceras');
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteAlumnos); $i++) {
			$filas = array($reporteAlumnos[$i]["Alumno"]["alu_documento_de_identificacion"], $reporteAlumnos[$i]["Alumno"]["alu_nacionalidad"], $reporteAlumnos[$i]["Alumno"]["alu_nombres"], $reporteAlumnos[$i]["Alumno"]["alu_apellido_paterno"] . ' ' . $reporteAlumnos[$i]["Alumno"]["alu_apellido_materno"], $reporteAlumnos[$i]["Alumno"]["alu_sexo"], $reporteAlumnos[$i]["Alumno"]["alu_fecha_de_nacimiento"], $reporteAlumnos[$i]["Alumno"]["alu_tipo_de_sangre"], $reporteAlumnos[$i]["Alumno"]["alu_estado_civil"], $reporteAlumnos[$i]["Alumno"]["alu_grado_de_estudio"], $reporteAlumnos[$i]["Alumno"]["created"]);
			$csv -> addRow($filas);
		}

		$titulo = $this -> Session -> read('archivo');
		$titulo = "csv_" . $titulo . "_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

	/**
	 * export_csv2 method
	 *
	 * @return void
	 */
	public function export_csv2() {
		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteNotasAlumnos = $this -> Session -> read('reporte');
		$cabeceras = $this -> Session -> read('cabeceras');
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteNotasAlumnos); $i++) {
			$cursoNota = "";
			for ($j = 0; $j < count($reporteNotasAlumnos[$i]["Curso"]); $j++) {
				$cursoNota = $reporteNotasAlumnos[$i]["Curso"][$j]["cur_nombre"] . ', nota:' . $reporteNotasAlumnos[$i]["Curso"][$j]["CursosAlumno"]["cur_nota_final"];
			}
			$filas = array($reporteNotasAlumnos[$i]["Alumno"]["alu_documento_de_identificacion"], $reporteNotasAlumnos[$i]["Alumno"]["alu_nacionalidad"], $reporteNotasAlumnos[$i]["Alumno"]["alu_nombres"], $reporteNotasAlumnos[$i]["Alumno"]["alu_apellido_paterno"] . ' ' . $reporteNotasAlumnos[$i]["Alumno"]["alu_apellido_materno"], $reporteNotasAlumnos[$i]["Alumno"]["alu_sexo"], $reporteNotasAlumnos[$i]["Alumno"]["alu_fecha_de_nacimiento"], $reporteNotasAlumnos[$i]["Alumno"]["alu_tipo_de_sangre"], $reporteNotasAlumnos[$i]["Alumno"]["alu_estado_civil"], $reporteNotasAlumnos[$i]["Alumno"]["alu_grado_de_estudio"], $cursoNota, $reporteNotasAlumnos[$i]["Alumno"]["created"]);
			$csv -> addRow($filas);
		}

		$titulo = $this -> Session -> read('archivo');
		$titulo = "csv_" . $titulo . "_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

	/**
	 * reporte de notas method
	 *
	 * @param string $alumnoId
	 * @return void
	 */
	public function reporteNotas($alumnoId = null) { //Pueden haber 100 alumnos, Solo se mostraran los que esten en un curso
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
			
			$this->loadModel("CursosAlumno");
			$idsAlumnos = $this -> CursosAlumno -> find("list", array("fields" => array("alumno_id")));
			$conditions[] = array('Alumno.id' => $idsAlumnos);
				
				
			if ($pagina == false) {

				$alumno = $this -> data["Reporte"]["alumno"];
				$fecha1 = $this -> data["Reporte"]["fecha1"];
				$fecha2 = $this -> data["Reporte"]["fecha2"];
				
				
				if (!empty($alumno)) {
					$conditions[] = array('Alumno.id' => $alumno);
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

					$conditions[] = array('Alumno.created between ? and ?' => array($fecha1, $fecha2));

				} else if ($fecha1 != null) {
					$conditions[] = array('Alumno.created >=' => $fecha1);
				} else if ($fecha2 != null) {
					$conditions[] = array('Alumno.created <=' => $fecha2);
				}
			}

			$reporteNotasAlumnos = $this -> paginate = array('Alumno' => array('limit' => 20, 'conditions' => $conditions));
			$reporteNotasAlumnos = $this -> paginate('Alumno');
			$cabecerasCsv = array("Doc. identificación", "Nacionalidad", "Nombres", "Apellidos", "Sexo", "Fec. nacimiento", "Tip. sangre", "Estado civil", "Grado estudio", "Cursos - nota", "Fecha creación");
			$this -> Session -> write('reporte', $reporteNotasAlumnos);
			$this -> Session -> write('archivo', "reporteNotasAlumnos");
			$this -> Session -> write('cabeceras', $cabecerasCsv);
			$reporte = true;

			//debug($reporteNotasAlumnos);
			$this -> set(compact('reporteNotasAlumnos', 'reporte'));
		} else {
			$idsNotasAlumnos = $this -> Alumno -> CursosAlumno -> find("list", array("fields" => array("alumno_id")));
			$alumnos = $this -> Alumno -> find("list", array("fields" => array("id", "nombre_completo"), "conditions" => array("Alumno.id" => $idsNotasAlumnos)));
			//debug($alumnos);
			$this -> set(compact('alumnos', 'reporte'));
		}
	}

}
