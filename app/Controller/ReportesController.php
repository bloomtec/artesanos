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
			$this -> set('mostrar_reporte', true);
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
				$artesanos = $this -> Artesano -> find('all', array('conditions' => array('Artesano.art_cedula LIKE' => '%' . $this -> request -> data['Reporte']['cedula'] . '%')));
				
				$conditions['DatosPersonal.id'] = $ids;
			}
			/*
			if(!empty($this -> request -> data['Reporte']['fecha_de_nacimiento'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['nacionalidad'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['tipo_de_sangre'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['sexo'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['estado_civil'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['edad'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['grado_de_estudio'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['hijos_mayores'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['hijos_menores'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			if(!empty($this -> request -> data['Reporte']['tipo_de_discapacidad'])) {
				$conditions['DatosPersonal.dat_nombres LIKE'] = '%' . $this -> request -> data['Reporte']['nombres'] . '%';
			}
			 */
			/**
			 * ----------------------------------------------------------------------------------------------
			 */
			$this -> Session -> delete('conditions');
			$this -> Session -> write('conditions', $conditions);
			$this -> redirect(array('controller' => 'datos_personales', 'action' => 'reporteArtesanos'));
		}
		$tipos_de_discapacidad = $this -> Reporte -> getValores(6);
		$this -> set(compact('tipos_de_discapacidad'));
	}
	
	public function reporteCalificacionesOperador() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}
	
	public function reporteCalificacionesArtesano() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
		}
	}
	
	public function reporteInspecciones() {
		if ($this -> request -> is('post')) {
			// Sección informe
			$this -> set('mostrar_reporte', true);
		} else {
			// Sección formulario
			$this -> set('mostrar_reporte', false);
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