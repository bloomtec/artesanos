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
		$this -> Auth -> allow('isCalificacionActive', 'validarCalificacion', 'validarCalificacionAutonomo', 'validarCalificacionNormal', 'validarCalificacionObtenerFechas');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Artesano -> recursive = 0;
		$this -> set('artesanos', $this -> paginate());
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
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Artesano -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			/**
			 * A tener en cuenta:
			 * - Crear primero el artesano
			 * - Incluir los datos personales
			 * - Crear la calificación
			 * - Adjuntar talleres
			 * - Adjuntar locales
			 * - Adjuntar lo relacionado del taller
			 * - Asignar inspectores y fecha de inspección
			 */
			debug($this -> request -> data);
			/*
			 $this -> Artesano -> create();
			 if ($this -> Artesano -> save($this -> request -> data)) {
			 $this -> Session -> setFlash(__('The artesano has been saved'), 'crud/success');
			 $this -> redirect(array('action' => 'index'));
			 } else {
			 $this -> Session -> setFlash(__('The artesano could not be saved. Please, try again.'), 'crud/error');
			 }
			 */
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
		$calificaciones = $this -> Artesano -> Calificacion -> find(
			'all',
			array(
				'conditions' => array(
					'Calificacion.artesano_id' => $artesano['Artesano']['id']
				),
				'order' => array(
					'Calificacion.created' => 'DESC', // Ordenar por creacion, última primero
					'Calificacion.cal_estado' => 'DESC' // Ordenar por activo, activo primero
				)
			)
		);
		
		/**
		 * Validaciones del registro
		 */
		if($tipo_de_calificacion == 1) {
			$this -> validarCalificacionNormal($artesano, $calificaciones, $rama_id);
		} elseif($tipo_de_calificacion == 2) {
			$this -> validarCalificacionAutonomo($artesano, $calificaciones, $rama_id);
		}
		exit(0);
	}
	
	/**
	 * Tipo De Calificacion Normal :: 1
	 */
	private function validarCalificacionNormal($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$resultado_validacion['Datos'] = $artesano;
		$resultado_validacion['Calificar'] = 0;
		
		/**
		 * ¿Hay un artesano registrado?
		 */
		if(!empty($artesano)) { // Si
			/**
			 * Verificar si tiene calificación previa
			 */
			if(!empty($calificaciones)) { // Si
				/**
				 * Obtener las fechas relacionadas con la última calificación creada
				 */
				$fecha_expiracion = explode(' ', $calificaciones[0]['Calificacion']['cal_fecha_expiracion']);
				$resultado_validacion['InfoFecha'] = $this -> validarCalificacionObtenerFechas($fecha_expiracion[0]);
				
				/**
				 * Verificar si la calificación más reciente esta activa o no
				 */
				if($this -> isCalificacionActive($calificaciones[0])) { // Si
					/**
					 * La más reciente calificación esta como activa, ver si es de la misma rama
					 */
					if($calificaciones[0]['Calificacion']['rama_id'] == $rama_id) { // Si
						/**
						 * ---------------------------------------------------------------------------------------------------
						 * 
						 * Se puede dar:
						 * 1. Autónomo -> Normal (calificación)
						 * 2. Normal -> Normal (recalificación)
						 * 
						 * ---------------------------------------------------------------------------------------------------
						 */
						if($calificaciones[0]['Calificacion']['tipos_de_calificacion_id'] == 1) { // Calificación previa tipo Normal
							/**
							 * Se está haciendo una recalificación
							 */
							$resultado_validacion['Calificacion'] = 1;
						} elseif($calificaciones[0]['Calificacion']['tipos_de_calificacion_id'] == 2) { // Calificación previa tipo Autónomo
							/**
							 * Se esta calificando como normal por primera vez
							 */
							$resultado_validacion['Calificacion'] = 1;
						} else { // Error
							$resultado_validacion['Mensaje'] = 'Tipo de calificación erronea';
						}
						/**
						 * ---------------------------------------------------------------------------------------------------
						 */
					} else { // No
						$resultado_validacion['Mensaje'] = 'La rama seleccionada no concuerda con la más reciente calificación';
					}
				} else { // No
					$resultado_validacion['Mensaje'] = 'No hay registros de calificaciones activas para este artesano';
				}
			} else { // No
				$resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano como artesano autónomo';
			}
		} else { // No
			$resultado_validacion['Mensaje'] = 'No hay registros previos de este artesano artesano';
		}
		
		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}

		/**
		 * Si se permite hacer la calificación validar si se esta o no dentro del rango permitido
		 * No permitir si se está antes de tiempo
		 */
		if($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Antes']) && $resultado_validacion['InfoFecha']['Antes']) {
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
		$resultado_validacion['Datos'] = $artesano;
		$resultado_validacion['Calificar'] = 0;
		
		/**
		 * ¿Hay un artesano registrado?
		 */
		if(!empty($artesano)) { // Si
			/**
			 * Como el artesano existe, verificar si ya tiene calificaciones previas.
			 * ¿Tiene calificaciones previas?
			 */
			if(!empty($calificaciones)) { // Si
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
					if($calificacion['Calificacion']['tipos_de_calificacion_id'] == 1) {
						$existe_calificacion_como_artesano_normal = true;
						break;
					}
				}
				/**
				 * ¿Es un artesano normal?
				 */
				if($existe_calificacion_como_artesano_normal) { // Si
					$resultado_validacion['Mensaje'] = 'Este artesano ya esta calificado como artesano normal';
				} else { // No
					/**
					 * Verificar si hay calificaciones previas con la misma rama
					 */
					$existe_calificacion_en_la_misma_rama = false;
					foreach ($calificaciones as $key => $calificacion) {
						if($calificacion['Calificacion']['rama_id'] == $rama_id) {
							$existe_calificacion_en_la_misma_rama = true;
							break;
						}
					}
					/**
					 * ¿Hay calificaciones de la misma rama?
					 */
					if($existe_calificacion_en_la_misma_rama) { // Si
						$resultado_validacion['Mensaje'] = 'Este artesano ya se ha registrado con la rama seleccionada';
					} else { // No
						$resultado_validacion['Calificar'] = 1;
					}
				}
			} else { // No
				$resultado_validacion['Calificar'] = 1;
			}
		} else { // No
			$resultado_validacion['Calificar'] = 1;
		}
		
		/**
		 * Si se permite hacer la calificación validar si hay o no multas por fechas incumplidas
		 */
		if($resultado_validacion['Calificar'] && isset($resultado_validacion['InfoFecha']['Multa']) && $resultado_validacion['InfoFecha']['Multa']) {
			$resultado_validacion['Mensaje'] = $resultado_validacion['InfoFecha']['Mensaje'];
		}
		
		// Hacer echo del resultado
		echo json_encode($resultado_validacion);
	}

	private function validarCalificacionObtenerFechas($fecha_expiracion) {
		$fechas = array();
		$fecha_rango_menor_registro = strtotime('-1 week', strtotime($fecha_expiracion));
		
		$fecha_expiracion = DateTime::createFromFormat('Y-m-d', $fecha_expiracion);
		$fecha_rango_menor_registro = date('Y-m-d', $fecha_rango_menor_registro);
		$fecha_rango_menor_registro = new DateTime($fecha_rango_menor_registro);
		
		$fechas['RangoRegistroFin'] = $fecha_expiracion -> format('Y-m-d');
		$fechas['RangoRegistroInicio'] = $fecha_rango_menor_registro -> format('Y-m-d');
		
		$fecha_actual = new DateTime('now');
		$fechas['FechaActual'] = $fecha_actual -> format('Y-m-d');
		
		$fechas['Multa'] = 0;
		
		if(($fecha_actual >= $fecha_rango_menor_registro) && ($fecha_actual <= $fecha_expiracion)) {
			$fechas['EnRango'] = 1;
			$fechas['Mensaje'] = 'Entre las fechas de registro';
		} else {
			$fechas['EnRango'] = 0;
			if($fecha_rango_menor_registro >= $fecha_actual) {
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
		if($calificacion && $calificacion['Calificacion']['cal_estado'] == 1) { 
			return true;
		} else {
			return false;
		}
	}

}
