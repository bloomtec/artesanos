<?php
App::uses('AppController', 'Controller');
/**
 * Artesanos Controller
 *
 * @property Artesano $Artesano
 */
class ArtesanosController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getID', 'crearCalificacion', 'asignarInspector', 'isCalificacionActive', 'validarCalificacion', 'validarCalificacionAutonomo', 'validarCalificacionNormal', 'validarCalificacionObtenerFechas');
	}
	
	public function getID($id = null) {
		if($id) {
			$artesano = $this -> Artesano -> read(null, $id);
			if(!empty($artesano)) {
				return $artesano['Artesano']['art_cedula'];
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Artesano -> recursive = 0;
		$artesanos = $this -> paginate();
		foreach($artesanos as $key => $artesano) {
			$calificacion = $this -> Artesano -> Calificacion -> find('first', array('order' => array('Calificacion.created' => 'DESC'), 'conditions' => array('Calificacion.artesano_id' => $artesano['Artesano']['id'])));
			$datos_personales = $this -> Artesano -> Calificacion -> DatosPersonal -> find('first', array('conditions' => array('DatosPersonal.calificacion_id' => $calificacion['Calificacion']['id'])));
			$artesanos[$key]['Artesano']['art_nombres'] = $datos_personales['DatosPersonal']['dat_nombres'];
			$artesanos[$key]['Artesano']['art_apellido_paterno'] = $datos_personales['DatosPersonal']['dat_apellido_paterno'];
			$artesanos[$key]['Artesano']['art_apellido_materno'] = $datos_personales['DatosPersonal']['dat_apellido_materno'];
			$artesanos[$key]['Artesano']['art_nacionalidad'] = $datos_personales['DatosPersonal']['dat_nacionalidad'];
		}
		$this -> set('artesanos', $artesanos);
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Artesano -> id = $id;
		if (!$this -> Artesano -> exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		$this -> set('artesano', $this -> Artesano -> read(null, $id));
	}
	
	/**
	 * crearCalificacion method
	 * 
	 * @param array $data
	 * @param array $artesano
	 */
	private function crearCalificacion($data = null, $artesano = null) {
		if($data && $artesano) {
			$this -> request -> data = $data;
			
			// Guardar la calificacion
			$this -> Artesano -> Calificacion -> create();
			$calificacion = array();
			$calificacion['Calificacion'] = $this -> request -> data['Calificacion'];
			$calificacion['Calificacion']['artesano_id'] = $this -> request -> data['Calificacion']['artesano_id'] = $artesano['Artesano']['id'];
			if($this -> Artesano -> Calificacion -> save($calificacion)) {
				$calificacion['Calificacion']['id'] = $this -> request -> data['Calificacion']['id'] = $this -> Artesano -> Calificacion -> id;
				
				// Guardar los datos personales
				$this -> Artesano -> Calificacion -> DatosPersonal -> create();
				$datos_personales = array();
				$datos_personales['DatosPersonal'] = $this -> request -> data['DatosPersonal'];
				$datos_personales['DatosPersonal']['calificacion_id'] = $this -> request -> data['DatosPersonal']['calificacion_id'] = $calificacion['Calificacion']['id'];
				if($this -> Artesano -> Calificacion -> DatosPersonal -> save($datos_personales)) {
					$this -> Session -> setFlash(__('Los datos del artesano han sido registrados.'), 'crud/success');
				} else {
					$this -> Session -> setFlash(__('Ha ocurrido un error al registrar los datos personales del artesano. Por favor, intente de nuevo.'), 'crud/error');
				}
				
				// Guardar el taller
				$this -> Artesano -> Calificacion -> Taller -> create();
				$taller = array();
				$taller['Taller'] = $this -> request -> data['Taller'];
				$taller['Taller']['calificacion_id'] = $this -> request -> data['Taller']['calificacion_id'] = $calificacion['Calificacion']['id'];
				if($this -> Artesano -> Calificacion -> Taller -> save($taller)) {
					$taller['Taller']['id'] = $this -> request -> data['Taller']['id'] = $this -> Artesano -> Calificacion -> Taller -> id;
					
					// Guardar Equipos De Trabajo
					$equipos_de_trabajo = array();
					$equipos_de_trabajo['EquiposDeTrabajo'] = $this -> request -> data['EquiposDeTrabajo'];
					foreach($equipos_de_trabajo['EquiposDeTrabajo'] as $key => $values) {
						$equipos_de_trabajo['EquiposDeTrabajo'][$key]['taller_id'] = $this -> request -> data['EquiposDeTrabajo'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach($equipos_de_trabajo['EquiposDeTrabajo'] as $key => $values) {
						$tmp = array();
						$tmp['EquiposDeTrabajo'] = $values;
						if(!empty($tmp['EquiposDeTrabajo']['equ_cantidad']) && !empty($tmp['EquiposDeTrabajo']['equ_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> create();
							$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> save($tmp);
						}
					}
					
					// Materias Primas
					$materias_primas = array();
					$materias_primas['MateriasPrima'] = $this -> request -> data['MateriasPrima'];
					foreach($materias_primas['MateriasPrima'] as $key => $values) {
						$materias_primas['MateriasPrima'][$key]['taller_id'] = $this -> request -> data['MateriasPrima'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach($materias_primas['MateriasPrima'] as $key => $values) {
						$tmp = array();
						$tmp['MateriasPrima'] = $values;
						if(!empty($tmp['MateriasPrima']['mat_cantidad']) && !empty($tmp['MateriasPrima']['mat_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> create();
							$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> save($tmp);
						}
					}
					
					// Productos Elaborados
					$productos_elaborados = array();
					$productos_elaborados['ProductosElaborado'] = $this -> request -> data['ProductosElaborado'];
					foreach($productos_elaborados['ProductosElaborado'] as $key => $values) {
						$productos_elaborados['ProductosElaborado'][$key]['taller_id'] = $this -> request -> data['ProductosElaborado'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach($productos_elaborados['ProductosElaborado'] as $key => $values) {
						$tmp = array();
						$tmp['ProductosElaborado'] = $values;
						if(!empty($tmp['ProductosElaborado']['pro_cantidad']) && !empty($tmp['ProductosElaborado']['pro_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> create();
							$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> save($tmp);
						}
					}
					
					// Guardar Trabajadores
					$trabajadores = array();
					$trabajadores['Trabajador'] = $this -> request -> data['Trabajador'];		
					$this -> loadModel('Trabajador');
					foreach($trabajadores['Trabajador'] as $key => $values) {
						// Verificar que no existe el trabajador ya
						$trabajador_existente = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('first', array('conditions' => array('Trabajador.tra_cedula'=>$values['tra_cedula'])));
						if(!empty($trabajador_existente)) {
							$tmp = array();
							$tmp['TalleresTrabajador'] = array();
							$tmp['TalleresTrabajador']['trabajador_id'] = $trabajador_existente['Trabajador']['id'];
							$tmp['TalleresTrabajador']['taller_id'] = $taller['Taller']['id'];
							$tmp['TalleresTrabajador']['tipos_de_trabajador_id'] = $values['tipos_de_trabajador_id']; 
							$tmp['TalleresTrabajador']['tal_fecha_ingreso'] = $values['tra_fecha_ingreso']; 
							$tmp['TalleresTrabajador']['tal_pago_mensual'] = $values['tra_pago_mensual'];
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> create();
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> save($tmp);
						} else {
							$tmp = array();
							$tmp['Trabajador'] = $values;
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> create();
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> save($tmp);
							// Guardar la relación del trabajador con el taller
							$tmp = array();
							$tmp['TalleresTrabajador'] = array();
							$tmp['TalleresTrabajador']['trabajador_id'] = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> id;
							$tmp['TalleresTrabajador']['taller_id'] = $taller['Taller']['id'];
							$tmp['TalleresTrabajador']['tipos_de_trabajador_id'] = $values['tipos_de_trabajador_id']; 
							$tmp['TalleresTrabajador']['tal_fecha_ingreso'] = $values['tra_fecha_ingreso']; 
							$tmp['TalleresTrabajador']['tal_pago_mensual'] = $values['tra_pago_mensual'];
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> create();
							$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> save($tmp);
						}
					}
					 
				} else {
					$this -> Session -> setFlash(__('Ha ocurrido un error al registrar el taller del artesano. Por favor, intente de nuevo.'), 'crud/error');
				}
				
				// Guardar el local en caso que haya
				if(isset($this -> request -> data['Local'])) {
					$this -> Artesano -> Calificacion -> Local -> create();
					$local = array();
					$local['Local'] = $this -> request -> data['Local'];
					$local['Local']['calificacion_id'] = $this -> request -> data['Local']['calificacion_id'] = $calificacion['Calificacion']['id'];
					if($this -> Artesano -> Calificacion -> Local -> save($local)) {
						// TODO : Por si se debe hacer algo en este caso
					} else {
						$this -> Session -> setFlash(__('Ha ocurrido un error al registrar el local del artesano. Por favor, intente de nuevo.'), 'crud/error');
					}
				} else {
					// TODO : Por si se debe hacer algo en este caso
				}
			} else {
				$this -> Session -> setFlash(__('Ha ocurrido un error al registrar la calificación del artesano. Por favor, intente de nuevo.'), 'crud/error');
			}
			// Asignar inspector a la calificacion
			$this -> asignarInspector($calificacion['Calificacion']['id']);
			$this -> redirect(array('controller' => 'calificaciones', 'action' => 'view', $calificacion['Calificacion']['id']));
			
		} else {
			// TODO : Por definir
		}
	}
	
	public function add() {
		$this -> Artesano -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			/**
			 * - Asignar inspectores y fecha de inspección
			 */
			foreach ($this -> request -> data['MateriasPrima'] as $key => $value) {
				if (!$value['mat_cantidad'] || !$value['mat_tipo_de_materia_prima'] || !$value['mat_procedencia'] || !$value['mat_valor_comercial']) {
					unset($this -> request -> data['MateriasPrima'][$key]);
				}
			}
			foreach ($this -> request -> data['EquiposDeTrabajo'] as $key => $value) {
				if (!$value['equ_cantidad'] || !$value['equ_maquinaria_y_herramientas'] || !$value['equ_tipo_de_adquisicion'] || !$value['equ_fecha_de_adquisicion'] || !$value['equ_valor_comercial']) {
					unset($this -> request -> data['EquiposDeTrabajo'][$key]);
				}
			}
			foreach ($this -> request -> data['ProductosElaborado'] as $key => $value) {
				if (!$value['pro_cantidad'] || !$value['pro_detalle'] || !$value['pro_procedencia'] || !$value['pro_valor_comercial']) {
					unset($this -> request -> data['ProductosElaborado'][$key]);
				}
			}
			foreach ($this -> request -> data['Trabajador'] as $key => $value) {
				if (!$value['tra_cedula'] || !$value['tra_nombres_y_apellidos'] || !$value['tra_pago_mensual'] || !$value['tra_sexo']) {
					unset($this -> request -> data['Trabajador'][$key]);
				}
			}
			if (!$this -> request -> data['Local']['loc_email']) {
				unset($this -> request -> data['Local']);
			}
			
			// debug($this -> request -> data);
			
			/**
			 * Verificar si el artesano ya esta o no registrado para decidir si es o no recalificación
			 */
			
			$artesano = $this -> Artesano -> find('first', array('conditions' => array('Artesano.art_cedula' => $this -> request -> data['Artesano']['art_cedula']), 'recursive' => -1));
			
			if(!empty($artesano))
			// Existe el artesano, es una recalificación
			{ 
				// Poner como deshabilitadas las calificaciones previas
				$calificaciones = $this -> Artesano -> Calificacion -> find('all', array('conditions' => array('Calificacion.cal_estado >=' => 0, 'Calificacion.artesano_id' => $artesano['Artesano']['id']), 'recursive' => -1));
				foreach($calificaciones as $key => $calificacion) {
					$calificacion['Calificacion']['cal_estado'] = -2;
					$this -> Artesano -> Calificacion -> save($calificacion);
				}
				
				// Crear una nueva calificacion con los datos enviados
				$this -> crearCalificacion($this -> request -> data, $artesano);
			}
			else
			// No existe el artesano, se está calificando por primera vez
			{
				// Guardar el artesano
				$this -> Artesano -> create();
				$artesano = array();
				$artesano['Artesano'] = $this -> request -> data['Artesano'];
				if ($this -> Artesano -> save($artesano)) {
					$artesano['Artesano']['id'] = $this -> request -> data['Artesano']['id'] = $this -> Artesano -> id;
					$this -> crearCalificacion($this -> request -> data, $artesano);
					
				} else {
					$this -> Session -> setFlash(__('Ha ocurrido un error al registrar el artesano. Por favor, intente de nuevo.'), 'crud/error');
				}
			}

		}
		/**
		 * Obtener los valores de los parametros
		 * 1	Nacionalidades
		 * 2	Tipos de sangre
		 * 3	Estados Civiles
		 * 4	Grados De Estudio
		 * 5	Sexos
		 * 6	Tipos De Discapacidad
		 * 7	Maquinarias Y Herramientas
		 * 8	Tipo De Adquisición (Maquinaria)
		 * 9	Tipo De Materia Prima
		 * 10	Procedencia (Materia Prima)
		 * 11	Detalle (Producto)
		 * 12	Procedencia (Producto)
		 */

		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$maquinarias_y_herramientas = $this -> Artesano -> getValores(7);
		$tipos_de_adquisicion_maquinaria = $this -> Artesano -> getValores(8);
		$tipos_de_materia_prima = $this -> Artesano -> getValores(9);
		$procedencias_materia_prima = $this -> Artesano -> getValores(10);
		$detalles_producto = $this -> Artesano -> getValores(11);
		$procedencias_producto = $this -> Artesano -> getValores(12);
		$tipos_de_calificacion = $this -> Artesano -> Calificacion -> TiposDeCalificacion -> find('list');
		$grupos_de_ramas = $this -> Artesano -> Calificacion -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad', 'maquinarias_y_herramientas', 'tipos_de_adquisicion_maquinaria', 'tipos_de_materia_prima', 'procedencias_materia_prima', 'detalles_producto', 'procedencias_producto', 'grupos_de_ramas', 'tipos_de_calificacion'));
		/**
		 * Provincias y demas
		 */
		$provincias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		$cantones = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> find('list');
		$ciudades = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> find('list');
		$sectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> find('list');
		$parroquias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> Parroquia -> find('list');
		$this -> set(compact('provincias', 'cantones', 'ciudades', 'sectores', 'parroquias'));
	}
	
	/**
	 * Manejo de asignación de inspector a la última calificación creada
	 */
	private function asignarInspector($calificacion_id = null) {
		$this -> autoRender = false;
		if($calificacion_id) {
			// Obtener la calificacion
			$this -> Artesano -> Calificacion -> recursive = -1;
			$calificacion = $this -> Artesano -> Calificacion -> read(null, $calificacion_id);
			
			// Obtener el taller
			$this -> Artesano -> Calificacion -> Taller -> recursive = -1;
			$taller = $this -> Artesano -> Calificacion -> Taller -> find('first', array('conditions' => array('Taller.calificacion_id' => $calificacion_id)));
			
			// Obtener los inspectores del taller
			$this -> Artesano -> Calificacion -> InspectorTaller -> recursive = -1;
			$inspectores_taller = $this -> Artesano -> Calificacion -> InspectorTaller -> find('all', array('conditions' => array('InspectorTaller.rol_id' => 3, 'InspectorTaller.sector_id' => $taller['Taller']['sector_id'])));
			
			if($inspectores_taller) {
				$fecha_calificacion = explode(' ', $calificacion['Calificacion']['created']);
				$fecha_calificacion = $fecha_calificacion[0];
				$dias_sumados = 1;
				$fecha_inspeccion_taller = strtotime("+$dias_sumados day", strtotime($fecha_calificacion));
				$fecha_inspeccion_taller = date('Y-m-d', $fecha_inspeccion_taller);
				
				while(!$this -> requestAction('/feriados/esFechaValida/'.$fecha_inspeccion_taller)) {
					$dias_sumados += 1;
					$fecha_inspeccion_taller = strtotime("+$dias_sumados day", strtotime($fecha_calificacion));
					$fecha_inspeccion_taller = date('Y-m-d', $fecha_inspeccion_taller);
				}
				
				$inspector_asignado = false;
				while (!$inspector_asignado) {
					foreach ($inspectores_taller as $key => $value) {
						$inspecciones_inspector_fecha_propuesta = 0;
						$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find(
							'count',
							array(
								'conditions' => array(
									'Calificacion.cal_inspector_taller' => $value['InspectorTaller']['id'],
									'Calificacion.cal_fecha_inspeccion_taller' => $fecha_inspeccion_taller
								)
							)
						);
						$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find(
							'count',
							array(
								'conditions' => array(
									'Calificacion.cal_inspector_local' => $value['InspectorTaller']['id'],
									'Calificacion.cal_fecha_inspeccion_local' => $fecha_inspeccion_taller
								)
							)
						);
						if($inspecciones_inspector_fecha_propuesta < $value['InspectorTaller']['usu_inspecciones_por_dia']) {
							// Asignar el inspector
							$calificacion['Calificacion']['cal_inspector_taller'] = $value['InspectorTaller']['id'];
							$calificacion['Calificacion']['cal_fecha_inspeccion_taller'] = $fecha_inspeccion_taller;
							if($this -> Artesano -> Calificacion -> save($calificacion)) {
								$inspector_asignado = true;
								break;
							}
						} else {
							// TODO : Algo por hacer si no se puede
						}
					}
					if(!$inspector_asignado) {
						$fecha_inspeccion_taller = strtotime('+1 day', strtotime($fecha_inspeccion_taller));
						$fecha_inspeccion_taller = date('Y-m-d', $fecha_inspeccion_taller);
					}
				}
			} else {
				// No hay inspectores para el sector del taller
				return;
			}
			
			// Obtener el local
			$this -> Artesano -> Calificacion -> Local -> recursive = -1;
			$local = $this -> Artesano -> Calificacion -> Local -> find('first', array('conditions' => array('Local.calificacion_id' => $calificacion_id)));
			
			/**
			 * Si hay local registrado asignar inspección
			 */
			if($local) {
				// Obtener los inspectores del local
				$this -> Artesano -> Calificacion -> InspectorLocal -> recursive = -1;
				$inspectores_local = $this -> Artesano -> Calificacion -> InspectorLocal -> find('all', array('conditions' => array('InspectorLocal.rol_id' => 3, 'InspectorLocal.sector_id' => $local['Local']['sector_id'])));
				
				if($inspectores_local) {
					$fecha_calificacion = explode(' ', $calificacion['Calificacion']['created']);
					$fecha_calificacion = $fecha_calificacion[0];
					$fecha_inspeccion_local = strtotime('+1 day', strtotime($fecha_calificacion));
					$fecha_inspeccion_local = date('Y-m-d', $fecha_inspeccion_local);
					
					$inspector_asignado = false;
					while (!$inspector_asignado) {
						foreach ($inspectores_local as $key => $value) {
							$inspecciones_inspector_fecha_propuesta = 0;
							$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find(
								'count',
								array(
									'conditions' => array(
										'Calificacion.cal_inspector_taller' => $value['InspectorLocal']['id'],
										'Calificacion.cal_fecha_inspeccion_taller' => $fecha_inspeccion_local
									)
								)
							);
							$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find(
								'count',
								array(
									'conditions' => array(
										'Calificacion.cal_inspector_local' => $value['InspectorLocal']['id'],
										'Calificacion.cal_fecha_inspeccion_local' => $fecha_inspeccion_local
									)
								)
							);
							if($inspecciones_inspector_fecha_propuesta < $value['InspectorLocal']['usu_inspecciones_por_dia']) {
								// Asignar el inspector
								$calificacion['Calificacion']['cal_inspector_local'] = $value['InspectorLocal']['id'];
								$calificacion['Calificacion']['cal_fecha_inspeccion_local'] = $fecha_inspeccion_local;
								if($this -> Artesano -> Calificacion -> save($calificacion)) {
									$inspector_asignado = true;
									break;
								}
							} else {
								// TODO : Algo por hacer si no se puede
							}
						}
						if(!$inspector_asignado) {
							$fecha_inspeccion_local = strtotime('+1 day', strtotime($fecha_inspeccion_local));
							$fecha_inspeccion_local = date('Y-m-d', $fecha_inspeccion_local);
						}
					}
				}				
			} else {
				// No hay local
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Artesano -> currentUsrId = $this -> Auth -> user('id');
		$this -> Artesano -> id = $id;
		if (!$this -> Artesano -> exists()) {
			throw new NotFoundException(__('Invalid artesano'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Artesano -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The artesano has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The artesano could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Artesano -> read(null, $id);
		}
	}

	function validarCalificacion() {
		$this -> layout = "ajax";
		$cedula = trim($_POST['cedula']);
		$rama_id = $_POST['rama'];
		$tipo_de_calificacion = $_POST['tipoDeCalificacion'];

		// Verificar sí el artesano está o no registrado actualmente
		$artesano = $this -> Artesano -> find('first', array('conditions' => array('Artesano.art_cedula' => $cedula)));
		$calificaciones = $this -> Artesano -> Calificacion -> find('all', array('conditions' => array('Calificacion.artesano_id' => $artesano['Artesano']['id']), 'order' => array('Calificacion.created' => 'DESC', // Ordenar por creacion, última primero
		'Calificacion.cal_estado' => 'DESC' // Ordenar por activo, activo primero
		)));

		/**
		 * Validaciones del registro
		 */
		if ($tipo_de_calificacion == 1) {
			$this -> validarCalificacionNormal($artesano, $calificaciones, $rama_id);
		} elseif ($tipo_de_calificacion == 2) {
			$this -> validarCalificacionAutonomo($artesano, $calificaciones, $rama_id);
		}
		exit(0);
	}

	/**
	 * Tipo De Calificacion Normal :: 1
	 */
	private function validarCalificacionNormal($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$this -> Artesano -> Calificacion -> recursive = 2;
		if(!empty($calificaciones)) {
			$resultado_validacion['Datos'] = $this -> Artesano -> Calificacion -> read(null, $calificaciones[0]['Calificacion']['id']);
		}
		$resultado_validacion['Calificar'] = 0;

		/**
		 * ¿Hay un artesano registrado?
		 */
		if (!empty($artesano)) {// Si
			/**
			 * Verificar si tiene calificación previa
			 */
			if (!empty($calificaciones)) {// Si
				/**
				 * Obtener las fechas relacionadas con la última calificación creada
				 */
				$fecha_expiracion = explode(' ', $calificaciones[0]['Calificacion']['cal_fecha_expiracion']);
				$resultado_validacion['InfoFecha'] = $this -> validarCalificacionObtenerFechas($fecha_expiracion[0]);

				/**
				 * Verificar si la calificación más reciente esta activa o no
				 */
				if ($this -> isCalificacionActive($calificaciones[0])) {// Si
					/**
					 * La más reciente calificación esta como activa, ver si es de la misma rama
					 */
					if ($calificaciones[0]['Calificacion']['rama_id'] == $rama_id) {// Si
						/**
						 * ---------------------------------------------------------------------------------------------------
						 *
						 * Se puede dar:
						 * 1. Autónomo -> Normal (calificación)
						 * 2. Normal -> Normal (recalificación)
						 *
						 * ---------------------------------------------------------------------------------------------------
						 */
						if ($calificaciones[0]['Calificacion']['tipos_de_calificacion_id'] == 1) {// Calificación previa tipo Normal
							/**
							 * Se está haciendo una recalificación
							 */
							$resultado_validacion['Calificacion'] = 1;
						} elseif ($calificaciones[0]['Calificacion']['tipos_de_calificacion_id'] == 2) {// Calificación previa tipo Autónomo
							/**
							 * Se esta calificando como normal por primera vez
							 */
							$resultado_validacion['Calificacion'] = 1;
						} else {// Error
							$resultado_validacion['Mensaje'] = 'Tipo de calificación erronea';
						}
						/**
						 * ---------------------------------------------------------------------------------------------------
						 */
					} else {// No
						$resultado_validacion['Mensaje'] = 'La rama seleccionada no concuerda con la más reciente calificación';
					}
				} else {// No
					$resultado_validacion['Mensaje'] = 'No hay registros de calificaciones activas para este artesano';
				}
			} else {// No
				$resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano como artesano autónomo';
			}
		} else {// No
			$resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano artesano';
		}

		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}

		/**
		 * Si se permite hacer la calificación validar si se esta o no dentro del rango permitido
		 * No permitir si se está antes de tiempo
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Antes']) && $resultado_validacion['InfoFecha']['Antes']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
			$resultado_validacion['Calificar'] = 0;
		}

		// Hacer echo del resulado
		echo json_encode($resultado_validacion);
	}

	/**
	 * Tipo De Calificacion Autónomo :: 2
	 */
	private function validarCalificacionAutonomo($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$this -> Artesano -> Calificacion -> recursive = 2;
		if(!empty($calificaciones)) {
			$resultado_validacion['Datos'] = $this -> Artesano -> Calificacion -> read(null, $calificaciones[0]['Calificacion']['id']);
		}
		$resultado_validacion['Calificar'] = 0;

		/**
		 * ¿Hay un artesano registrado?
		 */
		if (!empty($artesano)) {// Si
			/**
			 * Como el artesano existe, verificar si ya tiene calificaciones previas.
			 * ¿Tiene calificaciones previas?
			 */
			if (!empty($calificaciones)) {// Si
				/**
				 * Obtener las fechas relacionadas con la última calificación creada
				 */
				$fecha_expiracion = explode(' ', $calificaciones[0]['Calificacion']['cal_fecha_expiracion']);
				$resultado_validacion['InfoFecha'] = $this -> validarCalificacionObtenerFechas($fecha_expiracion[0]);

				/**
				 * Se tienen calificaciones previas. Revisar si ya esta como artesano normal o no.
				 */
				$existe_calificacion_como_artesano_normal = false;
				foreach ($calificaciones as $key => $calificacion) {
					if ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 1) {
						$existe_calificacion_como_artesano_normal = true;
						break;
					}
				}
				/**
				 * ¿Es un artesano normal?
				 */
				if ($existe_calificacion_como_artesano_normal) {// Si
					$resultado_validacion['Mensaje'] = 'Este artesano ya esta calificado como artesano normal';
				} else {// No
					/**
					 * Verificar si hay calificaciones previas con la misma rama
					 */
					$existe_calificacion_en_la_misma_rama = false;
					foreach ($calificaciones as $key => $calificacion) {
						if ($calificacion['Calificacion']['rama_id'] == $rama_id) {
							$existe_calificacion_en_la_misma_rama = true;
							break;
						}
					}
					/**
					 * ¿Hay calificaciones de la misma rama?
					 */
					if ($existe_calificacion_en_la_misma_rama) {// Si
						$resultado_validacion['Mensaje'] = 'Este artesano ya se ha registrado con la rama seleccionada';
					} else {// No
						$resultado_validacion['Calificar'] = 1;
					}
				}
			} else {// No
				$resultado_validacion['Calificar'] = 1;
			}
		} else {// No
			$resultado_validacion['Calificar'] = 1;
		}

		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}

		// Hacer echo del resultado
		echo json_encode($resultado_validacion);
	}

	private function validarCalificacionObtenerFechas($fecha_expiracion) {
				
		$fechas = array();
		$fecha_rango_menor_registro = strtotime('-1 week', strtotime($fecha_expiracion));
		$fecha_rango_menor_registro = date('Y-m-d', $fecha_rango_menor_registro);
		$fechas['RangoRegistroInicio'] = $fecha_rango_menor_registro;
		$fechas['RangoRegistroFin'] = date('Y-m-d', strtotime($fecha_expiracion));
		
		$fecha_rango_menor_registro = new DateTime($fecha_rango_menor_registro);
		$fecha_expiracion = new DateTime($fecha_expiracion);
		$fecha_actual = new DateTime('now');
		
		$fechas['FechaActual'] = $fecha_actual -> format('Y-m-d');
		$fechas['Multa'] = 0;

		if (($fecha_actual >= $fecha_rango_menor_registro) && ($fecha_actual <= $fecha_expiracion)) {
			$fechas['EnRango'] = 1;
			$fechas['Mensaje'] = 'Entre las fechas de registro';
		} else {
			$fechas['EnRango'] = 0;
			if ($fecha_rango_menor_registro >= $fecha_actual) {
				$fechas['Mensaje'] = 'Esta tratando de hacer un registro antes de que se cumpla el tiempo de la calificación actual';
				$fechas['Antes'] = 1;
			} else {
				$fechas['Despues'] = 1;
				$fechas['Mensaje'] = 'Se ha pasado la fecha limite de registro';
				$fechas['Multa'] = 1;
			}
		}

		return $fechas;
	}

	private function isCalificacionActive($calificacion = null) {
		if ($calificacion && $calificacion['Calificacion']['cal_estado'] == 1) {
			return true;
		} else {
			return false;
		}
	}

}
