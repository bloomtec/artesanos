<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class ReportesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('*');
	}
	
	public function reporteArtesanos() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$conditions = array();
			/**
			 * ----------------------------------------------------------------------------------------------
			 */
			if(!empty($this -> request -> data['Reporte']['apellido_paterno'])) {
				$conditions['DatosPersonal.dat_apellido_paterno LIKE'] = '%' . $this -> request -> data['Reporte']['apellido_paterno'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['apellido_materno'])) {
				$conditions['DatosPersonal.dat_apellido_materno LIKE'] = '%' . $this -> request -> data['Reporte']['apellido_materno'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['nombres'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['cedula'])) {
				$this -> loadModel('Artesano');
				$artesanos = $this -> Artesano -> find('list', array('conditions' => array('Artesano.art_cedula LIKE' => '%' . $this -> request -> data['Reporte']['cedula'] . '%')));
				$this -> loadModel('Calificacion');
				$calificaciones = $this -> Calificacion -> find('list', array('conditions' => array('Calificacion.artesano_id' => $artesanos)));
				
				$conditions['DatosPersonal.calificacion_id'] = $calificaciones;
			}
			/*
			if(!empty($this -> request -> data['Reporte']['fecha_de_nacimiento'])) {
				$conditions['DatosPersonal.dat_fecha_nacimiento'] = $this -> request -> data['Reporte']['fecha_de_nacimiento'];
			}
			 */
			if(!empty($this -> request -> data['Reporte']['nacionalidad'])) {
				$conditions['DatosPersonal.dat_nacionalidad'] = $this -> request -> data['Reporte']['nacionalidad'];
			}
			if(!empty($this -> request -> data['Reporte']['tipo_de_sangre'])) {
				$conditions['DatosPersonal.dat_tipo_de_sangre'] = $this -> request -> data['Reporte']['tipo_de_sangre'];
			}
			if(!empty($this -> request -> data['Reporte']['sexo'])) {
				$conditions['DatosPersonal.dat_sexo'] = $this -> request -> data['Reporte']['sexo'];
			}
			if(!empty($this -> request -> data['Reporte']['estado_civil'])) {
				$conditions['DatosPersonal.dat_estado_civil'] = $this -> request -> data['Reporte']['estado_civil'];
			}
			if(!empty($this -> request -> data['Reporte']['edad'])) {
				$fecha_de_nacimiento = date('Y-m-d', gmmktime(0,0,0,date('n'),date('j'),date('Y')-$this -> request -> data['Reporte']['edad']));
				$conditions['DatosPersonal.dat_fecha_nacimiento <='] = $fecha_de_nacimiento;
			}
			if(!empty($this -> request -> data['Reporte']['grado_de_estudio'])) {
				$conditions['DatosPersonal.dat_grado_de_estudio'] = $this -> request -> data['Reporte']['grado_de_estudio'];
			}
			if(!empty($this -> request -> data['Reporte']['hijos_mayores'])) {
				$conditions['DatosPersonal.dat_hijos_mayores'] = $this -> request -> data['Reporte']['hijos_mayores'];
			}
			if(!empty($this -> request -> data['Reporte']['hijos_menores'])) {
				$conditions['DatosPersonal.dat_hijos_menores'] = $this -> request -> data['Reporte']['hijos_menores'];
			}
			if(!empty($this -> request -> data['Reporte']['tipo_de_discapacidad'])) {
				$conditions['DatosPersonal.dat_tipo_de_discapacidad'] = $this -> request -> data['Reporte']['tipo_de_discapacidad'];
			}
			/**
			 * ----------------------------------------------------------------------------------------------
			 */
			$this -> Session -> delete('conditions');
			$this -> Session -> write('conditions', $conditions);
			$this -> redirect(array('controller' => 'datos_personales', 'action' => 'reporteArtesanos'));
		}
		$tipos_de_discapacidad = $this -> Reporte -> getValores(6);
		$nacionalidades = $this -> Reporte -> getValores(1);
		$tipos_de_sangre = $this -> Reporte -> getValores(2);
		$sexos = $this -> Reporte -> getValores(5);
		$estados_civiles = $this -> Reporte -> getValores(3);
		$grados_de_estudio = $this -> Reporte -> getValores(4);
		$this -> set(compact('tipos_de_discapacidad', 'nacionalidades', 'tipos_de_sangre', 'sexos', 'estados_civiles', 'grados_de_estudio'));
	}
	
	public function reporteCalificacionesOperador() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$conditions = array();
			if(!empty($this -> request -> data['Reporte']['cedula'])) {
				$this -> loadModel('Usuario');
				$usuario = $this -> Usuario -> findByUsuNumeroIdentificacion($this -> request -> data['Reporte']['cedula']);
				if(!empty($usuario)) {
					$this -> loadModel('Calificacion');
					$calificaciones = $this -> Calificacion -> find('list', array('conditions' => array('OR' => array('Calificacion.cal_inspector_local' => $usuario['Usuario']['id'], 'Calificacion.cal_inspector_taller' => $usuario['Usuario']['id']))));
				}
				$conditions['Calificacion.id'] = $calificaciones;
			}
			$this -> Session -> delete('conditions');
			$this -> Session -> write('conditions', $conditions);
			$this -> redirect(array('controller' => 'calificaciones', 'action' => 'reporteCalificacionesOperador'));
		}
	}
	
	public function reporteCalificacionesArtesano() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$conditions = array();
			if(!empty($this -> request -> data['Reporte']['cedula'])) {
				$this -> loadModel('Artesano');
				$artesano = $this -> Artesano -> findByArtCedula($this -> request -> data['Reporte']['cedula']);
				if(!empty($artesano)) {
					$this -> loadModel('Calificacion');
					$calificaciones = $this -> Calificacion -> find('list', array('conditions' => array('Calificacion.artesano_id' => $artesano['Artesano']['id'])));
				}
				$conditions['Calificacion.id'] = $calificaciones;
			}
			$this -> Session -> delete('conditions');
			$this -> Session -> write('conditions', $conditions);
			$this -> redirect(array('controller' => 'calificaciones', 'action' => 'reporteCalificacionesArtesano'));
		}
	}
	
	public function reporteInspecciones() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$conditions = array();
			$fecha_inicio = $this -> request -> data['Reporte']['fecha_inicial'];
			$fecha_inicio = $fecha_inicio['year'] . '-' . $fecha_inicio['month'] . '-' . $fecha_inicio['day'];
			
			$fecha_fin = $this -> request -> data['Reporte']['fecha_final'];
			$fecha_fin = $fecha_fin['year'] . '-' . $fecha_fin['month'] . '-' . $fecha_fin['day'];
			$DT_fecha_inicio = new DateTime($fecha_inicio);
			$DT_fecha_fin = new DateTime($fecha_fin);
			if($DT_fecha_inicio > $DT_fecha_fin) {
				$this -> Session -> setFlash(__('La fecha inicial no puede ser mayor que la final'), 'crud/error');
			} else {
				$conditions['OR'] = array(
					'Calificacion.cal_fecha_inspeccion_taller BETWEEN ? AND ?'=> array($fecha_inicio, $fecha_fin),
					'Calificacion.cal_fecha_inspeccion_local BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
				);
				if(!empty($this -> request -> data['Reporte']['estado'])) {
					if($this -> request -> data['Reporte']['estado'] == -3) {
						$conditions['Calificacion.cal_estado'] = 0;
					} else {
						$conditions['Calificacion.cal_estado'] = $this -> request -> data['Reporte']['estado'];
					}					
				}
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$this -> redirect(array('controller' => 'calificaciones', 'action' => 'reporteInspecciones'));
			}
		}
	}
	
	public function reporteEstadisticoCalificaciones() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}

}