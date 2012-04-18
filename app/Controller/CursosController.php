<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 */
class CursosController extends AppController {

	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($pdf = "") {
		$this -> Curso -> recursive = 0;

		if ($pdf != "") {
			$this -> layout = 'pdf2';
		}

		$titulo = "Cursos";
		$cursos = $this -> paginate();
		$this -> set(compact('cursos', 'pdf', 'titulo'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$this -> set('curso', $this -> Curso -> read(null, $id));
	}

	private function uploadFile($tmp_name = null, $filename = null) {
		$this -> cleanupFiles();
		if ($tmp_name && $filename) {
			$url = 'files/uploads/cursos/' . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}

	private function cleanupFiles() {
		$documentos = $this -> Curso -> DocumentosCurso -> find('all');
		$db_files = array();
		foreach ($documentos as $key => $documento) {
			$db_files[] = $documento['DocumentosCurso']['doc_path'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot/files/uploads/cursos';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != 'empty' && is_file($dir_path . DS . $entry))
					$dir_files[] = 'files/uploads/cursos/' . $entry;
			}
			closedir($handle);
		}
		foreach ($dir_files as $file) {
			if (!in_array($file, $db_files)) {
				$file = explode('/', $file);
				$file = $file[count($file) - 1];
				$tmp_file_path = $dir_path . DS . $file;
				unlink($tmp_file_path);
			}
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> request -> data['Curso']['cur_costo'] = $this -> formatearValor($this -> request -> data['Curso']['cur_costo']);
			$this -> Curso -> create();
			if ($this -> Curso -> save($this -> request -> data)) {

				foreach ($this -> request -> data['Documentos'] as $key => $documento) {
					if (!empty($documento['name']) && !$documento['error']) {
						$now = new DateTime('now');
						$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $documento['name']);
						if ($this -> uploadFile($documento['tmp_name'], $filename)) {
							$this -> Curso -> DocumentosCurso -> create();
							$documento = array('DocumentosCurso' => array('curso_id' => $this -> Curso -> id, 'doc_name' => $documento['name'], 'doc_path' => 'files/uploads/cursos/' . $filename, 'is_documento_de_creacion' => 1, 'is_documento_de_cierre' => 0));
							$this -> Curso -> DocumentosCurso -> save($documento);
						}
					}
				}

				$this -> Session -> setFlash(__('El curso ha sido creado'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo crear el curso. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$solicitudes = $this -> Curso -> Solicitud -> find('list');
		$instructores = $this -> Curso -> Instructor -> find('list');
		$alumnos = $this -> Curso -> Alumno -> find('list');
		$this -> set(compact('solicitudes', 'instructores', 'alumnos'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['Curso']['cur_costo'] = $this -> formatearValor($this -> request -> data['Curso']['cur_costo']);
			if ($this -> Curso -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La información del curso ha sido actualizada'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo actualizar el curso. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Curso -> read(null, $id);
			$this -> request -> data['Curso']['cur_costo'] = 100 * $this -> request -> data['Curso']['cur_costo'];
			//$this -> Session -> setFlash(__('No se pudo actualizar el curso. Por favor, intente de nuevo.'), 'crud/error');
		}
		$solicitudes = $this -> Curso -> Solicitud -> find('list');
		$instructores = $this -> Curso -> Instructor -> find('list');
		$this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno')));
		$losAlumnos = $this -> Curso -> CursosAlumno -> find('all', array('conditions' => array('curso_id' => $id)));

		$this -> loadModel("Alumno");
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
		$provincias = $this -> Curso -> Provincia -> find('list');
		$this -> set(compact('provincias', 'solicitudes', 'instructores', 'losAlumnos', 'nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos'));
	}

	public function quitar($id = null) {
		$this -> Curso -> CursosAlumno -> id = $id;
		if (!$this -> Curso -> CursosAlumno -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this -> Curso -> CursosAlumno -> delete()) {
			$this -> Session -> setFlash(__('Alumno borrado del curso'), 'crud/success');
			$this -> redirect($this -> referer());
		}
		$this -> Session -> setFlash(__('No se pudo borrar el alumno del curso'), 'crud/error');
		$this -> redirect($this -> referer());
	}

	public function verAlumnos($id = null) {
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$this -> Curso -> recursive = -1;
		$curso = $this -> Curso -> read(null, $id);
		$alumnos = $this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno', 'Curso')));
		$alumnos = $this -> Curso -> CursosAlumno -> find('all', array('conditions' => array('CursosAlumno.curso_id' => $id)));
		$this -> set(compact('curso', 'alumnos'));
	}

	public function ingresarCalificaciones($id = null) {
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$calificacionMinima = ($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_minima'));
		$calificacionMaxima = ($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_maxima'));
		$necesarioParaAprobar = ($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_para_aprobar_curso'));
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			foreach ($this -> request -> data['CursosAlumno'] as $cursosAlumno) {
				$this -> Curso -> CursosAlumno -> id = $cursosAlumno['id'];
				$this -> Curso -> CursosAlumno -> saveField('cur_nota_final', $this -> formatearValor($cursosAlumno['cur_nota_final']));
				$this -> Curso -> CursosAlumno -> saveField('cur_asistencias', $cursosAlumno['cur_asistencias']);
				if ((float)$this -> formatearValor($cursosAlumno['cur_nota_final']) >= $necesarioParaAprobar) {
					$this -> Curso -> CursosAlumno -> saveField('cur_aprobo', true);
				} else {
					$this -> Curso -> CursosAlumno -> saveField('cur_aprobo', false);
				}
			}
			$this -> Curso -> saveField('cur_activo', !$this -> request -> data['Curso']['cur_activo']);
			$this -> Session -> setFlash(__('Se han actualizado las notas del curso.'), 'crud/success');
			$this -> redirect(array('action' => 'verAlumnos', $id));

		}
		$curso = $this -> Curso -> read(null, $id);
		$this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno')));
		$alumnos = $this -> Curso -> CursosAlumno -> find('all', array('conditions' => array('CursosAlumno.curso_id' => $id)));
		$this -> set(compact('curso', 'alumnos', 'calificacionMinima', 'calificacionMaxima'));

	}

	public function certificado($alumnoCursoId) {
		$this -> layout = "certificado";
		$this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno')));
		$alumno = $this -> Curso -> CursosAlumno -> read(null, $alumnoCursoId);
		$this -> Curso -> recursive = 0;
		$curso = $this -> Curso -> find("all", array("conditions" => array("Curso.id" => $alumnoCursoId)));
      

		if (empty($alumno["CursosAlumno"]['cur_fecha_de_emision'])) {
		    
			$fecha = date("F j, Y, g:i a", time());
		} else {
			$fecha = date("F j, Y, g:i a", strtotime($alumno["CursosAlumno"]['cur_fecha_de_emision']));
		}

		$fecha = explode(" ", str_replace(",", "", $fecha));
		$meses = array("January" => "Enero", "February" => "Febrero", "March" => "Marzo", "April" => "Abril", "May" => "Mayo", "June" => "Junio", "July" => "Julio", "August" => "Agosto", "September" => "Septiembre", "October" => "Octubre", "November" => "Noviembre", "December" => "Diciembre");

		foreach ($meses as $key => $value) {
			if ((string)$key == (string)$fecha[0]) {
				$fecha[0] = $value;
				break;
			}
		}

		$fecha2 = "el " . $fecha[1] . " " . "de " . $fecha[0] . " del ";
		$presidente = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_presidente_de_la_junta");
		$tecnico = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_tecnico_en_capacitacion_y_calificacion");

		$this -> set(compact('alumno', 'curso', 'fecha', 'fecha2', 'presidente', 'tecnico'));
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
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this -> Curso -> delete()) {
			$this -> Session -> setFlash(__('Curso borrado'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar el curso'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	function reporte() {
		$this -> loadModel("JuntasProvincial", true);
		$this -> loadModel("CentrosArtesanal", true);
		$reporte = false;
		$pagina = "";
		$this -> Curso -> recursive = 0;
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
				$ciudad = $this -> data["Reporte"]["ciudad"];
				$fechaCreacion = $this -> data["Reporte"]["fecha_creacion"];
				$estado = $this -> data["Reporte"]["estado"];
				$fecha1 = $this -> data["Reporte"]["fecha1"];
				$fecha2 = $this -> data["Reporte"]["fecha2"];

				if (!empty($provincia)) {
					$idsJuntasProvinciales = $this -> JuntasProvincial -> find("list", array("conditions" => array("JuntasProvincial.provincia_id" => $provincia)));
					$idsSolicitudes = $this -> Curso -> Solicitud -> find("list", array("conditions" => array("Solicitud.juntas_provincial_id" => $idsJuntasProvinciales)));
					$conditions[] = array('Curso.solicitud_id' => $idsSolicitudes);
				}

				if (!empty($ciudad)) {
					$idsCentrosArtesanales = $this -> CentroArtesanal -> find("list", array("conditions" => array("CentroArtesanal.ciudad_id" => $ciudad)));
					$idsSolicitudes = $this -> Curso -> Solicitud -> find("list", array("conditions" => array("Solicitud.centros_artesanal_id" => $idsCentrosArtesanales)));
					$conditions[] = array('Curso.solicitud_id' => $idsSolicitudes);
				}

				if (!empty($fechaCreacion)) {
					$conditions[] = array('CentrosArtesanal.created' => $fechaCreacion);
				}

				if (!empty($estado)) {
					$conditions[] = array('CentrosArtesanal.cur_activo' => $estado);
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

					$conditions[] = array('Curso.created between ? and ?' => array($fecha1, $fecha2));

				} else if ($fecha1 != null) {
					$conditions[] = array('Curso.created >=' => $fecha1);
				} else if ($fecha2 != null) {
					$conditions[] = array('Curso.created <=' => $fecha2);
				}
			}

			$reporteCursos = $this -> paginate = array('Curso' => array('limit' => 20, 'conditions' => $conditions));
			$reporteCursos = $this -> paginate('Curso');
			$cabecerasCsv = array("Solicitud", "Nombre", "Contenido", "Fecha Inicio", "Fecha Fin", "Jornada", "Num. horas", "Hora Inicio", "Hora Fin", "Provincia", "Num. Alumnos", "Fecha Creación");
			$this -> Session -> write('reporte', $reporteCursos);
			$this -> Session -> write('archivo', "reporteCursos");
			$this -> Session -> write('cabeceras', $cabecerasCsv);
			$reporte = true;
			//Agregar numero de alumnos
			$numAlumnos = array();
			if (count($reporteCursos) > 0) {
				for ($i = 0; $i < count($reporteCursos); $i++) {
					$idCurso = $reporteCursos[$i]["Curso"]["id"];
					$numAlumnos[] = $this -> Curso -> CursosAlumno -> find("count", array("contidions" => array("CursosAlumno.curso_id" => $idCurso)));
				}
			}

			$this -> Session -> write('numAlumnos', $numAlumnos);
			$this -> set(compact('reporteCursos', 'reporte', 'numAlumnos'));
		} else {
			$idsProvincias = $this -> CentrosArtesanal -> find("list", array("fields" => array("provincia_id")));
			$provincias = $this -> CentrosArtesanal -> Provincia -> find("list", array("conditions" => array("Provincia.id" => $idsProvincias)));
			$this -> set(compact('provincias', 'reporte'));
		}

	}

	/**
	 * impReporte method
	 *
	 * @return void
	 */
	public function impReporte() {
		$this -> layout = 'pdf2';
		$reporteCursos = $this -> Session -> read('reporte');
		$nombre_archivo = $this -> Session -> read('archivo');
		//Tamaño de la fuente
		$tamano = 5;
		$numAlumnos = $this -> Session -> read('numAlumnos');
		$this -> set(compact('reporteCursos', 'nombre_archivo', 'tamano', 'numAlumnos'));
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
		$reporteCursos = $this -> Session -> read('reporte');
		$cabeceras = $this -> Session -> read('cabeceras');
		$numAlumnos = $this -> Session -> read('numAlumnos');
		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteCursos); $i++) {

			$filas = array($reporteCursos[$i]["Solicitud"]["id"], $reporteCursos[$i]["Curso"]["cur_nombre"], $reporteCursos[$i]["Curso"]["cur_contenido"], $reporteCursos[$i]["Curso"]["cur_fecha_de_inicio"], $reporteCursos[$i]["Curso"]["cur_fecha_de_fin"], $reporteCursos[$i]["Curso"]["cur_jornada"], $reporteCursos[$i]["Curso"]["cur_numero_horas"], $reporteCursos[$i]["Curso"]["cur_horario_inicio"], $reporteCursos[$i]["Curso"]["cur_horario_fin"], $reporteCursos[$i]["Provincia"]["pro_nombre"], $numAlumnos[$i], $reporteCursos[$i]["Curso"]["created"]);

			$csv -> addRow($filas);
		}

		$titulo = $this -> Session -> read('archivo');
		$titulo = "csv_" . $titulo . "_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}

}
