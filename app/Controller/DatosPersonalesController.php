<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class DatosPersonalesController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('reporteCalificacionesArtesano', 'getNombreArtesano');
	}
	
	/**
	 * Reporte de artesanos
	 */
	public function reporteArtesanos() {
		$this -> DatosPersonal -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		// FUNCIONALIDAD PARA PROVINCIAS Y PARA RAMAS
		$calificacionesId = array();
		$calificacionesRama = null;
		$calificacionesLocales = null;
		$calificacionesTalleres = null;
		$calificacionesPorProvincia = null;

		if (isset($conditions['Calificacion.rama_id']) || isset($conditions['Provincia.provincia_id'])) {
			if (isset($conditions['Calificacion.rama_id'])) {
				$calificacionesRama = $this -> DatosPersonal -> Calificacion -> find('list', array('fields' => array('id', 'id'), 'conditions' => array('Calificacion.rama_id' => $conditions['Calificacion.rama_id'], 'Calificacion.cal_estado' => 1)));
				//debug($calificacionesRama);
				unset($conditions['Calificacion.rama_id']);
				$calificacionesId = $calificacionesRama;
			}
			if (isset($conditions['Provincia.provincia_id'])) {
				//	debug($conditions['Provincia.provincia_id']);
				$calificacionesLocales = $this -> DatosPersonal -> Calificacion -> Local -> find('list', array('fields' => array('calificacion_id', 'calificacion_id'), 'conditions' => array('Local.provincia_id' => $conditions['Provincia.provincia_id'])));
				$calificacionesTalleres = $this -> DatosPersonal -> Calificacion -> Taller -> find('list', array('fields' => array('calificacion_id', 'calificacion_id'), 'conditions' => array('Taller.provincia_id' => $conditions['Provincia.provincia_id'])));
				$calificacionesPorProvincia = array_merge($calificacionesLocales, $calificacionesTalleres);
				//debug($calificacionesLocales);
				//debug($calificacionesTalleres);

				if (!empty($calificacionesId)) {
					$calificacionesId = array_intersect($calificacionesId, $calificacionesPorProvincia);
				} else {
					$calificacionesId = $calificacionesPorProvincia;
				}
				unset($conditions['Provincia.provincia_id']);
			}
			//$calificacionesId=array_merge($calificacionesRama,$calificacionesLocales,$calificacionesTalleres);

			//$calificacionesId=array_intersect($calificacionesRama, $calificacionesPorProvincia);

			if (!empty($calificacionesId)) {
				$conditions['DatosPersonal.calificacion_id'] = $calificacionesId;
			} else {
				$conditions['DatosPersonal.calificacion_id'] = -1;
			}
		}
		//___________________________________________

		$this -> paginate = array('conditions' => $conditions, 'order' => array('DatosPersonal.dat_nombres' => 'ASC'));
		$csv_export_data = $this -> DatosPersonal -> find('all', array('conditions' => $conditions, 'order' => array('DatosPersonal.dat_nombres' => 'ASC')));
		$artesanos = $this -> paginate();
		foreach ($artesanos as $key => $artesano) {
			$tmp = $this -> DatosPersonal -> Calificacion -> Artesano -> read('art_cedula', $artesano['Calificacion']['artesano_id']);
			$artesanos[$key]['DatosPersonal']['dat_cedula'] = $tmp['Artesano']['art_cedula'];
			$csv_export_data[$key]['DatosPersonal']['dat_cedula'] = $tmp['Artesano']['art_cedula'];
		}
		$this -> Session -> delete('CSV.export_data');
		$this -> Session -> write('CSV.export_data', $csv_export_data);
		$this -> Session -> delete('CSV.filename');
		$this -> Session -> write('CSV.filename', 'Reporte_Artesanos');
		$this -> set('artesanos', $artesanos);
	}
	
	/**
	 * Obtener el nombre de un artesano según una calificación
	 * @param int $cal_id ID de la calificación
	 * @return Nombre del artesano
	 */
	public function getNombreArtesano($cal_id) {
		$datos = $this -> DatosPersonal -> find('first', array('conditions' => array('DatosPersonal.calificacion_id' => $cal_id), 'order' => array('DatosPersonal.created' => 'DESC')));
		if (!empty($datos)) {
			return $datos['DatosPersonal']['dat_nombres'] . ' ' . $datos['DatosPersonal']['dat_apellido_paterno'] . ' ' . $datos['DatosPersonal']['dat_apellido_materno'];
		} else {
			return '<b>:: eliminado ::</b>';
		}
	}

}
