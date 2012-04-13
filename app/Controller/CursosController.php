<?php
App::uses('AppController', 'Controller');
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
		
		$this->loadModel("Alumno");
		$nacionalidades = $this -> Alumno -> getValores(1);
		$tipos_de_sangre = $this -> Alumno -> getValores(2);
		$estados_civiles = $this -> Alumno -> getValores(3);
		$grados_de_estudio = $this -> Alumno -> getValores(4);
		$sexos = $this -> Alumno -> getValores(5);
		$provincias = $this -> Curso -> Provincia -> find('list');		
		$this -> set(compact('provincias','solicitudes', 'instructores', 'losAlumnos', 'nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos'));
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
		$calificacionMinima=($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_minima'));
		$calificacionMaxima=($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_maxima'));
		$necesarioParaAprobar=($this -> requestAction('/configuraciones/getValorConfiguracion/con_calificacion_para_aprobar_curso'));
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			foreach ($this -> request -> data['CursosAlumno'] as $cursosAlumno) {
				$this -> Curso -> CursosAlumno -> id = $cursosAlumno['id'];
				$this -> Curso -> CursosAlumno -> saveField('cur_nota_final', $this -> formatearValor($cursosAlumno['cur_nota_final']));
				$this -> Curso -> CursosAlumno -> saveField('cur_asistencias', $cursosAlumno['cur_asistencias']);
				if ((float) $this -> formatearValor($cursosAlumno['cur_nota_final']) >= $necesarioParaAprobar) {					
					$this -> Curso -> CursosAlumno -> saveField('cur_aprobo', true);
				} else {
					$this -> Curso -> CursosAlumno -> saveField('cur_aprobo', false);	
				}
			}
			$this -> Curso -> saveField('cur_activo',!$this -> request -> data['Curso']['cur_activo']);
			$this -> Session -> setFlash(__('Se han actualizado las notas del curso.'), 'crud/success');
			$this -> redirect(array('action'=>'verAlumnos',$id));

		} 
			$curso = $this -> Curso -> read(null, $id);
			$this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno')));
			$alumnos = $this -> Curso -> CursosAlumno -> find('all', array('conditions' => array('CursosAlumno.curso_id' => $id)));
			$this -> set(compact('curso', 'alumnos','calificacionMinima','calificacionMaxima'));
		
	}

	public function certificado($alumnoCursoId) {
		//$this->layout="certificado";
		$this -> Curso -> CursosAlumno -> bindModel(array('belongsTo' => array('Alumno')));
		$alumno = $this -> Curso -> CursosAlumno -> read(null, $alumnoCursoId);
		$this -> set(compact('alumno'));
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

}
