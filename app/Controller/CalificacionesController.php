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
		//$this -> Auth -> allow('*');
	}
	
	public function reporteGraficoArtesanos() {
		
		if($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> autoRender = false;
			$this -> layout = 'default2';
				
			// Obtener las calificaciones con estado aprobado
			$calificaciones = $this -> Calificacion -> find(
				'list',
				array(
					'fields' => array('Calificacion.id'),
					'conditions' => array('Calificacion.cal_estado' => 1),
					'recursive' => -1
				)
			);
			
			// Filtrar para dejar aquellas que esten dentro del tiempo válido concebido
			foreach($calificaciones as $key => $calificacionId) {
				if(!$this -> validarEstadoCalificacion($calificacionId)) {
					unset($calificaciones[$key]);
				}
			}
			$this -> Calificacion -> Behaviors -> attach('Containable');
			$this -> Calificacion -> contain(
				'Artesano',
				'Rama',
				'TiposDeCalificacion',
				'Local',
				'Taller',
				'Taller.ProductosElaborado',
				'Taller.MateriasPrima',
				'Taller.Trabajador',
				'Taller.EquiposDeTrabajo'
			);
			
			// Acomodar las condiciones de busqueda acorde el filtro que se envió
			$conditions = array();
			$conditions['Calificacion.id'] = $calificaciones;
			
			if($this -> request -> data['Reporte']['rama_id']) $conditions['Calificacion.rama_id'] = $this -> request -> data['Reporte']['rama_id'];
			if($this -> request -> data['Reporte']['genero']) $conditions['Artesano.art_sexo'] = $this -> request -> data['Reporte']['genero'];
			if($this -> request -> data['Reporte']['provincia']) $conditions['Artesano.provincia_id'] = $this -> request -> data['Reporte']['provincia'];
			if($this -> request -> data['Reporte']['canton']) $conditions['Artesano.canton_id'] = $this -> request -> data['Reporte']['canton'];
			if($this -> request -> data['Reporte']['ciudad']) $conditions['Artesano.ciudad_id'] = $this -> request -> data['Reporte']['ciudad'];
			if($this -> request -> data['Reporte']['fecha_inicial']) {
				//$this -> request -> data['Reporte']['fecha_inicial'] = $this -> request -> data['Reporte']['fecha_inicial'] . ' 00:00:00';
				$conditions['Calificacion.cal_fecha_expedicion >='] = $this -> request -> data['Reporte']['fecha_inicial'];
			}
			if($this -> request -> data['Reporte']['fecha_final']) {
				//$this -> request -> data['Reporte']['fecha_final'] = $this -> request -> data['Reporte']['fecha_final'] . ' 23:59:99';
				$conditions['Calificacion.cal_fecha_expedicion <='] = $this -> request -> data['Reporte']['fecha_final'];
			}
			if($this -> request -> data['Reporte']['fecha_inicial'] && $this -> request -> data['Reporte']['fecha_final']) {
				if(isset($conditions['Calificacion.cal_fecha_expedicion <='])) unset($conditions['Calificacion.cal_fecha_expedicion <=']);
				if(isset($conditions['Calificacion.cal_fecha_expedicion >='])) unset($conditions['Calificacion.cal_fecha_expedicion >=']);
				$conditions['Calificacion.cal_fecha_expedicion BETWEEN ? AND ?'] = array(
					$this -> request -> data['Reporte']['fecha_inicial'],
					$this -> request -> data['Reporte']['fecha_final']
				);
			}
			
			
			// Obtener las calificaciones acorde el filtro resultante
		
			$calificaciones = $this -> Calificacion -> find('all', array('conditions' => $conditions));
			$datos = $this -> obtenerDatosCalificaciones($calificaciones);
			//debug($datos);
			
			//FORMATO JSON PARA GRAFICAR REPORTES
			$data_json 			= array();
			$ramas				= array();
			$artesanos			= array();
			$nivelInsersion 	= array();
			$promedioIngresos 	= array();
			$promediOperarios	= array();
			$promedioAprendices	= array();
			
			foreach($datos as $key => $valor) {
				foreach($valor as $key => $value){
					array_push($ramas, $key);
					array_push($artesanos, $value["Artesanos"]);
					array_push($nivelInsersion, $value["TotalInversion"]);
					array_push($promedioIngresos, $value["PromedioIngresos"]);
					array_push($promediOperarios, $value["Trabajadores"]["PromedioOperarios"]);
					array_push($promedioAprendices, $value["Trabajadores"]["PromedioAprendices"]);
				}
			}
			
			$data_json["ramas"] 				= $ramas;
			$data_json["artesanos"] 			= $artesanos;
			$data_json["TotalInversion"] 		= $nivelInsersion;
			$data_json["PromedioIngresos"] 		= $promedioIngresos;
			$data_json["PromedioOperarios"] 	= $promediOperarios;
			$data_json["PromedioAprendices"] 	= $promedioAprendices;
	
			echo json_encode($data_json);
			
		} else {
			$provincias = array('' => 'Seleccione...');
			$provincias_tmp = $this -> Calificacion -> Taller -> Provincia -> find('list');
			foreach ($provincias_tmp as $key => $value) {
				$provincias[$key] = $value;
			}
			
			$this->set(compact('reporte'));
			$this -> set('provincias', $provincias);
			$this -> set('generos', $this -> Calificacion -> getValores(5));
			$this -> set('fechaActual', date('Y-m-d', strtotime('now')));
			$this -> set('ramas', $this -> Calificacion -> Rama -> find('list'));
		}
		
	}
	
	

	private function obtenerDatosCalificaciones($calificaciones = null) {
		$datos = array(
			'Ramas' => array()
		);
		
		foreach($calificaciones as $calificacion_key => $calificacion_data) {
			// Verificar que la rama este en el arreglo de datos y si no esta crearla
			if(!isset($datos['Ramas'][$calificacion_data['Rama']['ram_nombre']])) {
				$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']] = array(
					'MateriasPrimas' => array(),
					'Artesanos' => 0,
					'TotalIngresos' => 0.0,
					'PromedioIngresos' => 0.0,
					'TotalInversion' => 0.0,
					'Trabajadores' => array(
						'TotalOperarios' => 0,
						'PromedioOperarios' => 0.0,
						'TotalAprendices' => 0,
						'PromedioAprendices' => 0.0
					)
				);
			}
			
			// Sumar la cantidad de calificados en la rama
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Artesanos'] += 1;
			
			// Sumar el total de ingresos en la rama
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['TotalIngresos'] += $calificacion_data['Calificacion']['cal_total_ingresos'];
			
			// Sacar el promedio de ingresos
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['PromedioIngresos'] = $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['TotalIngresos'] / $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Artesanos'];
			
			// Sumar la inversión en la rama
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['TotalInversion'] += $calificacion_data['Calificacion']['cal_maquinas_y_herramientas'] + $calificacion_data['Calificacion']['cal_productos_elaborados'];
			
			// Recorrer las materias primas de la calificacion y crear datos acorde sea necesario
			foreach($calificacion_data['Taller'][0]['MateriasPrima'] as $materiaPrima_key => $materiaPrima_data) {
				if(!isset($datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['MateriasPrimas'][$materiaPrima_data['mat_tipo_de_materia_prima']])) {
					$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['MateriasPrimas'][$materiaPrima_data['mat_tipo_de_materia_prima']] = 0;
				}
				$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['MateriasPrimas'][$materiaPrima_data['mat_tipo_de_materia_prima']] += $materiaPrima_data['mat_cantidad'];
			}
			
			// Recorrer los trabajadores de la calificacion y crear datos acorde sea necesario
			foreach($calificacion_data['Taller'][0]['Trabajador'] as $trabajador_key => $trabajador_data) {
				if($trabajador_data['TalleresTrabajador']['tipos_de_trabajador_id'] == 1) {
					$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['TotalOperarios'] += 1;
				} elseif($trabajador_data['TalleresTrabajador']['tipos_de_trabajador_id'] == 2) {
					$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['TotalAprendices'] += 1;
				}
			}
			
			// Sacar los promedios de trabajadores y aprendices para la rama
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['PromedioOperarios'] = $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['TotalOperarios'] / $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Artesanos'];
			$datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['PromedioAprendices'] = $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Trabajadores']['TotalAprendices'] / $datos['Ramas'][$calificacion_data['Rama']['ram_nombre']]['Artesanos'];
		}
		
		//debug($datos);
		
		return $datos;
	}
	
	private function validarEstadoCalificacion($calificacionId = null) {
		$this -> Calificacion -> recursive = -1;
		$calificacion = $this -> Calificacion -> read(null, $calificacionId);
		
		$fecha_expiracion = $calificacion['Calificacion']['cal_fecha_expiracion'];
		if($fecha_expiracion == '3000-00-00') {
			return true;
		} else {
			// Fecha de expiración más treinta días habiles
			for ($i = 30; $i > 0; $i -= 1) {
				do {
					$dias_sumados = 1;
					$fecha_expiracion = strtotime("+$dias_sumados day", strtotime($fecha_expiracion));
					$fecha_expiracion = date('Y-m-d', $fecha_expiracion);
				} while(!$this -> requestAction('/feriados/esFechaValida/'.$fecha_expiracion));
			}
	
			$fecha_expiracion = new DateTime($fecha_expiracion);
			$fecha_actual = new DateTime('now');
			if ($fecha_actual <= $fecha_expiracion) {
				return true;
			} else {
				return false;
			}
		}
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

		$inspeccion = $this -> Calificacion -> find('first', array('conditions' => array('Calificacion.id' => $cal_id)));

		$operadores = $this -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.tipos_de_trabajador_id' => 1), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
		$this -> Calificacion -> Taller -> Trabajador -> recursive = -1;
		$inspeccion['Operador'] = $this -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $operadores)));
		foreach ($inspeccion['Operador'] as $key => $operador) {
			$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $operador['Trabajador']['id'])));
			$inspeccion['Operador'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
			$inspeccion['Operador'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
		}
		$aprendices = $this -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.tipos_de_trabajador_id' => 2), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
		$inspeccion['Aprendiz'] = $this -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $aprendices)));
		foreach ($inspeccion['Aprendiz'] as $key => $aprendiz) {
			$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $aprendiz['Trabajador']['id'])));
			$inspeccion['Aprendiz'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
			$inspeccion['Aprendiz'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
		}
		$this -> Calificacion -> Taller -> EquiposDeTrabajo -> recursive = -1;
		$inspeccion['EquipoDeTrabajo'] = $this -> Calificacion -> Taller -> EquiposDeTrabajo -> find('all', array('conditions' => array('EquiposDeTrabajo.taller_id' => $inspeccion['Taller'][0]['id'])));
		$this -> Calificacion -> Taller -> MateriasPrima -> recursive = -1;
		$inspeccion['MateriaPrima'] = $this -> Calificacion -> Taller -> MateriasPrima -> find('all', array('conditions' => array('MateriasPrima.taller_id' => $inspeccion['Taller'][0]['id'])));
		$this -> Calificacion -> Taller -> ProductosElaborado -> recursive = -1;
		$inspeccion['ProductoElaborado'] = $this -> Calificacion -> Taller -> ProductosElaborado -> find('all', array('conditions' => array('ProductosElaborado.taller_id' => $inspeccion['Taller'][0]['id'])));

		$this -> set(compact('inspeccion'));
	}

	public function inspecciones() {
		$this -> Calificacion -> recursive = -1;

		$inspector_id = $this -> Auth -> user('id');

		$talleres = $this -> Calificacion -> find('all', array('conditions' => array('Calificacion.cal_inspector_taller' => $inspector_id, 'Calificacion.cal_taller_aprobado' => 0, 'Calificacion.cal_estado' => 0), 'order' => array('Calificacion.cal_fecha_inspeccion_taller' => 'ASC'), 'fields' => array('Calificacion.id', 'Calificacion.artesano_id', 'Calificacion.cal_inspector_taller', 'Calificacion.cal_fecha_inspeccion_taller', 'Calificacion.cal_comentarios_taller', 'Calificacion.cal_taller_aprobado', )));

		$locales = $this -> Calificacion -> find('all', array('conditions' => array('Calificacion.cal_inspector_local' => $inspector_id, 'Calificacion.cal_local_aprobado' => 0, 'Calificacion.cal_estado' => 0), 'order' => array('Calificacion.cal_fecha_inspeccion_local' => 'ASC'), 'fields' => array('Calificacion.id', 'Calificacion.cal_inspector_local', 'Calificacion.cal_fecha_inspeccion_local', 'Calificacion.cal_comentarios_local', 'Calificacion.cal_local_aprobado', )));

		$this -> set(compact('locales', 'talleres'));

	}

	public function resumen($cal_id = null) {
		$this -> Calificacion -> recursive = 1;

		$order = array();

		$calificacion = $this -> Calificacion -> find('first', array('conditions' => array('Calificacion.id' => $cal_id)));
		$this -> set(compact('calificacion'));
	}

	private function uploadFile($tmp_name = null, $filename = null) {
		$this -> cleanupFiles();
		if ($tmp_name && $filename) {
			$url = 'files/uploads/' . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}

	private function cleanupFiles() {
		$documentos = $this -> Calificacion -> Documento -> find('all');
		$db_files = array();
		foreach ($documentos as $key => $documento) {
			$db_files[] = $documento['Documento']['doc_path'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot/files/uploads';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if($entry != 'empty' && is_file($dir_path . DS . $entry)) $dir_files[] = 'files/uploads/' . $entry;
			}
			closedir($handle);
		}
		foreach($dir_files as $file) {
			if(!in_array($file, $db_files)) {
				$file = explode('/', $file);
				$file = $file[count($file) - 1];
				$tmp_file_path = $dir_path . DS . $file;
				unlink($tmp_file_path);
			}
		}
	}

	public function verInspeccion($cal_id = null, $tipo_inspeccion = null) {
		//$this -> layout ='print';
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data)) {// Se enviaron datos
				if ($this -> Calificacion -> save($this -> request -> data)) {// Se puede salvar los datos

					foreach ($this -> request -> data['Documentos'] as $key => $documento) {
						if (!empty($documento['name']) && !$documento['error']) {
							$now = new DateTime('now');
							$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $documento['name']);
							if ($this -> uploadFile($documento['tmp_name'], $filename)) {
								$this -> Calificacion -> Documento -> create();
								$documento = array('Documento' => array('doc_name' => $documento['name'], 'doc_path' => 'files/uploads/' . $filename, 'calificacion_id' => $this -> request -> data['Calificacion']['id'], 'doc_documento_taller' => $this -> request -> data['Documentos']['is_taller']));
								$this -> Calificacion -> Documento -> save($documento);
							}
						}
					}

					// Lógica de revisión del estado de la inspección
					// Siempre va a existir el taller, se debe verificar si hay inspección de
					// un local para proceder a poner el estado de la calificación

					//if(empty($this -> request -> data['Calificacion']['cal_']))
					$calificacion = $this -> Calificacion -> read(null, $this -> request -> data['Calificacion']['id']);
					$verificar_local = false;
					if (!empty($calificacion['Calificacion']['cal_inspector_local'])) {
						// Hay un local
						if ($calificacion['Calificacion']['cal_local_aprobado'] == -1 || $calificacion['Calificacion']['cal_taller_aprobado'] == -1) {
							// Taller o local DENEGADO
							$calificacion['Calificacion']['cal_estado'] = -1;
						} elseif ($calificacion['Calificacion']['cal_local_aprobado'] == 1 && $calificacion['Calificacion']['cal_taller_aprobado']) {
							// Taller y local APROBADOS
							$calificacion['Calificacion']['cal_estado'] = 1;
						} else {
							// Falta alguno por aprobar
							$calificacion['Calificacion']['cal_estado'] = 0;
						}
					} else {
						// No hay local
						if ($calificacion['Calificacion']['cal_taller_aprobado'] == -1) {
							// Taller DENEGADO
							$calificacion['Calificacion']['cal_estado'] = -1;
						} elseif ($calificacion['Calificacion']['cal_taller_aprobado'] == 1) {
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

					if ($calificacion['Calificacion']['cal_estado'] == 1) {
						// Acomodar la fecha a la nueva fecha de expiración
						$this -> loadModel('Configuracion');
						$configuracion = $this -> Configuracion -> read(null, 1);
						if ($calificacion['Calificacion']['tipos_de_calificacion_id'] == 2) {
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
						if ($calificaciones_validas) {
							$calificacion['Calificacion']['cal_numero_valido'] = $calificaciones_validas + 1;
						} else {
							$calificacion['Calificacion']['cal_numero_valido'] = 1;
						}
					} else {
						//$fecha_expiracion = strtotime('+1 month', strtotime($fecha_actual));
					}

					$datos_personales = $this -> Calificacion -> DatosPersonal -> find('first', array('conditions' => array('DatosPersonal.calificacion_id' => $calificacion['Calificacion']['id'])));
					$fecha_nacimiento = $datos_personales['DatosPersonal']['dat_fecha_nacimiento'];

					$birthday = new DateTime(date($fecha_nacimiento));
					$now = new DateTime('now');

					$a = array('año' => $birthday -> format('Y'), 'mes' => $birthday -> format('m'), 'día' => $birthday -> format('d'));
					$b = array('año' => $now -> format('Y'), 'mes' => $now -> format('m'), 'día' => $now -> format('d'));

					if ($b['año'] - $a['año'] < 65) {
						// No aplica
					} elseif ($b['año'] - $a['año'] == 65) {
						// Comparar meses
						if ($b['mes'] < $a['mes']) {
							// No aplica
						} elseif ($b['mes'] == $a['mes']) {
							if ($b['día'] < $a['día']) {
								// No aplica
							} else {
								$calificacion['Calificacion']['cal_fecha_expiracion'] = '3000-00-00';
							}
						} else {
							$calificacion['Calificacion']['cal_fecha_expiracion'] = '3000-00-00';
						}
					} else {
						$calificacion['Calificacion']['cal_fecha_expiracion'] = '3000-00-00';
					}

					/*$interval = $birthday -> diff($now);
					 $edad_artesano = $interval -> format('%Y');

					 if((int)$edad_artesano >= 65) {
					 $calificacion['Calificacion']['cal_fecha_expiracion'] = '3000-00-00';
					 }*/

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

			if ($tipo_inspeccion == 1) {// Taller
				$se_inspecciona = 'Taller';
				$fields = array('Calificacion.id', 'Calificacion.artesano_id', 'Calificacion.cal_inspector_taller', 'Calificacion.cal_fecha_inspeccion_taller', 'Calificacion.cal_comentarios_taller', 'Calificacion.cal_taller_aprobado');
				$order = array('Calificacion.cal_fecha_inspeccion_taller' => 'ASC');
			} elseif ($tipo_inspeccion == 2) {// Local
				$se_inspecciona = 'Local';
				$fields = array('Calificacion.id', 'Calificacion.artesano_id', 'Calificacion.cal_inspector_local', 'Calificacion.cal_fecha_inspeccion_local', 'Calificacion.cal_comentarios_local', 'Calificacion.cal_local_aprobado');
				$order = array('Calificacion.cal_fecha_inspeccion_local' => 'ASC');
			} else {
				$this -> redirect($this -> referer());
			}

			$inspeccion = $this -> Calificacion -> find('first', array('conditions' => array('Calificacion.id' => $cal_id), 'fields' => $fields, 'order' => $order));

			if ($tipo_inspeccion == 1) {// Taller
				if (isset($inspeccion['Local']))
					unset($inspeccion['Local']);
				$operadores = $this -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.tipos_de_trabajador_id' => 1), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
				$this -> Calificacion -> Taller -> Trabajador -> recursive = -1;
				$inspeccion['Operador'] = $this -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $operadores)));
				foreach ($inspeccion['Operador'] as $key => $operador) {
					$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $operador['Trabajador']['id'])));
					$inspeccion['Operador'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
					$inspeccion['Operador'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				}
				$aprendices = $this -> Calificacion -> Taller -> TalleresTrabajador -> find('list', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.tipos_de_trabajador_id' => 2), 'fields' => array('TalleresTrabajador.trabajador_id'), 'order' => array('TalleresTrabajador.trabajador_id' => 'ASC')));
				$inspeccion['Aprendiz'] = $this -> Calificacion -> Taller -> Trabajador -> find('all', array('conditions' => array('Trabajador.id' => $aprendices)));
				foreach ($inspeccion['Aprendiz'] as $key => $aprendiz) {
					$datos = $this -> Calificacion -> Taller -> Trabajador -> TalleresTrabajador -> find('first', array('conditions' => array('TalleresTrabajador.taller_id' => $inspeccion['Taller'][0]['id'], 'TalleresTrabajador.trabajador_id' => $aprendiz['Trabajador']['id'])));
					$inspeccion['Aprendiz'][$key]['Trabajador']['tra_fecha_ingreso'] = $datos['TalleresTrabajador']['tal_fecha_ingreso'];
					$inspeccion['Aprendiz'][$key]['Trabajador']['tra_pago_mensual'] = $datos['TalleresTrabajador']['tal_pago_mensual'];
				}
				$this -> Calificacion -> Taller -> EquiposDeTrabajo -> recursive = -1;
				$inspeccion['EquipoDeTrabajo'] = $this -> Calificacion -> Taller -> EquiposDeTrabajo -> find('all', array('conditions' => array('EquiposDeTrabajo.taller_id' => $inspeccion['Taller'][0]['id'])));
				$this -> Calificacion -> Taller -> MateriasPrima -> recursive = -1;
				$inspeccion['MateriaPrima'] = $this -> Calificacion -> Taller -> MateriasPrima -> find('all', array('conditions' => array('MateriasPrima.taller_id' => $inspeccion['Taller'][0]['id'])));
				$this -> Calificacion -> Taller -> ProductosElaborado -> recursive = -1;
				$inspeccion['ProductoElaborado'] = $this -> Calificacion -> Taller -> ProductosElaborado -> find('all', array('conditions' => array('ProductosElaborado.taller_id' => $inspeccion['Taller'][0]['id'])));
			} else {// Local
				if (isset($inspeccion['Taller']))
					unset($inspeccion['Taller']);
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
		foreach ($calificaciones as $key => $calificacion) {
			if ($calificacion['Calificacion']['cal_estado'] == -2) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Deshabilitada';
			} elseif ($calificacion['Calificacion']['cal_estado'] == -1) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Denegada';
			} elseif ($calificacion['Calificacion']['cal_estado'] == 0) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Pendiente';
			} elseif ($calificacion['Calificacion']['cal_estado'] == 1) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Aprobada';
			}
			$csv_export_data[$key]['Calificacion']['cal_estado'] = $calificaciones[$key]['Calificacion']['cal_estado'];
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
		foreach ($calificaciones as $key => $calificacion) {
			if ($calificacion['Calificacion']['cal_estado'] == -2) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Deshabilitada';
			} elseif ($calificacion['Calificacion']['cal_estado'] == -1) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Denegada';
			} elseif ($calificacion['Calificacion']['cal_estado'] == 0) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Pendiente';
			} elseif ($calificacion['Calificacion']['cal_estado'] == 1) {
				$calificaciones[$key]['Calificacion']['cal_estado'] = 'Aprobada';
			}
			$csv_export_data[$key]['Calificacion']['cal_estado'] = $calificaciones[$key]['Calificacion']['cal_estado'];
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
		if (!empty($calificaciones)) {
			foreach ($calificaciones as $key => $calificacion) {
				$calificaciones[$key]['Calificacion']['cal_nombre_inspector_taller'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_taller']);
				$calificaciones[$key]['Calificacion']['cal_nombre_inspector_local'] = $this -> requestAction('/usuarios/getNombresYApellidos/' . $calificacion['Calificacion']['cal_inspector_local']);
				$calificaciones[$key]['Calificacion']['cal_nombre_artesano'] = $this -> requestAction('/datos_personales/getNombreArtesano/' . $calificacion['Calificacion']['id']);
				$csv_export_data[$key]['Calificacion']['cal_nombre_inspector_taller'] = $calificaciones[$key]['Calificacion']['cal_nombre_inspector_taller'];
				$csv_export_data[$key]['Calificacion']['cal_nombre_inspector_local'] = $calificaciones[$key]['Calificacion']['cal_nombre_inspector_local'];
				$csv_export_data[$key]['Calificacion']['cal_nombre_artesano'] = $calificaciones[$key]['Calificacion']['cal_nombre_artesano'];
				if ($csv_export_data[$key]['Calificacion']['cal_estado'] == 1) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Aprobado';
				} elseif ($csv_export_data[$key]['Calificacion']['cal_estado'] == -1) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Denegado';
				} elseif ($csv_export_data[$key]['Calificacion']['cal_estado'] == -2) {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Deshabilitado';
				} else {
					$csv_export_data[$key]['Calificacion']['cal_estado'] = 'Pendiente';
				}
				if ($csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] == 1) {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Aprobado';
				} elseif ($csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] == -1) {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Denegado';
				} else {
					$csv_export_data[$key]['Calificacion']['cal_taller_aprobado'] = 'Pendiente';
				}
				if (!empty($csv_export_data[$key]['Calificacion']['cal_local_aprobado'])) {
					if ($csv_export_data[$key]['Calificacion']['cal_local_aprobado'] == 1) {
						$csv_export_data[$key]['Calificacion']['cal_local_aprobado'] = 'Aprobado';
					} elseif ($csv_export_data[$key]['Calificacion']['cal_local_aprobado'] == -1) {
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

	public function imprimir($id = null) {
		$this -> layout = 'especie_valorada';
		//$this -> layout ="pdf3";
		$inspeccion = $this -> Calificacion -> read(null, $id);
        
        $presidente = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_presidente_de_la_junta");
        $secretario = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_secretario_general");
        $directorNacTec = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_director_nacional_tecnico");
       
		$this -> set(compact('inspeccion','presidente','secretario','directorNacTec'));
	}
	
	function carnet($idCalificacion=null){
	   		
	    $this -> layout = 'carnet'; 
        $this->Calificacion->recursive=0;
        $artesano = $this->Calificacion->find("all", array('conditions'=>array("Calificacion.id"=>$idCalificacion)));
        

        if (isset($artesano[0]["Artesano"]["provincia_id"])) {
            $this -> loadModel("Provincia", true);
            $provincia = $this -> Provincia -> find("list", array("fields" => array("pro_nombre"), "conditions" => array("Provincia.id" => $artesano[0]["Artesano"]["provincia_id"])));
            if (empty($provincia)) {
                $provincia = null;
            } else {
                foreach ($provincia as $provincia) {
                    $provincia = $provincia;
                }
            }
        } else {
            $provincia = null;
        }

        if (isset($artesano[0]["Artesano"]["ciudad_id"])) {
            $this -> loadModel("Ciudad", true);
            $ciudad = $this -> Ciudad -> find("list", array("fields" => array("ciu_nombre"), "conditions" => array("Ciudad.id" => $artesano[0]["Artesano"]["ciudad_id"])));
            if (empty($ciudad)) {
                $ciudad = null;
            } else {
                foreach ($ciudad as $ciudad) {
                    $ciudad = $ciudad;
                }
            }
        } else {
            $ciudad = null;
        }
		
		
		//debug($artesano);
		$this->loadModel("SolicitudesTitulacion");
		$idSolicitudArtesano = $this->SolicitudesTitulacion->find("list", array("fields"=>array("artesano_id"),"conditions"=>array("SolicitudesTitulacion.artesano_id"=>$artesano[0]["Artesano"]["id"])));
		$this->loadModel("Titulacion");
		$idTituloEnTitulacion = $this->Titulacion->find("list",array("fields"=>array("titulo_id"), array("conditions"=>array("Titulacion.solicitudes_titulaciones_id"=>$idSolicitudArtesano))));
		$this->loadModel("Titulo");
		$titulos = $this->Titulo->find("all", array("conditions"=>array("Titulo.id"=>$idTituloEnTitulacion)));
		//debug($titulos);
		$profesion = $titulos[0]['Rama']['ram_nombre'];
        $presidente = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_presidente_de_la_junta");
        $this -> set(compact('artesano', 'ciudad', 'provincia', 'presidente','profesion'));
	}

}
