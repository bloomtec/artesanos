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
		$this -> Auth -> allow('validarCalificacion', 'validarCalificacionAutonomo', 'validarCalificacionNormal');
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
		$this -> loadModel('TiposDeCalificacion');
		$this -> loadModel('GruposDeRama');
		$tipos_de_calificacion = $this -> TiposDeCalificacion -> find('list');
		$grupos_de_ramas = $this -> GruposDeRama -> find('list');
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad', 'maquinarias_y_herramientas', 'tipos_de_adquisicion_maquinaria', 'tipos_de_materia_prima', 'procedencias_materia_prima', 'detalles_producto', 'procedencias_producto', 'grupos_de_ramas', 'tipos_de_calificacion'));
		/**
		 * Provincias
		 */
		$provincias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		$this -> set(compact('provincias'));
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
					'Calificacion.created' => 'DESC' // Dejar la más reciente calificación en la posición 0
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
		$anos_renovacion_artesano_autonomo = $this -> requestAction('/configuraciones/getValorConfiguracion/con_anos_renovacion_artesanos_autonomos');
		$anos_renovacion_artesano_normal = $this -> requestAction('/configuraciones/getValorConfiguracion/con_anos_renovacion_artesanos_normales');
		/**
		 * ¿Hay un artesano registrado?
		 */
		if(!empty($artesano)) { // Si
			
		} else { // No
			echo json_encode(array('Datos' => $artesano, 'Calificar' => 0, 'Mensaje' => 'No hay registros previos como artesano autónomo.'));
		}
		// normal -> ya debe de haber existido el registro
		// normal -> viene de autónomo, que este en el rango de expiración; si ya expiro la fecha de calificación se avisa la multa y se procede, si esta dentro del rango se dice que si, antes no.
		// normal -> recalificación -- misma rama de la calificacion anterior.
	}
	
	/**
	 * Tipo De Calificacion Autónomo :: 2
	 */
	private function validarCalificacionAutonomo($artesano, $calificaciones, $rama_id) {
		$resultado_validacion = array();
		$resultado_validacion['Datos'] = $artesano;
		$resultado_validacion['Calificar'] = 0;
		$anos_renovacion_artesano_autonomo = $this -> requestAction('/configuraciones/getValorConfiguracion/con_anos_renovacion_artesanos_autonomos');
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
					echo json_encode($resultado_validacion);
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
						echo json_encode($resultado_validacion);
					} else { // No
						$resultado_validacion['Calificar'] = 1;
						$resultado_validacion['Mensaje'] = 'Se puede calificar como artesano autónomo';
						echo json_encode($resultado_validacion);
					}
				}
			} else { // No
				$resultado_validacion['Calificar'] = 1;
				$resultado_validacion['Mensaje'] = 'Se puede calificar como artesano autónomo';
				echo json_encode($resultado_validacion);
			}
		} else { // No
			$resultado_validacion['Calificar'] = 1;
			$resultado_validacion['Mensaje'] = 'Se puede calificar como artesano autónomo';
			echo json_encode($resultado_validacion);
		}
	}

}
