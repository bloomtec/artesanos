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
		$this -> Auth -> allow('validarCalificacion');
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
		
		if(!empty($artesano)) {
			// El artesano ya está registrado; buscar si ya tiene una calificación en la rama propuesta
			$calficaciones = $this -> Artesano -> Calificacion -> find('all', array('conditions' => array('Calificacion.artesano_id' => $artesano['Artesano']['id'], 'Calificacion.rama_id' => $rama_id)));
			if(!empty($calficaciones)) {
				// Ya existe una calificación para este artesano en esta rama
				echo json_encode(array('Datos' => $artesano, 'Calificar' => 0));
			} else {
				// No hay calificaciones en esta rama para el artesano
				echo json_encode(array('Datos' => $artesano, 'Calificar' => 1));
			}
		} else {
			// No hay personas registradas con dicha cédula
			echo json_encode(array('Datos' => $artesano, 'Calificar' => 1));
		}
		
		exit(0);
	}

}
