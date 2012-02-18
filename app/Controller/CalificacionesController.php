<?php
App::uses('AppController', 'Controller');
/**
 * Calificaciones Controller
 *
 * @property Calificacion $Calificacion
 */
class CalificacionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('inspecciones', 'verInspeccion', 'reporteInspecciones', 'reporteCalificacionesOperador', 'reporteCalificacionesArtesano');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Calificacion -> recursive = 0;
		$this -> set('calificaciones', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Calificacion -> id = $id;
		if (!$this -> Calificacion -> exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		$this -> set('calificacion', $this -> Calificacion -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> Calificacion -> create();
			if ($this -> Calificacion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The calificacion has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The calificacion could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$ramas = $this -> Calificacion -> Rama -> find('list');
		$artesanos = $this -> Calificacion -> Artesano -> find('list');
		$tiposDeCalificaciones = $this -> Calificacion -> TiposDeCalificacion -> find('list');
		$this -> set(compact('ramas', 'artesanos', 'tiposDeCalificaciones'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Calificacion -> id = $id;
		if (!$this -> Calificacion -> exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Calificacion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The calificacion has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The calificacion could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Calificacion -> read(null, $id);
		}
		$ramas = $this -> Calificacion -> Rama -> find('list');
		$artesanos = $this -> Calificacion -> Artesano -> find('list');
		$tiposDeCalificaciones = $this -> Calificacion -> TiposDeCalificacion -> find('list');
		$this -> set(compact('ramas', 'artesanos', 'tiposDeCalificaciones'));
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
		$this -> Calificacion -> id = $id;
		if (!$this -> Calificacion -> exists()) {
			throw new NotFoundException(__('Invalid calificacion'));
		}
		if ($this -> Calificacion -> delete()) {
			$this -> Session -> setFlash(__('Calificacion deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Calificacion was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}
	
	public function inspecciones() {
		$this -> Calificacion -> recursive = -1;
		
		$inspector_id = $this -> Auth -> user('id');
		
		$talleres = $this -> Calificacion -> find(
			'all',
			array(
				'conditions' => array(
					'Calificacion.cal_inspector_taller' => $inspector_id,
					'Calificacion.cal_taller_aprobado' => 0
				),
				'order' => array(
					'Calificacion.cal_fecha_inspeccion_taller' => 'ASC'
				),
				'fields' => array(
					'Calificacion.id',
					'Calificacion.artesano_id',
					'Calificacion.cal_inspector_taller',
					'Calificacion.cal_fecha_inspeccion_taller',
					'Calificacion.cal_comentarios_taller',
					'Calificacion.cal_taller_aprobado',
				)
			)
		);
		
		$locales = $this -> Calificacion -> find(
			'all',
			array(
				'conditions' => array(
					'Calificacion.cal_inspector_local' => $inspector_id,
					'Calificacion.cal_local_aprobado' => 0
				),
				'order' => array(
					'Calificacion.cal_fecha_inspeccion_local' => 'ASC'
				),
				'fields' => array(
					'Calificacion.id',
					'Calificacion.cal_inspector_local',
					'Calificacion.cal_fecha_inspeccion_local',
					'Calificacion.cal_comentarios_local',
					'Calificacion.cal_local_aprobado',
				)
			)
		);
		
		$this -> set(compact('locales', 'talleres'));
		
	}
	
	public function verInspeccion($cal_id = null, $tipo_inspeccion = null) {
		
		$this -> Calificacion -> recursive = 1;
		
		$inspector_id = $this -> Auth -> user('id');
		
		$se_inspecciona = '';
		$fields = array();
		$order = array();
		
		if($tipo_inspeccion == 1) { // Taller
			$se_inspecciona = 'Taller';
			$fields = array(
				'Calificacion.id',
				'Calificacion.artesano_id',
				'Calificacion.cal_inspector_taller',
				'Calificacion.cal_fecha_inspeccion_taller',
				'Calificacion.cal_comentarios_taller',
				'Calificacion.cal_taller_aprobado'
			);
			$order = array('Calificacion.cal_fecha_inspeccion_taller' => 'ASC');
		} elseif($tipo_inspeccion == 2) { // Local
			$se_inspecciona = 'Local';
			$fields = array(
				'Calificacion.id',
				'Calificacion.artesano_id',
				'Calificacion.cal_inspector_local',
				'Calificacion.cal_fecha_inspeccion_local',
				'Calificacion.cal_comentarios_local',
				'Calificacion.cal_local_aprobado'
			);
			$order = array('Calificacion.cal_fecha_inspeccion_local' => 'ASC');
		} else {
			$this -> redirect($this -> referer());
		}
		
		$inspeccion = $this -> Calificacion -> find(
			'first',
			array(
				'conditions' => array(
					'Calificacion.id' => $cal_id
				),
				'fields' => $fields,
				'order' => $order
			)
		);
		
		if($tipo_inspeccion == 1) { // Taller
			if(isset($inspeccion['Local'])) unset($inspeccion['Local']);
			$trabajadores = $this -> Calificacion -> Taller -> TalleresTrabajador -> find(
				'list', array(
					'conditions' => array(
						'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id']
					),
					'fields' => array(
						'TalleresTrabajador.trabajador_id'
					),
					'order' => array(
						'TalleresTrabajador.trabajador_id' => 'ASC'
					)
				)
			);
			$this -> Calificacion -> Taller -> Trabajador -> recursive = -1;
			$inspeccion['Operador'] = $this -> Calificacion -> Taller -> Trabajador -> find(
				'all', array(
					'conditions' => array(
						'Trabajador.id' => $trabajadores,
						'Trabajador.tipos_de_trabajador_id' => 1
					)
				)
			);
			$inspeccion['Aprendiz'] = $this -> Calificacion -> Taller -> Trabajador -> find(
				'all', array(
					'conditions' => array(
						'Trabajador.id' => $trabajadores,
						'Trabajador.tipos_de_trabajador_id' => 2
					)
				)
			);
		} else { // Local
			if(isset($inspeccion['Taller'])) unset($inspeccion['Taller']);
		}
		
		$this -> set(compact('inspeccion', 'se_inspecciona', 'tipo_inspeccion'));
	}

	public function reporteCalificacionesOperador() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$calificaciones = $this -> paginate();
		foreach($calificaciones as $key => $calificacion) {
			$calificaciones[$key]['Calificacion']['cal_rama'] = $this -> requestAction('/ramas/getNombre/' . $calificacion['Calificacion']['rama_id']);
			$calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'] = $this -> requestAction('/tipos_de_calificaciones/getNombre/' . $calificacion['Calificacion']['tipos_de_calificacion_id']);
		}
		$this -> set('calificaciones', $calificaciones);
	}

	public function reporteCalificacionesArtesano() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$calificaciones = $this -> paginate();
		foreach($calificaciones as $key => $calificacion) {
			$calificaciones[$key]['Calificacion']['cal_rama'] = $this -> requestAction('/ramas/getNombre/' . $calificacion['Calificacion']['rama_id']);
			$calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'] = $this -> requestAction('/tipos_de_calificaciones/getNombre/' . $calificacion['Calificacion']['tipos_de_calificacion_id']);
		}
		$this -> set('calificaciones', $calificaciones);
	}
	
	public function reporteInspecciones() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$calificaciones = $this -> paginate();
		foreach($calificaciones as $key => $calificacion) {
			$calificaciones[$key]['Calificacion']['cal_nombre_inspector_taller'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_taller']);
			$calificaciones[$key]['Calificacion']['cal_nombre_inspector_local'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_local']);
			$calificaciones[$key]['Calificacion']['cal_nombre_artesano'] = $this -> requestAction('/datos_personales/getNombreArtesano/'. $calificacion['Calificacion']['id']);
		}
		$this -> set('calificaciones', $calificaciones);
	}

}
