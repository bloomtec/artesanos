<?php
App::uses('AppController', 'Controller');
/**
 * Artesanos Controller
 *
 * @property Artesano $Artesano
 */
class ArtesanosController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('add', 'agregarArtesano', 'datosCalificacion', 'verificarCedula', 'getID', 'validarCalificacion', 'setMultaPagada', 'getDatosPersonales');
	}
	
	/**
	 * Pruebas
	 * @return void
	 */
	function pruebas() {
		$this -> layout = "pdf";
	}
	
	/**
	 * Verificar cédula
	 * @param string $cedula Cédula a verificar
	 * @return true o false si se encuentra registrada la cédula
	 */
	public function verificarCedula($cedula = null) {
		$this -> layout = 'ajax';
		if ($cedula) {
			if ($this -> Artesano -> find('count', array('conditions' => array('Artesano.art_cedula' => $cedula))) > 0) {
				echo true;
			} else {
				echo false;
			}
		} else {
			echo false;
		}
		exit(0);
	}
	
	/**
	 * Obtener la cédula de un artesano
	 * @param int $id ID del artesano
	 * @return La cédula del artesano
	 */
	public function getID($id) {
		if ($id) {
			$artesano = $this -> Artesano -> read(null, $id);
			if (!empty($artesano)) {
				return $artesano['Artesano']['art_cedula'];
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	/**
	 * Obtener la información de un artesano
	 * @param string $documento El documento del artesano
	 * @return Arreglo codificado en JSON con la info del artesano
	 */
	public function getDatosPersonales($documento = null) {
		$this -> autoRender = false;
		if ($documento) {
			$this -> Artesano -> recursive = -1;
			$artesano = $this -> Artesano -> findByArtCedula($documento);
			if (!empty($artesano)) {
				echo json_encode($artesano);
			} else {
				return null;
			}
		} else {
			return null;
		}
		exit(0);
	}

	/**
	 * Listado de artesanos
	 *
	 * @return void
	 */
	public function index() {
		$this -> Artesano -> recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];

			$calificaciones = $this -> Artesano -> Calificacion -> DatosPersonal -> find('list', array('conditions' => array('OR' => array('DatosPersonal.dat_nombres LIKE' => "%$query%", 'DatosPersonal.dat_apellido_paterno LIKE' => "%$query%", 'DatosPersonal.dat_apellido_materno LIKE' => "%$query%", 'DatosPersonal.dat_nacionalidad LIKE' => "%$query%")), 'fields' => array('DatosPersonal.calificacion_id')));
			$artesanos = $this -> Artesano -> Calificacion -> find('list', array('conditions' => array('Calificacion.id' => $calificaciones), 'fields' => array('Calificacion.artesano_id')));
			$conditions['OR']['Artesano.id'] = $artesanos;
			$conditions['OR']['Artesano.art_cedula LIKE'] = "%$query%";
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$artesanos = $this -> paginate();
		foreach ($artesanos as $key => $artesano) {
			$calificacion = $this -> Artesano -> Calificacion -> find('first', array('recursive' => -1, 'order' => array('Calificacion.created' => 'DESC'), 'conditions' => array('Calificacion.artesano_id' => $artesano['Artesano']['id'])));
			$artesanos[$key]['Artesano']['art_estado_calificacion'] = '';
			if ($calificacion) {
				if ($calificacion['Calificacion']['cal_estado'] == 0) {
					$artesanos[$key]['Artesano']['art_estado_calificacion'] = 'Pendiente';
				} elseif ($calificacion['Calificacion']['cal_estado'] == 1) {
					$artesanos[$key]['Artesano']['art_estado_calificacion'] = 'Aprobada';
				} elseif ($calificacion['Calificacion']['cal_estado'] == -1) {
					$artesanos[$key]['Artesano']['art_estado_calificacion'] = 'Denegada';
				} elseif ($calificacion['Calificacion']['cal_estado'] == -2) {
					$artesanos[$key]['Artesano']['art_estado_calificacion'] = 'Deshabilitada';
				}
				$artesanos[$key]['Calificacion'] = $calificacion['Calificacion'];
			} else {
				$artesanos[$key]['Artesano']['art_estado_calificacion'] = 'No existe calificacion';
			}
		}

		$this -> set('artesanos', $artesanos);
	}

	/**
	 * Ver un artesano
	 *
	 * @param int $id ID del artesano
	 * @return void
	 */
	public function view($id) {
		$this -> Artesano -> id = $id;
		if (!$this -> Artesano -> exists()) {
			throw new NotFoundException(__('Artesano no válido'));
		}
		$this -> set('artesano', $this -> Artesano -> read(null, $id));
	}

	/**
	 * Guardar una calificación
	 *
	 * @param array $data Información a guardar
	 * @return void
	 */
	private function guardarCalificacion($data = null) {
		if ($data) {
			// Guardar la calificacion
			$calificacion = $this -> Artesano -> Calificacion -> read(null, $data['Calificacion']['id']);
			foreach ($data['Calificacion'] as $key => $value) {
				$calificacion['Calificacion'][$key] = $value;
			}

			/**
			 * Revisar campos del balance
			 */
			if (empty($calificacion['Calificacion']['cal_domicilio_valor']))
				$calificacion['Calificacion']['cal_domicilio_valor'] = 0;
			if (empty($calificacion['Calificacion']['cal_taller_valor']))
				$calificacion['Calificacion']['cal_taller_valor'] = 0;
			if (empty($calificacion['Calificacion']['cal_agua']))
				$calificacion['Calificacion']['cal_agua'] = 0;
			if (empty($calificacion['Calificacion']['cal_luz']))
				$calificacion['Calificacion']['cal_luz'] = 0;
			if (empty($calificacion['Calificacion']['cal_telefono']))
				$calificacion['Calificacion']['cal_telefono'] = 0;
			if (empty($calificacion['Calificacion']['cal_servicios_basicos']))
				$calificacion['Calificacion']['cal_servicios_basicos'] = 0;
			if (empty($calificacion['Calificacion']['cal_compra_de_materia_prima_mensual']))
				$calificacion['Calificacion']['cal_compra_de_materia_prima_mensual'] = 0;
			if (empty($calificacion['Calificacion']['cal_salario_operarios']))
				$calificacion['Calificacion']['cal_salario_operarios'] = 0;
			if (empty($calificacion['Calificacion']['cal_salario_aprendices']))
				$calificacion['Calificacion']['cal_salario_aprendices'] = 0;
			if (empty($calificacion['Calificacion']['cal_otros_salarios']))
				$calificacion['Calificacion']['cal_otros_salarios'] = 0;
			if (empty($calificacion['Calificacion']['cal_maquinas_y_herramientas']))
				$calificacion['Calificacion']['cal_maquinas_y_herramientas'] = 0;
			if (empty($calificacion['Calificacion']['cal_materia_prima']))
				$calificacion['Calificacion']['cal_materia_prima'] = 0;
			if (empty($calificacion['Calificacion']['cal_productos_elaborados']))
				$calificacion['Calificacion']['cal_productos_elaborados'] = 0;
			if (empty($calificacion['Calificacion']['cal_ingresos_por_ventas']))
				$calificacion['Calificacion']['cal_ingresos_por_ventas'] = 0;
			if (empty($calificacion['Calificacion']['cal_otros_ingresos']))
				$calificacion['Calificacion']['cal_otros_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_capital']))
				$calificacion['Calificacion']['cal_total_capital'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_ingresos']))
				$calificacion['Calificacion']['cal_total_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_egresos']))
				$calificacion['Calificacion']['cal_total_egresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_total_ingresos']))
				$calificacion['Calificacion']['cal_balance_total_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_total_egresos']))
				$calificacion['Calificacion']['cal_balance_total_egresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_rentabilidad_mensual']))
				$calificacion['Calificacion']['cal_balance_rentabilidad_mensual'] = 0;
			/**
			 * Fin revision campos del balance
			 */
			$this -> request -> data = $data;
			$this -> request -> data['Calificacion'] = $calificacion['Calificacion'];
			$this -> Artesano -> Calificacion -> create();
			if ($this -> Artesano -> Calificacion -> save($calificacion)) {
				// Si hay especie valorada entonces ponerla como usada
				$especieValorada = null;
				if ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 1) {
					$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $calificacion['Calificacion']['artesano_id'] . '/' . Configure::read('edi_cal_normal'));
				} elseif ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 2) {
					$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $calificacion['Calificacion']['artesano_id'] . '/' . Configure::read('edi_cal_autonomo'));
				}
				if ($especieValorada) {
					$especieValorada['EspeciesValorada']['se_uso'] = 1;
					$this -> loadModel('EspeciesValorada');
					$this -> EspeciesValorada -> save($especieValorada);
				}
				// Guardar los datos personales
				$datos_personales = array();
				$datos_personales['DatosPersonal'] = $this -> request -> data['DatosPersonal'];
				if ($this -> Artesano -> Calificacion -> DatosPersonal -> save($datos_personales)) {
					$this -> Artesano -> Calificacion -> recursive = -1;
					$lacalificacion = $this -> Artesano -> Calificacion -> read('', $calificacion['Calificacion']['id']);

					if ($lacalificacion['Calificacion']['cal_estado'] >= 0) {
						$this -> actualizarArtesano($datos_personales, $lacalificacion['Calificacion']['artesano_id']);
					}
					$this -> Session -> setFlash(__('Los datos del artesano han sido registrados.'), 'crud/success');

					// Guardar el taller
					$taller = array();
					$taller['Taller'] = $this -> request -> data['Taller'];
					$this -> Artesano -> Calificacion -> Taller -> create();
					if ($this -> Artesano -> Calificacion -> Taller -> save($taller)) {
						// Guardar Equipos De Trabajo
						$equipos_de_trabajo = array();
						$equipos_de_trabajo['EquiposDeTrabajo'] = $this -> request -> data['EquiposDeTrabajo'];

						foreach ($equipos_de_trabajo['EquiposDeTrabajo'] as $key => $values) {
							if (!isset($equipos_de_trabajo['EquiposDeTrabajo'][$key]['taller_id']) || empty($equipos_de_trabajo['EquiposDeTrabajo'][$key]['taller_id'])) {
								$equipos_de_trabajo['EquiposDeTrabajo'][$key]['taller_id'] = $taller['Taller']['id'];
							}
							$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> create();
							if (!empty($equipos_de_trabajo['EquiposDeTrabajo'][$key]['equ_cantidad']) && !empty($equipos_de_trabajo['EquiposDeTrabajo'][$key]['equ_valor_comercial'])) {
								$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> save($equipos_de_trabajo['EquiposDeTrabajo'][$key]);
							}
						}

						// Materias Primas
						$materias_primas = array();
						$materias_primas['MateriasPrima'] = $this -> request -> data['MateriasPrima'];

						foreach ($materias_primas['MateriasPrima'] as $key => $values) {
							if (!isset($materias_primas['MateriasPrima'][$key]['taller_id']) || empty($materias_primas['MateriasPrima'][$key]['taller_id'])) {
								$materias_primas['MateriasPrima'][$key]['taller_id'] = $taller['Taller']['id'];
							}
							$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> create();
							if (!empty($materias_primas['MateriasPrima'][$key]['mat_cantidad']) && !empty($materias_primas['MateriasPrima'][$key]['mat_valor_comercial'])) {
								$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> save($materias_primas['MateriasPrima'][$key]);
							}
						}

						// Productos Elaborados
						$productos_elaborados = array();
						$productos_elaborados['ProductosElaborado'] = $this -> request -> data['ProductosElaborado'];

						foreach ($productos_elaborados['ProductosElaborado'] as $key => $values) {
							if (!isset($productos_elaborados['ProductosElaborado'][$key]['taller_id']) || empty($productos_elaborados['ProductosElaborado'][$key]['taller_id'])) {
								$productos_elaborados['ProductosElaborado'][$key]['taller_id'] = $taller['Taller']['id'];
							}
							$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> create();
							if (!empty($productos_elaborados['ProductosElaborado'][$key]['pro_cantidad']) && !empty($productos_elaborados['ProductosElaborado'][$key]['pro_valor_comercial'])) {
								$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> save($productos_elaborados['ProductosElaborado'][$key]);
							}
						}

						// Guardar Trabajadores
						$trabajadores = array();
						$trabajadores['Trabajador'] = $this -> request -> data['Trabajador'];
						$this -> loadModel('Trabajador');
						foreach ($trabajadores['Trabajador'] as $key => $values) {
							// Verificar que no existe el trabajador ya
							$trabajador_existente = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('first', array('recursive' => -1, 'conditions' => array('Trabajador.tra_cedula' => $values['tra_cedula'])));
							if (!empty($trabajador_existente)) {
								$trabajador_existente['Trabajador'] = $values;
								if ($this -> Artesano -> Calificacion -> Taller -> Trabajador -> save($trabajador_existente)) {
									$tmp = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.trabajador_id' => $trabajador_existente['Trabajador']['id'], 'TalleresTrabajador.taller_id' => $taller['Taller']['id']), 'recursive' => -1));
									$tmp['TalleresTrabajador']['trabajador_id'] = $trabajador_existente['Trabajador']['id'];
									$tmp['TalleresTrabajador']['taller_id'] = $taller['Taller']['id'];
									$tmp['TalleresTrabajador']['tipos_de_trabajador_id'] = $values['tipos_de_trabajador_id'];
									$tmp['TalleresTrabajador']['tal_fecha_ingreso'] = $values['tra_fecha_ingreso'];
									$tmp['TalleresTrabajador']['tal_pago_mensual'] = $values['tra_pago_mensual'];
									$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> create();
									$this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> save($tmp);
								}
							} else {
								$tmp = array();
								$tmp['Trabajador'] = $values;
								$this -> Artesano -> Calificacion -> Taller -> Trabajador -> create();
								if ($this -> Artesano -> Calificacion -> Taller -> Trabajador -> save($tmp)) {
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
						}

					} else {
						$this -> Session -> setFlash(__('Ha ocurrido un error al registrar el taller del artesano. Por favor, intente de nuevo.'), 'crud/error');
					}

					// Guardar el local en caso que haya
					if (isset($this -> request -> data['Local'])) {
						$local = array();
						$local['Local'] = $this -> request -> data['Local'];
						if (!isset($local['Local']['calificacion_id']) || empty($local['Local']['calificacion_id'])) {
							$local['Local']['calificacion_id'] = $calificacion['Calificacion']['id'];
						}
						if (!empty($local['Local']['id']) || $local['Local']['provincia_id'] > 0) {
							$this -> Artesano -> Calificacion -> Local -> create();
							if ($this -> Artesano -> Calificacion -> Local -> save($local)) {
								// TODO : Por si se debe hacer algo en este caso
							} else {
								$this -> Session -> setFlash(__('Ha ocurrido un error al registrar el local del artesano. Por favor, intente de nuevo.'), 'crud/error');
							}
						}
					} else {
						// TODO : Por si se debe hacer algo en este caso
					}

				} else {
					$this -> Session -> setFlash(__('Ha ocurrido un error al registrar los datos personales del artesano. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash(__('Ha ocurrido un error al registrar la calificación del artesano. Por favor, intente de nuevo.'), 'crud/error');
			}
			// Asignar inspector a la calificacion (si quien modifica no es el inspector!)
			if ($this -> Auth -> user('rol_id') != 3) {
				$this -> asignarInspector($calificacion['Calificacion']['id']);
			}
			// redirigir
			$this -> redirect(array('controller' => 'calificaciones', 'action' => 'resumen', $calificacion['Calificacion']['id']));
		} else {
			// TODO : Por definir
		}
	}

	/**
	 * Actualizar la info de un artesano
	 * @param array $datosPersonales Información a guardar
	 * @param int $artesanoId ID del artesano
	 * @return void
	 */
	private function actualizarArtesano($datosPersonales, $artesanoId) {
		$artesano['Artesano']['id'] = $artesanoId;
		foreach ($datosPersonales['DatosPersonal'] as $key => $val) {
			if (strpos($key, 'dat_') === 0) {
				$artesano['Artesano'][str_replace('dat_', 'art_', $key)] = $val;
			}
		}
		//debug($artesano);
		$this -> Artesano -> save($artesano);
	}

	/**
	 * Crear una calificación de un artesano
	 *
	 * @param array $data Información a guardar
	 * @param array $artesano Información del artesano
	 * @return void
	 */
	private function crearCalificacion($data = null, $artesano = null) {
		if ($data && $artesano) {
			$this -> request -> data = $data;

			// Guardar la calificacion
			$this -> Artesano -> Calificacion -> create();
			$calificacion = array();
			$calificacion['Calificacion'] = $this -> request -> data['Calificacion'];
			$calificacion['Calificacion']['artesano_id'] = $this -> request -> data['Calificacion']['artesano_id'] = $artesano['Artesano']['id'];

			/**
			 * Revisar campos del balance
			 */
			if (empty($calificacion['Calificacion']['cal_domicilio_valor']))
				$calificacion['Calificacion']['cal_domicilio_valor'] = 0;
			if (empty($calificacion['Calificacion']['cal_taller_valor']))
				$calificacion['Calificacion']['cal_taller_valor'] = 0;
			if (empty($calificacion['Calificacion']['cal_agua']))
				$calificacion['Calificacion']['cal_agua'] = 0;
			if (empty($calificacion['Calificacion']['cal_luz']))
				$calificacion['Calificacion']['cal_luz'] = 0;
			if (empty($calificacion['Calificacion']['cal_telefono']))
				$calificacion['Calificacion']['cal_telefono'] = 0;
			if (empty($calificacion['Calificacion']['cal_servicios_basicos']))
				$calificacion['Calificacion']['cal_servicios_basicos'] = 0;
			if (empty($calificacion['Calificacion']['cal_compra_de_materia_prima_mensual']))
				$calificacion['Calificacion']['cal_compra_de_materia_prima_mensual'] = 0;
			if (empty($calificacion['Calificacion']['cal_salario_operarios']))
				$calificacion['Calificacion']['cal_salario_operarios'] = 0;
			if (empty($calificacion['Calificacion']['cal_salario_aprendices']))
				$calificacion['Calificacion']['cal_salario_aprendices'] = 0;
			if (empty($calificacion['Calificacion']['cal_otros_salarios']))
				$calificacion['Calificacion']['cal_otros_salarios'] = 0;
			if (empty($calificacion['Calificacion']['cal_maquinas_y_herramientas']))
				$calificacion['Calificacion']['cal_maquinas_y_herramientas'] = 0;
			if (empty($calificacion['Calificacion']['cal_materia_prima']))
				$calificacion['Calificacion']['cal_materia_prima'] = 0;
			if (empty($calificacion['Calificacion']['cal_productos_elaborados']))
				$calificacion['Calificacion']['cal_productos_elaborados'] = 0;
			if (empty($calificacion['Calificacion']['cal_ingresos_por_ventas']))
				$calificacion['Calificacion']['cal_ingresos_por_ventas'] = 0;
			if (empty($calificacion['Calificacion']['cal_otros_ingresos']))
				$calificacion['Calificacion']['cal_otros_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_capital']))
				$calificacion['Calificacion']['cal_total_capital'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_ingresos']))
				$calificacion['Calificacion']['cal_total_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_total_egresos']))
				$calificacion['Calificacion']['cal_total_egresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_total_ingresos']))
				$calificacion['Calificacion']['cal_balance_total_ingresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_total_egresos']))
				$calificacion['Calificacion']['cal_balance_total_egresos'] = 0;
			if (empty($calificacion['Calificacion']['cal_balance_rentabilidad_mensual']))
				$calificacion['Calificacion']['cal_balance_rentabilidad_mensual'] = 0;
			/**
			 * Fin revision campos del balance
			 */

			if ($this -> Artesano -> Calificacion -> save($calificacion)) {
				$calificacion['Calificacion']['id'] = $this -> request -> data['Calificacion']['id'] = $this -> Artesano -> Calificacion -> id;

				// Guardar los datos personales
				$this -> Artesano -> Calificacion -> DatosPersonal -> create();
				$datos_personales = array();
				$datos_personales['DatosPersonal'] = $this -> request -> data['DatosPersonal'];
				$datos_personales['DatosPersonal']['calificacion_id'] = $this -> request -> data['DatosPersonal']['calificacion_id'] = $calificacion['Calificacion']['id'];
				if ($this -> Artesano -> Calificacion -> DatosPersonal -> save($datos_personales)) {
					$this -> Session -> setFlash(__('Los datos del artesano han sido registrados.'), 'crud/success');
				} else {
					$this -> Session -> setFlash(__('Ha ocurrido un error al registrar los datos personales del artesano. Por favor, intente de nuevo.'), 'crud/error');
				}

				// Guardar el taller
				$this -> Artesano -> Calificacion -> Taller -> create();
				$taller = array();
				$taller['Taller'] = $this -> request -> data['Taller'];
				$taller['Taller']['calificacion_id'] = $this -> request -> data['Taller']['calificacion_id'] = $calificacion['Calificacion']['id'];
				if ($this -> Artesano -> Calificacion -> Taller -> save($taller)) {
					$taller['Taller']['id'] = $this -> request -> data['Taller']['id'] = $this -> Artesano -> Calificacion -> Taller -> id;

					// Guardar Equipos De Trabajo
					$equipos_de_trabajo = array();
					$equipos_de_trabajo['EquiposDeTrabajo'] = $this -> request -> data['EquiposDeTrabajo'];
					foreach ($equipos_de_trabajo['EquiposDeTrabajo'] as $key => $values) {
						$equipos_de_trabajo['EquiposDeTrabajo'][$key]['taller_id'] = $this -> request -> data['EquiposDeTrabajo'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach ($equipos_de_trabajo['EquiposDeTrabajo'] as $key => $values) {
						$tmp = array();
						$tmp['EquiposDeTrabajo'] = $values;
						if (!empty($tmp['EquiposDeTrabajo']['equ_cantidad']) && !empty($tmp['EquiposDeTrabajo']['equ_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> create();
							$this -> Artesano -> Calificacion -> Taller -> EquiposDeTrabajo -> save($tmp);
						}
					}

					// Materias Primas
					$materias_primas = array();
					$materias_primas['MateriasPrima'] = $this -> request -> data['MateriasPrima'];
					foreach ($materias_primas['MateriasPrima'] as $key => $values) {
						$materias_primas['MateriasPrima'][$key]['taller_id'] = $this -> request -> data['MateriasPrima'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach ($materias_primas['MateriasPrima'] as $key => $values) {
						$tmp = array();
						$tmp['MateriasPrima'] = $values;
						if (!empty($tmp['MateriasPrima']['mat_cantidad']) && !empty($tmp['MateriasPrima']['mat_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> create();
							$this -> Artesano -> Calificacion -> Taller -> MateriasPrima -> save($tmp);
						}
					}

					// Productos Elaborados
					$productos_elaborados = array();
					$productos_elaborados['ProductosElaborado'] = $this -> request -> data['ProductosElaborado'];
					foreach ($productos_elaborados['ProductosElaborado'] as $key => $values) {
						$productos_elaborados['ProductosElaborado'][$key]['taller_id'] = $this -> request -> data['ProductosElaborado'][$key]['taller_id'] = $taller['Taller']['id'];
					}
					foreach ($productos_elaborados['ProductosElaborado'] as $key => $values) {
						$tmp = array();
						$tmp['ProductosElaborado'] = $values;
						if (!empty($tmp['ProductosElaborado']['pro_cantidad']) && !empty($tmp['ProductosElaborado']['pro_valor_comercial'])) {
							$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> create();
							$this -> Artesano -> Calificacion -> Taller -> ProductosElaborado -> save($tmp);
						}
					}

					// Guardar Trabajadores
					$trabajadores = array();
					$trabajadores['Trabajador'] = $this -> request -> data['Trabajador'];
					$this -> loadModel('Trabajador');
					foreach ($trabajadores['Trabajador'] as $key => $values) {
						// Verificar que no existe el trabajador ya
						$trabajador_existente = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('first', array('conditions' => array('Trabajador.tra_cedula' => $values['tra_cedula'])));
						if (!empty($trabajador_existente)) {
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
				if (isset($this -> request -> data['Local'])) {
					$this -> Artesano -> Calificacion -> Local -> create();
					$local = array();
					$local['Local'] = $this -> request -> data['Local'];
					$local['Local']['calificacion_id'] = $this -> request -> data['Local']['calificacion_id'] = $calificacion['Calificacion']['id'];
					if ($this -> Artesano -> Calificacion -> Local -> save($local)) {
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
			$especieValorada = null;
			if ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 1) {
				$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('cal_normal'));
			} elseif ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 2) {
				$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('cal_autonomo'));
			}
			if (!$especieValorada) {
				$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('recal'));
			}
			$especieValorada['EspeciesValorada']['se_uso'] = 1;
			$this -> loadModel('EspeciesValorada');
			$this -> EspeciesValorada -> save($especieValorada);
			$this -> redirect(array('controller' => 'calificaciones', 'action' => 'resumen', $calificacion['Calificacion']['id']));

		} else {
			// TODO : Por definir
		}
	}

	/**
	 * Formatear un valor numérico
	 * @param string $valor Valor a formatear
	 * @return El valor formateado
	 */
	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * Crear una calificación
	 * @return void
	 */
	public function add() {
		$this -> Artesano -> currentUsrId = $this -> Auth -> user('id');
		//
		if ($this -> request -> is('post')) {
			// - Asignar inspectores y fecha de inspección
			//
			foreach ($this -> request -> data['MateriasPrima'] as $key => $value) {
				if (!$value['mat_cantidad'] || !$value['mat_tipo_de_materia_prima'] || !$value['mat_procedencia'] || !$value['mat_valor_comercial']) {
					unset($this -> request -> data['MateriasPrima'][$key]);
				} else {
					$this -> request -> data['MateriasPrima'][$key]['mat_valor_comercial'] = $this -> formatearValor($this -> request -> data['MateriasPrima'][$key]['mat_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['EquiposDeTrabajo'] as $key => $value) {
				if (!$value['equ_cantidad'] || !$value['equ_maquinaria_y_herramientas'] || !$value['equ_procedencia'] || !$value['equ_fecha_de_adquisicion'] || !$value['equ_valor_comercial']) {
					unset($this -> request -> data['EquiposDeTrabajo'][$key]);
				} else {
					$this -> request -> data['EquiposDeTrabajo'][$key]['equ_valor_comercial'] = $this -> formatearValor($this -> request -> data['EquiposDeTrabajo'][$key]['equ_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['ProductosElaborado'] as $key => $value) {
				if (!$value['pro_cantidad'] || !$value['pro_detalle'] || !$value['pro_procedencia'] || !$value['pro_valor_comercial']) {
					unset($this -> request -> data['ProductosElaborado'][$key]);
				} else {
					$this -> request -> data['ProductosElaborado'][$key]['pro_valor_comercial'] = $this -> formatearValor($this -> request -> data['ProductosElaborado'][$key]['pro_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['Trabajador'] as $key => $value) {
				if (!$value['tra_cedula'] || !$value['tra_nombres_y_apellidos'] || !$value['tra_pago_mensual'] || !$value['tra_sexo']) {
					unset($this -> request -> data['Trabajador'][$key]);
				} else {
					$this -> request -> data['Trabajador'][$key]['tra_pago_mensual'] = $this -> formatearValor($this -> request -> data['Trabajador'][$key]['tra_pago_mensual']);
				}
			}
			if (!$this -> request -> data['Local']['loc_email']) {
				unset($this -> request -> data['Local']);
			}

			$this -> request -> data['Calificacion']['cal_agua'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_agua']);
			$this -> request -> data['Calificacion']['cal_luz'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_luz']);
			$this -> request -> data['Calificacion']['cal_telefono'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_telefono']);
			$this -> request -> data['Calificacion']['cal_servicios_basicos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_servicios_basicos']);
			$this -> request -> data['Calificacion']['cal_compra_de_materia_prima_mensual'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_compra_de_materia_prima_mensual']);
			$this -> request -> data['Calificacion']['cal_salario_operarios'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_salario_operarios']);
			$this -> request -> data['Calificacion']['cal_salario_aprendices'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_salario_aprendices']);
			$this -> request -> data['Calificacion']['cal_otros_salarios'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_otros_salarios']);
			$this -> request -> data['Calificacion']['cal_maquinas_y_herramientas'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_maquinas_y_herramientas']);
			$this -> request -> data['Calificacion']['cal_materia_prima'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_materia_prima']);
			$this -> request -> data['Calificacion']['cal_productos_elaborados'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_productos_elaborados']);
			$this -> request -> data['Calificacion']['cal_total_capital'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_total_capital']);
			$this -> request -> data['Calificacion']['cal_ingresos_por_ventas'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_ingresos_por_ventas']);
			$this -> request -> data['Calificacion']['cal_otros_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_otros_ingresos']);
			$this -> request -> data['Calificacion']['cal_total_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_total_ingresos']);
			$this -> request -> data['Calificacion']['cal_balance_total_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_total_ingresos']);
			$this -> request -> data['Calificacion']['cal_balance_total_egresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_total_egresos']);
			$this -> request -> data['Calificacion']['cal_balance_rentabilidad_mensual'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_rentabilidad_mensual']);

			//debug($this -> request -> data);
			//exit(0);

			//
			// Verificar si el artesano ya esta o no registrado para decidir si es o no recalificación
			//

			$artesano = $this -> Artesano -> find('first', array('conditions' => array('Artesano.art_cedula' => $this -> request -> data['Artesano']['art_cedula']), 'recursive' => -1));

			if (!empty($artesano))
			// Existe el artesano, es una recalificación
			{
				// Poner como deshabilitadas las calificaciones previas
				$calificaciones = $this -> Artesano -> Calificacion -> find('all', array('conditions' => array('Calificacion.cal_estado >=' => 0, 'Calificacion.artesano_id' => $artesano['Artesano']['id']), 'recursive' => -1));
				foreach ($calificaciones as $key => $calificacion) {
					$calificacion['Calificacion']['cal_estado'] = -2;
					$this -> Artesano -> Calificacion -> save($calificacion);
				}

				// Crear una nueva calificacion con los datos enviados
				$this -> crearCalificacion($this -> request -> data, $artesano);
			} else
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

		 * 9	Tipo De Materia Prima
		 * 10	Procedencia
		 * 11	Detalle (Producto)

		 */

		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$maquinarias_y_herramientas = $this -> Artesano -> getValores(7);
		//$tipos_de_adquisicion_maquinaria = $this -> Artesano -> getValores(8);
		$tipos_de_materia_prima = $this -> Artesano -> getValores(9);
		$procedencias = $this -> Artesano -> getValores(10);
		$detalles_producto = $this -> Artesano -> getValores(11);
		//$procedencias_producto = $this -> Artesano -> getValores(12);
		$tipos_de_calificacion = $this -> Artesano -> Calificacion -> TiposDeCalificacion -> find('list');
		$grupos_de_ramas = $this -> Artesano -> Calificacion -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad', 'maquinarias_y_herramientas', 'tipos_de_materia_prima', 'procedencias', 'detalles_producto', 'grupos_de_ramas', 'tipos_de_calificacion'));
		/**
		 * Provincias y demas
		 */
		// $provincias_con_inspectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Usuario -> find('list', array('fields' => array('Usuario.provincia_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		$provincias = array(0 => 'Seleccione...');
		// $provincias_tmp = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list', array('conditions' => array('Provincia.id' => $provincias_con_inspectores)));
		$provincias_tmp = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		foreach ($provincias_tmp as $key => $value) {
			$provincias[$key] = $value;
		}
		// $cantones = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> find('list');
		// $ciudades = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> find('list');
		// $sectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> find('list');
		// $parroquias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> Parroquia -> find('list');
		$this -> set(compact('provincias'));
	}

	/**
	 * Manejo de asignación de inspector a la última calificación creada
	 * @param int $calificacion_id ID de la calificación
	 * @return void
	 */
	private function asignarInspector($calificacion_id = null) {
		$this -> autoRender = false;
		if ($calificacion_id) {
			// Obtener la calificacion
			$this -> Artesano -> Calificacion -> recursive = -1;
			$calificacion = $this -> Artesano -> Calificacion -> read(null, $calificacion_id);
			$calificacion['Calificacion']['cal_inspector_taller'] = NULL;
			$calificacion['Calificacion']['cal_fecha_inspeccion_taller'] = NULL;
			$calificacion['Calificacion']['cal_inspector_local'] = NULL;
			$calificacion['Calificacion']['cal_fecha_inspeccion_local'] = NULL;

			// Obtener el taller
			$this -> Artesano -> Calificacion -> Taller -> recursive = -1;
			$taller = $this -> Artesano -> Calificacion -> Taller -> find('first', array('conditions' => array('Taller.calificacion_id' => $calificacion_id)));

			// Obtener los inspectores del taller
			$this -> Artesano -> Calificacion -> InspectorTaller -> recursive = -1;
			$inspectores_taller = $this -> Artesano -> Calificacion -> InspectorTaller -> find('all', array('conditions' => array('InspectorTaller.rol_id' => 3, 'InspectorTaller.sector_id' => $taller['Taller']['sector_id'])));
			$inspector_asignado = null;
			$fecha_inspeccion = null;

			if ($inspectores_taller) {
				$fecha_calificacion = explode(' ', $calificacion['Calificacion']['created']);
				$fecha_calificacion = $fecha_calificacion[0];
				$dias_sumados = 1;
				$fecha_inspeccion_taller = strtotime("+$dias_sumados day", strtotime($fecha_calificacion));
				$fecha_inspeccion_taller = date('Y-m-d', $fecha_inspeccion_taller);

				$is_inspector_asignado = false;
				while (!$is_inspector_asignado) {

					while (!$this -> requestAction('/feriados/esFechaValida/' . $fecha_inspeccion_taller)) {
						$dias_sumados += 1;
						$fecha_inspeccion_taller = strtotime("+$dias_sumados day", strtotime($fecha_calificacion));
						$fecha_inspeccion_taller = date('Y-m-d', $fecha_inspeccion_taller);
					}

					$fecha_inspeccion = $fecha_inspeccion_taller;

					foreach ($inspectores_taller as $key => $value) {
						$inspecciones_inspector_fecha_propuesta = 0;
						$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find('count', array('conditions' => array('Calificacion.cal_inspector_taller' => $value['InspectorTaller']['id'], 'Calificacion.cal_fecha_inspeccion_taller' => $fecha_inspeccion_taller)));
						$inspecciones_inspector_fecha_propuesta += $this -> Artesano -> Calificacion -> find('count', array('conditions' => array('Calificacion.cal_inspector_local' => $value['InspectorTaller']['id'], 'Calificacion.cal_fecha_inspeccion_local' => $fecha_inspeccion_taller)));
						if ($inspecciones_inspector_fecha_propuesta + 1 < $value['InspectorTaller']['usu_inspecciones_por_dia']) {
							// Asignar el inspector
							$inspector_asignado = $value;
							$calificacion['Calificacion']['cal_inspector_taller'] = $inspector_asignado['InspectorTaller']['id'];
							$calificacion['Calificacion']['cal_fecha_inspeccion_taller'] = $fecha_inspeccion_taller;
							if ($this -> Artesano -> Calificacion -> save($calificacion)) {
								$is_inspector_asignado = true;
								break;
							}
						} else {
							// TODO : Algo por hacer si no se puede
						}
					}
					if (!$is_inspector_asignado) {
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
			if ($local) {
				$inspector_asignado['InspectorLocal'] = $inspector_asignado['InspectorTaller'];
				$calificacion['Calificacion']['cal_inspector_local'] = $inspector_asignado['InspectorLocal']['id'];
				$calificacion['Calificacion']['cal_fecha_inspeccion_local'] = $fecha_inspeccion;
				$this -> Artesano -> Calificacion -> save($calificacion);
			} else {
				// No hay local
			}
		}
	}

	/**
	 * Modificar un artesano
	 *
	 * @param int $id ID del artesano
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Artesano -> currentUsrId = $this -> Auth -> user('id');
		$this -> Artesano -> id = $id;
		if (!$this -> Artesano -> exists()) {
			throw new NotFoundException(__('Artesano no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Artesano -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el artesano'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el artesano. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Artesano -> read(null, $id);
		}
	}
	
	/**
	 * Modificar una calificación
	 * @param int $calificacionId ID de la calificación
	 * @return void
	 */
	function modificarCalificacion($calificacionId = null) {
		$calificacion = null;
		if ($calificacionId && $calificacion = $this -> Artesano -> Calificacion -> read(null, $calificacionId)) {
			$tipo_especie = null;
			if ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 1) {
				// normal
				$tipo_especie = Configure::read('edi_cal_normal');
			} else {
				// autonomo
				$tipo_especie = Configure::read('edi_cal_autonomo');
			}
			$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $calificacion['Calificacion']['artesano_id'] . '/' . $tipo_especie);
			$detener = false;
			if (!($calificacion['Calificacion']['cal_estado'] >= 1) || !(!($calificacion['Calificacion']['cal_estado'] == 0) && !(!$especieValorada || $especieValorada['EspeciesValorada']['se_uso']))) {
				if ($calificacion['Calificacion']['cal_estado'] < 0) {
					$this -> Session -> setFlash('Esta calificación esta deshabilitada o negada');
					$detener = true;
				} elseif (!(!($calificacion['Calificacion']['cal_estado'] == 0) && !(!$especieValorada || $especieValorada['EspeciesValorada']['se_uso']))) {
					if (!$calificacion['Calificacion']['cal_estado'] == 0) {
						$this -> Session -> setFlash('La calificación ya no esta pendiente para calificar, verifique que se tiene la especie valorada correspondiente para modificar datos.');
						$detener = true;
					} elseif (!$especieValorada || !$especieValorada['EspeciesValorada']['se_uso']) {
						/*if($this -> Auth -> user('rol_id') != 3) {
						 $this -> Session -> setFlash('Solamente el inspector puede modificar datos en este punto (la calificación está pendiente de inspección)');
						 $detener = true;
						 }*/
					} else {
						$this -> Session -> setFlash('=/');
						$detener = true;
					}
				} else {
					$this -> Session -> setFlash('=/');
					$detener = true;
				}
			}
			if ($detener) {
				$this -> redirect($this -> referer());
			}
		}
		if ($this -> request -> is('post')) {
			foreach ($this -> request -> data['MateriasPrima'] as $key => $value) {
				if (!$value['mat_cantidad'] || !$value['mat_tipo_de_materia_prima'] || !$value['mat_procedencia'] || !$value['mat_valor_comercial']) {
					unset($this -> request -> data['MateriasPrima'][$key]);
				} else {
					$this -> request -> data['MateriasPrima'][$key]['mat_valor_comercial'] = $this -> formatearValor($this -> request -> data['MateriasPrima'][$key]['mat_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['EquiposDeTrabajo'] as $key => $value) {
				if (!$value['equ_cantidad'] || !$value['equ_maquinaria_y_herramientas'] || !$value['equ_procedencia'] || !$value['equ_fecha_de_adquisicion'] || !$value['equ_valor_comercial']) {
					unset($this -> request -> data['EquiposDeTrabajo'][$key]);
				} else {
					$this -> request -> data['EquiposDeTrabajo'][$key]['equ_valor_comercial'] = $this -> formatearValor($this -> request -> data['EquiposDeTrabajo'][$key]['equ_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['ProductosElaborado'] as $key => $value) {
				if (!$value['pro_cantidad'] || !$value['pro_detalle'] || !$value['pro_procedencia'] || !$value['pro_valor_comercial']) {
					unset($this -> request -> data['ProductosElaborado'][$key]);
				} else {
					$this -> request -> data['ProductosElaborado'][$key]['pro_valor_comercial'] = $this -> formatearValor($this -> request -> data['ProductosElaborado'][$key]['pro_valor_comercial']);
				}
			}
			foreach ($this -> request -> data['Trabajador'] as $key => $value) {
				if (!$value['tra_cedula'] || !$value['tra_nombres_y_apellidos'] || !$value['tra_pago_mensual'] || !$value['tra_sexo']) {
					unset($this -> request -> data['Trabajador'][$key]);
				} else {
					$this -> request -> data['Trabajador'][$key]['tra_pago_mensual'] = $this -> formatearValor($this -> request -> data['Trabajador'][$key]['tra_pago_mensual']);
				}
			}
			if (!$this -> request -> data['Local']['loc_email']) {
				unset($this -> request -> data['Local']);
			}

			$this -> request -> data['Calificacion']['cal_agua'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_agua']);
			$this -> request -> data['Calificacion']['cal_luz'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_luz']);
			$this -> request -> data['Calificacion']['cal_telefono'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_telefono']);
			$this -> request -> data['Calificacion']['cal_servicios_basicos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_servicios_basicos']);
			$this -> request -> data['Calificacion']['cal_compra_de_materia_prima_mensual'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_compra_de_materia_prima_mensual']);
			$this -> request -> data['Calificacion']['cal_salario_operarios'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_salario_operarios']);
			$this -> request -> data['Calificacion']['cal_salario_aprendices'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_salario_aprendices']);
			$this -> request -> data['Calificacion']['cal_otros_salarios'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_otros_salarios']);
			$this -> request -> data['Calificacion']['cal_maquinas_y_herramientas'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_maquinas_y_herramientas']);
			$this -> request -> data['Calificacion']['cal_materia_prima'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_materia_prima']);
			$this -> request -> data['Calificacion']['cal_productos_elaborados'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_productos_elaborados']);
			$this -> request -> data['Calificacion']['cal_total_capital'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_total_capital']);
			$this -> request -> data['Calificacion']['cal_ingresos_por_ventas'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_ingresos_por_ventas']);
			$this -> request -> data['Calificacion']['cal_otros_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_otros_ingresos']);
			$this -> request -> data['Calificacion']['cal_total_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_total_ingresos']);
			$this -> request -> data['Calificacion']['cal_balance_total_ingresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_total_ingresos']);
			$this -> request -> data['Calificacion']['cal_balance_total_egresos'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_total_egresos']);
			$this -> request -> data['Calificacion']['cal_balance_rentabilidad_mensual'] = $this -> formatearValor($this -> request -> data['Calificacion']['cal_balance_rentabilidad_mensual']);
			$this -> guardarCalificacion($this -> request -> data);
		}
		$this -> Artesano -> Calificacion -> Recursive = 0;
		$calificacion = $this -> Artesano -> Calificacion -> read(null, $calificacionId);
		$this -> set(compact('calificacion'));

		/**
		 * Obtener los valores de los parametros
		 * 1	Nacionalidades
		 * 2	Tipos de sangre
		 * 3	Estados Civiles
		 * 4	Grados De Estudio
		 * 5	Sexos
		 * 6	Tipos De Discapacidad
		 * 7	Maquinarias Y Herramientas

		 * 9	Tipo De Materia Prima
		 * 10	Procedencia
		 * 11	Detalle (Producto)

		 */

		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$maquinarias_y_herramientas = $this -> Artesano -> getValores(7);
		//$tipos_de_adquisicion_maquinaria = $this -> Artesano -> getValores(8);
		$tipos_de_materia_prima = $this -> Artesano -> getValores(9);
		$procedencias = $this -> Artesano -> getValores(10);
		$detalles_producto = $this -> Artesano -> getValores(11);
		//$procedencias_producto = $this -> Artesano -> getValores(12);
		$tipos_de_calificacion = $this -> Artesano -> Calificacion -> TiposDeCalificacion -> find('list');
		$grupos_de_ramas = $this -> Artesano -> Calificacion -> Rama -> GruposDeRama -> find('list');
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad', 'maquinarias_y_herramientas', 'tipos_de_materia_prima', 'procedencias', 'detalles_producto', 'grupos_de_ramas', 'tipos_de_calificacion'));
		/**
		 * Provincias y demas
		 */
		// $provincias_con_inspectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Usuario -> find('list', array('fields' => array('Usuario.provincia_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		$provincias = array(0 => 'Seleccione...');
		// $provincias_tmp = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list', array('conditions' => array('Provincia.id' => $provincias_con_inspectores)));
		$provincias_tmp = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		foreach ($provincias_tmp as $key => $value) {
			$provincias[$key] = $value;
		}
		// $cantones = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> find('list');
		// $ciudades = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> find('list');
		// $sectores = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> find('list');
		// $parroquias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> Canton -> Ciudad -> Sector -> Parroquia -> find('list');
		$this -> set(compact('provincias'));
	}

	/**
	 * Obtener la información de una calificación
	 * @param int $cal_id ID de la calificación
	 * @return Arreglo codificado en JSON con la información de la calificación
	 */
	function datosCalificacion($cal_id = null) {
		$this -> layout = "ajax";
		$this -> Artesano -> Calificacion -> recursive = 2;

		$resultado_validacion = array();
		$resultado_validacion['Datos'] = $this -> Artesano -> Calificacion -> read(null, $cal_id);
		$trabajadores = $this -> Artesano -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], ), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
		$resultado_validacion['Datos']['Taller'][0]['Trabajador'] = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $trabajadores), 'recursive' => 0));
		foreach ($resultado_validacion['Datos']['Taller'][0]['Trabajador'] as $key => $trabajador) {
			$tmp = $trabajador['Trabajador'];
			unset($resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key]['Trabajador']);

			$datos = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $tmp['id'])));
			$tmp['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
			$tmp['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
			$tmp['tipos_de_trabajador_id'] = $datos['TalleresTrabajador']['tipos_de_trabajador_id'];

			$resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key] = $tmp;
		}
		echo json_encode($resultado_validacion);
		exit(0);
	}

	/**
	 * Validar una calificación
	 *
	 * @return Arreglo codificado en JSON con información de la validación
	 */
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
	 * Validaciones correspondientes a calificaciones normales
	 * Tipo De Calificacion Normal :: 1
	 * @param array $artesano Información del artesano
	 * @param array $calificaciones Calificaciones actuales
	 * @param int $rama_id ID de la rama seleccionada
	 * @return Arreglo codificado en JSON con información de la validación
	 */
	private function validarCalificacionNormal($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$this -> Artesano -> Calificacion -> recursive = 2;
		if (!empty($calificaciones)) {
			$resultado_validacion['Datos'] = $this -> Artesano -> Calificacion -> read(null, $calificaciones[0]['Calificacion']['id']);
			$trabajadores = $this -> Artesano -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], ), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
			$resultado_validacion['Datos']['Taller'][0]['Trabajador'] = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $trabajadores), 'recursive' => 0));
			foreach ($resultado_validacion['Datos']['Taller'][0]['Trabajador'] as $key => $trabajador) {
				$tmp = $trabajador['Trabajador'];
				unset($resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key]['Trabajador']);

				$datos = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $tmp['id'])));
				$tmp['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
				$tmp['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				$tmp['tipos_de_trabajador_id'] = $datos['TalleresTrabajador']['tipos_de_trabajador_id'];

				$resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key] = $tmp;
			}
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
							$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('recal'));
							if ($especieValorada && !$especieValorada['EspeciesValorada']['se_uso']) {
								$resultado_validacion['Calificar'] = 1;
							} else {
								$resultado_validacion['Calificar'] = 0;
								$resultado_validacion['Mensaje'] = 'No se tiene la especie valorada correspondiente a recalificación';
							}
						} elseif ($calificaciones[0]['Calificacion']['tipos_de_calificacion_id'] == 2) {// Calificación previa tipo Autónomo
							/**
							 * Se esta calificando como normal por primera vez
							 */
							$titulacion = $this -> requestAction('/titulaciones/verificarTituloRamaArtesano/' . $artesano['Artesano']['id'] . '/' . $calificaciones[0]['Calificacion']['rama_id']);
							if (!empty($titulacion)) {
								$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('cal_normal'));
								if ($especieValorada && !$especieValorada['EspeciesValorada']['se_uso']) {
									$resultado_validacion['Calificar'] = 1;
								} else {
									$resultado_validacion['Calificar'] = 0;
									$resultado_validacion['Mensaje'] = 'No se tiene la especie valorada correspondiente a calificación normal';
								}
							} else {
								$resultado_validacion['Calificar'] = 0;
								$resultado_validacion['Mensaje'] = 'El artesano no tiene el titulo correspondiente para ser calificado como artesano normal';
							}
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
			} else {// No :: EDIT, a petición se deja calificar.
				$resultado_validacion['Calificar'] = 1;
				// $resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano como artesano autónomo';
			}
		} else {// No :: Edit, a petición se deja calificar
			$resultado_validacion['Calificar'] = 1;
			// $resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano para poder hacer calificación normal';
		}

		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}

		/**
		 * Si se permite hacer la calificación validar si se esta o no dentro del rango permitido
		 * No permitir si se está antes de tiempo o despues del tiempo
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Antes']) && $resultado_validacion['InfoFecha']['Antes']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
			$resultado_validacion['Calificar'] = 0;
		}

		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Despues']) && $resultado_validacion['InfoFecha']['Despues']) {
			// $resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
			// $resultado_validacion['Calificar'] = 0;
			/**
			 * Aquí se ha pasado el rango de tiempo de recalificación.
			 * Verificar si se tiene o no la especie correspondiente
			 * 11 => 11,	-- 1 - 12 meses
			 * 12 => 12,	-- 12 - 24 meses
			 * 13 => 13,	-- 24 - 36 mese
			 * 14 => 14		-- 36+ meses
			 */
			$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . $resultado_validacion['InfoFecha']['TipoEspecie']);
			/** A petición de la JNDA se desactiva esta validación
			if ($especieValorada && !$especieValorada['EspeciesValorada']['se_uso']) {
				$resultado_validacion['Mensaje'] = 'Se paso del tiempo dado para la recalificación. Se tiene la especie valorada que corresponde.';
				$resultado_validacion['Calificar'] = 1;
			} else {
				$resultado_validacion['Mensaje'] = 'Se paso del tiempo dado para la recalificación. Se debe comprar la especie valorada correspondiente';
				if ($resultado_validacion['InfoFecha']['TipoEspecie'] == 11) {
					$resultado_validacion['Mensaje'] .= ' a 1 - 12  meses';
				} elseif ($resultado_validacion['InfoFecha']['TipoEspecie'] == 12) {
					$resultado_validacion['Mensaje'] .= ' a 12 - 24  meses';
				} elseif ($resultado_validacion['InfoFecha']['TipoEspecie'] == 13) {
					$resultado_validacion['Mensaje'] .= ' a 24 - 36  meses';
				} elseif ($resultado_validacion['InfoFecha']['TipoEspecie'] == 14) {
					$resultado_validacion['Mensaje'] .= ' a 36+  meses';
				}
				$resultado_validacion['Calificar'] = 0;
			}
			 */

		}

		if (!empty($calificaciones)) {
			if ($calificaciones[0]['Calificacion']['cal_multa_pagada']) {
				$resultado_validacion['Calificar'] = 1;
				unset($resultado_validacion['Mensaje']);
			}
		}

		// Hacer echo del resulado
		echo json_encode($resultado_validacion);
	}

	/**
	 * Validaciones correspondientes a calificaciones autonomas
	 * Tipo De Calificacion Autónomo :: 2
	 * @param array $artesano Información del artesano
	 * @param array $calificaciones Calificaciones actuales
	 * @param int $rama_id ID de la rama seleccionada
	 * @return Arreglo codificado en JSON con información de la validación
	 */
	private function validarCalificacionAutonomo($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$this -> Artesano -> Calificacion -> recursive = 2;
		if (!empty($calificaciones)) {
			$resultado_validacion['Datos'] = $this -> Artesano -> Calificacion -> read(null, $calificaciones[0]['Calificacion']['id']);
			$trabajadores = $this -> Artesano -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], ), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
			$resultado_validacion['Datos']['Taller'][0]['Trabajador'] = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $trabajadores), 'recursive' => 0));
			foreach ($resultado_validacion['Datos']['Taller'][0]['Trabajador'] as $key => $trabajador) {
				$tmp = $trabajador['Trabajador'];
				unset($resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key]['Trabajador']);

				$datos = $this -> Artesano -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $resultado_validacion['Datos']['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $tmp['id'])));
				$tmp['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
				$tmp['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				$tmp['tipos_de_trabajador_id'] = $datos['TalleresTrabajador']['tipos_de_trabajador_id'];

				$resultado_validacion['Datos']['Taller'][0]['Trabajador'][$key] = $tmp;
			}
		}
		$resultado_validacion['Calificar'] = 0;
		$especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Artesano']['id'] . '/' . Configure::read('cal_autonomo'));
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
				$resultado_validacion['Artesano'] = $artesano['Artesano'];
			}
		} else {// No EXISTE EL ARTESANO SE DEBE REGISTRAR PRIMERO
			$resultado_validacion['Calificar'] = 1;
		}

		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Despues']) && $resultado_validacion['InfoFecha']['Despues']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
			$resultado_validacion['Calificar'] = 0;
		}

		if ($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}

		if (!empty($calificaciones)) {
			if ($calificaciones[0]['Calificacion']['cal_multa_pagada']) {
				$resultado_validacion['Calificar'] = 1;
				unset($resultado_validacion['Mensaje']);
			}
		}

		/* validación de especie valorada */
		/** A petición de la JNDA se desactiva esta validación
		if ($resultado_validacion['Calificar']) {
			if (!$especieValorada || $especieValorada['EspeciesValorada']['se_uso']) {
				// No se tiene la especie o esta ya esta usada
				$resultado_validacion['Calificar'] = 0;
				$resultado_validacion['Mensaje'] = 'No se tiene la especie requerida para calificar como artesano autonomo';
			}
		}*/

		// Hacer echo del resultado
		echo json_encode($resultado_validacion);
	}

	/**
	 * Verificación de fechas de expiración y demás de una calificación
	 * @param date $fecha_expiracion Fecha de expiración a validar
	 * @return Arreglo con información de la validación
	 */
	private function validarCalificacionObtenerFechas($fecha_expiracion) {

		$fechas = array();
		// Fecha de expiración menos dos meses de antelación
		$fecha_rango_menor_registro = strtotime('-2 month', strtotime($fecha_expiracion));
		$fecha_rango_menor_registro = date('Y-m-d', $fecha_rango_menor_registro);

		// Rangos para igualaciones
		$fecha_12_meses = strtotime('+12 month', strtotime($fecha_expiracion));
		$fecha_12_meses = date('Y-m-d', $fecha_12_meses);
		$fecha_12_meses = new DateTime($fecha_12_meses);
		$fecha_24_meses = strtotime('+24 month', strtotime($fecha_expiracion));
		$fecha_24_meses = date('Y-m-d', $fecha_24_meses);
		$fecha_24_meses = new DateTime($fecha_24_meses);
		$fecha_36_meses = strtotime('+36 month', strtotime($fecha_expiracion));
		$fecha_36_meses = date('Y-m-d', $fecha_36_meses);
		$fecha_36_meses = new DateTime($fecha_36_meses);

		$tmp_fecha_final = $fecha_expiracion;

		// Fecha de expiración más treinta días habiles
		for ($i = 30; $i > 0; $i -= 1) {
			do {
				$dias_sumados = 1;
				$tmp_fecha_final = strtotime("+$dias_sumados day", strtotime($tmp_fecha_final));
				$tmp_fecha_final = date('Y-m-d', $tmp_fecha_final);
			} while(!$this -> requestAction('/feriados/esFechaValida/'.$tmp_fecha_final));
		}

		$fechas['RangoRegistroInicio'] = $fecha_rango_menor_registro;
		$fechas['RangoRegistroFin'] = $tmp_fecha_final;

		$fecha_rango_menor_registro = new DateTime($fecha_rango_menor_registro);
		$tmp_fecha_final = new DateTime($tmp_fecha_final);
		$fecha_actual = new DateTime('now');

		$fechas['FechaActual'] = $fecha_actual -> format('Y-m-d');
		$fechas['Multa'] = 0;

		if (($fecha_actual >= $fecha_rango_menor_registro) && ($fecha_actual <= $tmp_fecha_final)) {
			$fechas['EnRango'] = 1;
			$fechas['Mensaje'] = 'Entre las fechas de registro';
		} else {
			$fechas['EnRango'] = 0;
			if ($fecha_rango_menor_registro >= $fecha_actual) {
				$fechas['Mensaje'] = 'Esta tratando de hacer un registro antes de estar en el rango válido de tiempo';
				$fechas['Antes'] = 1;
			} else {
				$fechas['Despues'] = 1;
				$fechas['Mensaje'] = 'Se ha pasado la fecha limite de registro y se debe revisar si se tiene la especie correspondiente';
				// Revisión de tiempo para periodos de igualación
				if ($fecha_actual < $fecha_12_meses) {
					$fechas['TipoEspecie'] = 11;
				} elseif ($fecha_actual < $fecha_24_meses) {
					$fechas['TipoEspecie'] = 12;
				} elseif ($fecha_actual < $fecha_36_meses) {
					$fechas['TipoEspecie'] = 13;
				} else {
					$fechas['TipoEspecie'] = 14;
				}
			}
		}

		return $fechas;
	}

	/**
	 * Verificar si una calificación esta activa o no
	 * @param array $calificacion Arreglo con información de la calificación
	 * @return true o false acorde acorde si está activa o no
	 */
	private function isCalificacionActive($calificacion = null) {
		if ($calificacion && $calificacion['Calificacion']['cal_estado'] == 1) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Asignar como paga una multa de una calificación
	 * @param int $cal_id ID de la calificación
	 * @return void
	 */
	public function setMultaPagada($cal_id = null) {
		$this -> layout = 'ajax';
		if ($cal_id) {
			$this -> Artesano -> Calificacion -> read(null, $cal_id);
			$this -> Artesano -> Calificacion -> set('cal_multa_pagada', 1);
			$this -> Artesano -> Calificacion -> save();
		}
		exit(0);
	}
	
	/**
	 * Agregar un artesano
	 * @return void
	 */
	public function agregarArtesano() {
		if ($this -> request -> is('post')) {
			if (isset($this -> request -> data['Artesano']['archivo'])) {
				if (!$this -> request -> data['Artesano']['archivo']['error']) {
					App::uses('File', 'Utility');
					$pathToFile = $this -> request -> data['Artesano']['archivo']['tmp_name'];
					$file = new File($pathToFile, false, 0644);
					$data = null;
					if ($file -> exists() && $file -> readable()) {
						$data = $file -> read();
					}
					$file -> close();
					$registroCreado = false;
					if ($data) {
						$data = explode(chr(10), $data);
						$tmpData = array();
						foreach ($data as $key => $value) {
							if (!empty($value))
								$tmpData[] = $value;
						}
						$data = $tmpData;
						$delimiter = ',';
						$headers = explode($delimiter, $data[0]);
						unset($data[0]);
						foreach ($data as $key => $value) {
							$datosArtesano = explode($delimiter, $value);
							$artesano = array('Artesano' => array());
							for ($i = 0; $i < count($headers); $i += 1) {
								$artesano['Artesano'][$headers[$i]] = $datosArtesano[$i];
							}
							$tmpArtesano = $this -> Artesano -> find('first', array('conditions' => array('Artesano.art_cedula' => $artesano['Artesano']['art_cedula'])));
							if (empty($tmpArtesano)) {
								$this -> Artesano -> create();
								if (!$this -> Artesano -> save($artesano)) {
									$documento = $artesano['Artesano']['art_cedula'];
									$this -> Session -> setFlash("Ocurrió un error al tratar de guardar la información del artesano con documento $documento.", 'crud/error');
									$this -> redirect(array('action' => 'index'));
								} else {
									$registroCreado = true;
								}
							}
						}
					}
					if ($registroCreado) {
						$this -> Session -> setFlash("Se registraron los artesanos.", 'crud/success');
					} else {
						$this -> Session -> setFlash("No se creó un nuevo registro.", 'crud/error');
					}
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No seleccionó archivo alguno. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Artesano -> create();
				if ($this -> Artesano -> save($this -> request -> data)) {
					$this -> Session -> setFlash(__('Se registro el nuevo artesano'), 'crud/success');
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se pudo registrar el artesano. Por favor, intente de nuevo.'), 'crud/error');
				}
			}
		}
		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$provincias = $this -> Artesano -> Provincia -> find('list');
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad', 'provincias'));
	}

	/**
	 * Función para registrar el nuevo alumno
	 * @return Mensaje en JSON con información de resultado 
	 */
	public function modalRegNuevoArtesano() {
		//print_r($this->data);
		$this -> autoRender = false;
		$this -> layout = 'ajax';
		$msj = "";
		if ($this -> request -> is('post')) {;
			$this -> Artesano -> create();
			if ($this -> Artesano -> save($this -> request -> data)) {
				$msj["msj"] = 'Se ha registrado el artesano';
				$msj["res"] = true;
			} else {
				$msj = 'No se pudo registrar el artesano. Por favor, intente de nuevo.';
				$msj["res"] = false;
			}
			echo json_encode($msj);
		}
	}
	
	/**
	 * Expedir un carnet
	 * @param int $idArtesano ID del artesano
	 * @return void
	 */
	function carnet($idArtesano = null) {
		$this -> layout = 'carnet';
		$this -> loadModel("Calificacion", true);
		$this -> Calificacion -> recursive = 0;
		$artesano = $this -> Calificacion -> find("all", array('conditions' => array("Calificacion.artesano_id" => $idArtesano)));

		$this -> loadModel("Provincia");
		$provincia = $this -> Provincia -> find("list", array("fields" => array("pro_nombre"), "conditions" => array("Provincia.id" => $artesano[0]["Artesano"]["provincia_id"])));

		if (!empty($provincia)) {
			foreach ($provincia as $pro) {
				$provincia = $pro;
			}
		} else {
			$provincia = null;
		}

		$this -> loadModel("Ciudad");
		$ciudad = $this -> Ciudad -> find("list", array("fields" => array("ciu_nombre"), "conditions" => array("Ciudad.id" => $artesano[0]["Artesano"]["ciudad_id"])));

		if (!empty($ciudad)) {
			foreach ($ciudad as $ciu) {
				$ciudad = $ciu;
			}
		} else {
			$ciudad = null;
		}

		//El carnet solo se expide a los artesanos calificados
		$idRama = $this -> Calificacion -> find("list", array("fields" => array("rama_id"), "conditions" => array("Calificacion.artesano_id" => $artesano[0]["Artesano"]["id"])));
		$profesion = $this -> Calificacion -> Rama -> find("list", array("fields" => array("ram_nombre"), "conditions" => array("Rama.id" => $idRama)));

		if (!empty($profesion)) {
			foreach ($profesion as $pro) {
				$profesion = $pro;
			}
		} else {
			$profesion = null;
		}
		$presidente = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_presidente_de_la_junta");
		$this -> set(compact('artesano', 'ciudad', 'provincia', 'presidente', 'profesion'));
	}

}
