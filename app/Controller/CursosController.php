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
	public function index($pdf="") {
		$this -> Curso -> recursive = 0;
		
		if($pdf!="") {
			$this->layout='pdf2';
		}
		
		$cursos =  $this -> paginate();
		$this -> set(compact('cursos', 'pdf'));
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
				$this -> Session -> setFlash(__('El curso ha sido crearo'), 'crud/success');
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
				$this -> Session -> setFlash(__('La inforamción del curso ha sido actualizada'), 'crud/success');
			//	$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo actualizar el curso. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Curso -> read(null, $id);
		}
		$solicitudes = $this -> Curso -> Solicitud -> find('list');
		$instructores = $this -> Curso -> Instructor -> find('list');
		$alumnos = $this -> Curso -> Alumno -> find('list');
		$this -> set(compact('solicitudes', 'instructores', 'alumnos'));
	}
	public function verAlumnos($id = null){
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$this -> Curso -> recursive = -1;
		$curso = $this -> Curso -> read(null,$id);
		$alumnos = $this -> Curso -> CursosAlumno -> bindModel(array(
			'belongsTo' => array(
				'Alumno'
			)
		));
		$alumnos = $this -> Curso -> CursosAlumno -> find('all',array('conditions'=>array('CursosAlumno.curso_id'=>$id)));
		$this -> set(compact('curso','alumnos'));
	}
	public function ingresarCalificaciones($id = null){
		$this -> Curso -> id = $id;
		if (!$this -> Curso -> exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			foreach($this -> request -> data['CursosAlumno'] as $cursosAlumno){
				 $this -> Curso -> CursosAlumno -> id=$cursosAlumno['id'];
				 $this -> Curso -> CursosAlumno -> saveField('cur_nota_final',$this -> formatearValor($cursosAlumno['cur_nota_final']));
				  $this -> Curso -> CursosAlumno -> saveField('cur_asistencias',$cursosAlumno['cur_asistencias']);
				 if((float)$this -> formatearValor($cursosAlumno['cur_nota_final'] >= 3)){
				 	$this -> Curso -> CursosAlumno -> saveField('cur_aprobo',true);
				 }else{
				 	$this -> Curso -> CursosAlumno -> saveField('cur_aprobo',false);
				 }
				
			}
				
		} else{		
			$curso = $this -> Curso -> read(null,$id);
			 $this -> Curso -> CursosAlumno -> bindModel(array(
				'belongsTo' => array(
					'Alumno'
				)
			));
			$alumnos = $this -> Curso -> CursosAlumno -> find('all',array('conditions'=>array('CursosAlumno.curso_id'=>$id)));
			$this -> set(compact('curso','alumnos'));
		}
	}

	public function certificado($alumnoCursoId){
		$this -> Curso -> CursosAlumno -> bindModel(array(
				'belongsTo' => array(
					'Alumno'
				)
			));
		$alumno =  $this -> Curso -> CursosAlumno -> read(null,$alumnoCursoId);
		debug($alumno);
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
