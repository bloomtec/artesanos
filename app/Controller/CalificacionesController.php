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
		$this -> Auth -> allow('resumen', 'inspecciones', 'verInspeccion');
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
	
	public function view($cal_id = null) {
		$this -> layout = 'pdf2';
		$this -> Calificacion -> recursive = 1;
		
		$order = array();
		
		$inspeccion = $this -> Calificacion -> find(
			'first',
			array(
				'conditions' => array(
					'Calificacion.id' => $cal_id
				)
			)
		);
		
		$operadores = $this -> Calificacion -> Taller -> TalleresTrabajador -> find(
			'list', array(
				'conditions' => array(
					'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
					'TalleresTrabajador.tipos_de_trabajador_id' => 1
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
					'Trabajador.id' => $operadores
				)
			)
		);
		foreach($inspeccion['Operador'] as $key => $operador) {
			$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find(
				'first', array(
					'conditions' => array(
						'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
						'TalleresTrabajador.trabajador_id' => $operador['Trabajador']['id']
					)
				)
			);
			$inspeccion['Operador'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
			$inspeccion['Operador'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
		}
		$aprendices = $this -> Calificacion -> Taller -> TalleresTrabajador -> find(
			'list', array(
				'conditions' => array(
					'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
					'TalleresTrabajador.tipos_de_trabajador_id' => 2
				),
				'fields' => array(
					'TalleresTrabajador.trabajador_id'
				),
				'order' => array(
					'TalleresTrabajador.trabajador_id' => 'ASC'
				)
			)
		);
		$inspeccion['Aprendiz'] = $this -> Calificacion -> Taller -> Trabajador -> find(
			'all', array(
				'conditions' => array(
					'Trabajador.id' => $aprendices
				)
			)
		);
		foreach($inspeccion['Aprendiz'] as $key => $aprendiz) {
			$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find(
				'first', array(
					'conditions' => array(
						'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
						'TalleresTrabajador.trabajador_id' => $aprendiz['Trabajador']['id']
					)
				)
			);
			$inspeccion['Aprendiz'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
			$inspeccion['Aprendiz'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
		}
		$this -> Calificacion -> Taller -> EquiposDeTrabajo -> recursive = -1;
		$inspeccion['EquipoDeTrabajo'] = $this -> Calificacion -> Taller -> EquiposDeTrabajo -> find(
			'all', array(
				'conditions' => array(
					'EquiposDeTrabajo.taller_id' => $inspeccion['Taller'][0]['id']
				)
			)
		);
		$this -> Calificacion -> Taller -> MateriasPrima -> recursive = -1;
		$inspeccion['MateriaPrima'] = $this -> Calificacion -> Taller -> MateriasPrima -> find(
			'all', array(
				'conditions' => array(
					'MateriasPrima.taller_id' => $inspeccion['Taller'][0]['id']
				)
			)
		);
		$this -> Calificacion -> Taller -> ProductosElaborado -> recursive = -1;
		$inspeccion['ProductoElaborado'] = $this -> Calificacion -> Taller -> ProductosElaborado -> find(
			'all', array(
				'conditions' => array(
					'ProductosElaborado.taller_id' => $inspeccion['Taller'][0]['id']
				)
			)
		);
		
		$this -> set(compact('inspeccion'));
	}
	
	public function inspecciones() {
		$this -> Calificacion -> recursive = -1;
		
		$inspector_id = $this -> Auth -> user('id');
		
		$talleres = $this -> Calificacion -> find(
			'all',
			array(
				'conditions' => array(
					'Calificacion.cal_inspector_taller' => $inspector_id,
					'Calificacion.cal_taller_aprobado' => 0,
					'Calificacion.cal_estado' => 0
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
					'Calificacion.cal_local_aprobado' => 0,
					'Calificacion.cal_estado' => 0
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
	
	public function resumen($cal_id = null) {
		$this -> Calificacion -> recursive = 1;
		
		$order = array();
		
		$calificacion = $this -> Calificacion -> find(
			'first',
			array(
				'conditions' => array(
					'Calificacion.id' => $cal_id
				)
			)
		);
		$this -> set(compact('calificacion'));
	}
	
	private function uploadFile($tmp_name = null, $filename = null) {
		if($tmp_name && $filename) {			
			$url = 'files/uploads/'.$filename;			
			return move_uploaded_file($tmp_name, $url);
		}
	}
	
	public function verInspeccion($cal_id = null, $tipo_inspeccion = null) {
		$this -> layout ='print';
		if ($this -> request -> is('post')) {
			if(!empty($this -> request -> data)) { // Se enviaron datos
				if($this -> Calificacion -> save($this -> request -> data)) { // Se puede salvar los datos
					
					foreach($this -> request -> data['Documentos'] as $key => $documento) {
						if(!empty($documento['name']) && !$documento['error']) {
							$now = new DateTime('now');
							$filename = $now->format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $documento['name']);
							if($this -> uploadFile($documento['tmp_name'], $filename)) {
								$this -> Calificacion -> Documento -> create();
								$documento = array(
									'Documento' => array(
										'doc_name' => $documento['name'],
										'doc_path' => 'files/uploads/'.$filename,
										'calificacion_id' => $this -> request -> data['Calificacion']['id'],
										'doc_documento_taller' => $this -> request -> data['Documentos']['is_taller']
									)
								);
								$this -> Calificacion -> Documento -> save($documento);
							}
						}
					}
				
					// Lógica de revisión del estado de la inspección
					// Siempre va a existir el taller, se debe verificar si hay inspección de
					// un local para proceder a poner el estado de la calificación
				 
					//if(empty($this -> request -> data['Calificacion']['cal_']))
					$calificacion = $this -> Calificacion -> read(null, $this -> request -> data ['Calificacion']['id']);
					$verificar_local = false;
					if(!empty($calificacion['Calificacion']['cal_inspector_local'])) {
						// Hay un local
						if($calificacion['Calificacion']['cal_local_aprobado'] == -1 || $calificacion['Calificacion']['cal_taller_aprobado'] == -1) {
							// Taller o local DENEGADO
							$calificacion['Calificacion']['cal_estado'] = -1;
						} elseif($calificacion['Calificacion']['cal_local_aprobado'] == 1 && $calificacion['Calificacion']['cal_taller_aprobado']) {
							// Taller y local APROBADOS
							$calificacion['Calificacion']['cal_estado'] = 1;
						} else {
							// Falta alguno por aprobar
							$calificacion['Calificacion']['cal_estado'] = 0;
						}
					} else {
						// No hay local
						if($calificacion['Calificacion']['cal_taller_aprobado'] == -1) {
							// Taller DENEGADO
							$calificacion['Calificacion']['cal_estado'] = -1;
						} elseif($calificacion['Calificacion']['cal_taller_aprobado'] == 1) {
							// Taller APROBADO
							$calificacion['Calificacion']['cal_estado'] = 1;
						} else {
							// Falta por aprobar
							$calificacion['Calificacion']['cal_estado'] = 0;
						}
					}
					
					$periodo_validez = 0;
					$fecha_actual = new DateTime('now');
					$fecha_actual = $fecha_actual -> format('Y-m-d');
					$fecha_expiracion = null;
					
					if($calificacion['Calificacion']['cal_estado'] == 1) {
						// Acomodar la fecha a la nueva fecha de expiración
						$this -> loadModel('Configuracion');
						$configuracion = $this -> Configuracion -> read(null, 1);
						if($calificacion['Calificacion']['tipos_de_calificacion_id'] == 2) {
							// Artesano Autónomo
							$periodo_validez = $configuracion['Configuracion']['con_anos_renovacion_artesanos_autonomos'];
						} else {
							// Artesano Normal
							$periodo_validez = $configuracion['Configuracion']['con_anos_renovacion_artesanos_normales'];
						}
						$fecha_expiracion = strtotime("+$periodo_validez year", strtotime($fecha_actual));
						$calificacion['Calificacion']['cal_fecha_expedicion'] = $fecha_actual;
						$calificacion['Calificacion']['cal_fecha_expiracion'] = date('Y-m-d', $fecha_expiracion);
						$calificaciones_validas = $this -> Calificacion -> query('SELECT MAX(`cal_numero_valido`) FROM `calificaciones`');
						$calificaciones_validas = $calificaciones_validas[0][0]['MAX(`cal_numero_valido`)'];
						if($calificaciones_validas) {
							$calificacion['Calificacion']['cal_numero_valido'] = $calificaciones_validas + 1;
						} else {
							$calificacion['Calificacion']['cal_numero_valido'] = 1;
						}
					} else {
						//$fecha_expiracion = strtotime('+1 month', strtotime($fecha_actual));
					}
					
					$this -> Calificacion -> save($calificacion);
					$this -> redirect(array('action' => 'inspecciones'));
					
				} else { // No se puede salvar los datos
					
				}
			} else { // No se envían datos
				
			}
		} else {
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
				$operadores = $this -> Calificacion -> Taller -> TalleresTrabajador -> find(
					'list', array(
						'conditions' => array(
							'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
							'TalleresTrabajador.tipos_de_trabajador_id' => 1
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
							'Trabajador.id' => $operadores
						)
					)
				);
				foreach($inspeccion['Operador'] as $key => $operador) {
					$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find(
						'first', array(
							'conditions' => array(
								'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
								'TalleresTrabajador.trabajador_id' => $operador['Trabajador']['id']
							)
						)
					);
					$inspeccion['Operador'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
					$inspeccion['Operador'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				}
				$aprendices = $this -> Calificacion -> Taller -> TalleresTrabajador -> find(
					'list', array(
						'conditions' => array(
							'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
							'TalleresTrabajador.tipos_de_trabajador_id' => 2
						),
						'fields' => array(
							'TalleresTrabajador.trabajador_id'
						),
						'order' => array(
							'TalleresTrabajador.trabajador_id' => 'ASC'
						)
					)
				);
				$inspeccion['Aprendiz'] = $this -> Calificacion -> Taller -> Trabajador -> find(
					'all', array(
						'conditions' => array(
							'Trabajador.id' => $aprendices
						)
					)
				);
				foreach($inspeccion['Aprendiz'] as $key => $aprendiz) {
					$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find(
						'first', array(
							'conditions' => array(
								'TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'],
								'TalleresTrabajador.trabajador_id' => $aprendiz['Trabajador']['id']
							)
						)
					);
					$inspeccion['Aprendiz'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
					$inspeccion['Aprendiz'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				}
				$this -> Calificacion -> Taller -> EquiposDeTrabajo -> recursive = -1;
				$inspeccion['EquipoDeTrabajo'] = $this -> Calificacion -> Taller -> EquiposDeTrabajo -> find(
					'all', array(
						'conditions' => array(
							'EquiposDeTrabajo.taller_id' => $inspeccion['Taller'][0]['id']
						)
					)
				);
				$this -> Calificacion -> Taller -> MateriasPrima -> recursive = -1;
				$inspeccion['MateriaPrima'] = $this -> Calificacion -> Taller -> MateriasPrima -> find(
					'all', array(
						'conditions' => array(
							'MateriasPrima.taller_id' => $inspeccion['Taller'][0]['id']
						)
					)
				);
				$this -> Calificacion -> Taller -> ProductosElaborado -> recursive = -1;
				$inspeccion['ProductoElaborado'] = $this -> Calificacion -> Taller -> ProductosElaborado -> find(
					'all', array(
						'conditions' => array(
							'ProductosElaborado.taller_id' => $inspeccion['Taller'][0]['id']
						)
					)
				);
			} else { // Local
				if(isset($inspeccion['Taller'])) unset($inspeccion['Taller']);
			}
			
			$this -> set(compact('inspeccion', 'se_inspecciona', 'tipo_inspeccion'));
		}
		
		
	}

	public function reporteCalificacionesOperador() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$csv_export_data = $this -> Calificacion -> find('all', array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC')));
		$calificaciones = $this -> paginate();
		foreach($calificaciones as $key => $calificacion) {
			$calificaciones[$key]['Calificacion']['cal_rama'] = $this -> requestAction('/ramas/getNombre/' . $calificacion['Calificacion']['rama_id']);
			$calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'] = $this -> requestAction('/tipos_de_calificaciones/getNombre/' . $calificacion['Calificacion']['tipos_de_calificacion_id']);
			$csv_export_data[$key]['Calificacion']['cal_rama'] = $calificaciones[$key]['Calificacion']['cal_rama'];
			$csv_export_data[$key]['Calificacion']['cal_tipo_de_calificacion'] = $calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'];
		}
		$this -> Session -> delete('CSV.export_data');
		$this -> Session -> write('CSV.export_data', $csv_export_data);
		$this -> Session -> delete('CSV.filename');
		$this -> Session -> write('CSV.filename', 'Reporte_Calificaciones_x_Operador');
		$this -> set('calificaciones', $calificaciones);
	}

	public function reporteCalificacionesArtesano() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> Session -> delete('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$csv_export_data = $this -> Calificacion -> find('all', array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC')));
		$calificaciones = $this -> paginate();
		foreach($calificaciones as $key => $calificacion) {
			$calificaciones[$key]['Calificacion']['cal_rama'] = $this -> requestAction('/ramas/getNombre/' . $calificacion['Calificacion']['rama_id']);
			$calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'] = $this -> requestAction('/tipos_de_calificaciones/getNombre/' . $calificacion['Calificacion']['tipos_de_calificacion_id']);
			$csv_export_data[$key]['Calificacion']['cal_rama'] = $calificaciones[$key]['Calificacion']['cal_rama'];
			$csv_export_data[$key]['Calificacion']['cal_tipo_de_calificacion'] = $calificaciones[$key]['Calificacion']['cal_tipo_de_calificacion'];
		}
		$this -> Session -> delete('CSV.export_data');
		$this -> Session -> write('CSV.export_data', $csv_export_data);
		$this -> Session -> delete('CSV.filename');
		$this -> Session -> write('CSV.filename', 'Reporte_Calificaciones_x_Artesano');
		$this -> set('calificaciones', $calificaciones);
	}
	
	public function reporteInspecciones() {
		$this -> Calificacion -> recursive = 0;
		$conditions = $this -> Session -> read('conditions');
		$this -> paginate = array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC'));
		$csv_export_data = $this -> Calificacion -> find('all', array('conditions' => $conditions, 'order' => array('Calificacion.id' => 'ASC')));
		$calificaciones = $this -> paginate();
		if(!empty($calificaciones)) {
			foreach($calificaciones as $key => $calificacion) {
				$calificaciones[$key]['Calificacion']['cal_nombre_inspector_taller'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_taller']);
				$calificaciones[$key]['Calificacion']['cal_nombre_inspector_local'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_local']);
				$calificaciones[$key]['Calificacion']['cal_nombre_artesano'] = $this -> requestAction('/datos_personales/getNombreArtesano/'. $calificacion['Calificacion']['id']);
				$csv_export_data[$key]['Calificacion']['cal_nombre_inspector_taller'] = $calificaciones[$key]['Calificacion']['cal_nombre_inspector_taller'];
				$csv_export_data[$key]['Calificacion']['cal_nombre_inspector_local'] = $calificaciones[$key]['Calificacion']['cal_nombre_inspector_local'];
				$csv_export_data[$key]['Calificacion']['cal_nombre_artesano'] = $calificaciones[$key]['Calificacion']['cal_nombre_artesano'];
				if($csv_export_data[$key]['Calificacion']['cal_estado'] == 1) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Aprobado';
				} elseif($csv_export_data[$key]['Calificacion']['cal_estado'] == -1) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Denegado';
				} elseif($csv_export_data[$key]['Calificacion']['cal_estado'] == -2) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Deshabilitado';
				} else {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Pendiente';
				}
				if($csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] == 1) {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Aprobado';
				} elseif($csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] == -1) {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Denegado';
				} else {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Pendiente';
				}
				if(!empty($csv_export_data[$key]['Calificacion']['cal_local_aprobado'])) {
					if($csv_export_data[$key]['Calificacion']['cal_local_aprobado'] == 1) {
						$csv_export_data[$key]['Calificacion']['cal_local_aprobado'] = 'Aprobado';
					} elseif($csv_export_data[$key]['Calificacion']['cal_local_aprobado'] == -1) {
						$csv_export_data[$key]['Calificacion']['cal_local_aprobado'] = 'Denegado';
					} else {
						$csv_export_data[$key]['Calificacion']['cal_local_aprobado'] = 'Pendiente';
					}
				} else {
					$csv_export_data[$key]['Calificacion']['cal_local_aprobado'] = '';
				}
			}
		}
		$this -> Session -> delete('CSV.export_data');
		$this -> Session -> write('CSV.export_data', $csv_export_data);
		$this -> Session -> delete('CSV.filename');
		$this -> Session -> write('CSV.filename', 'Reporte_Inspecciones');
		$this -> set('calificaciones', $calificaciones);
	}
	
	public function imprimir($id = null){
		$this -> layout = 'especie_valorada';
		$inspeccion = $this -> Calificacion -> read(null, $id);
		$this -> set(compact('inspeccion'));
	}

}
