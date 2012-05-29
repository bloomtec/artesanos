<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudad $Ciudad
 */
class CiudadesController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getCiudades', 'getByCanton');
	}
	
	/**
	 * Obtener ciudades acorde un cantón
	 * @param int $canId ID del cantón
	 * @return Arreglo codificado en JSON con las ciudades del cantón
	 */
	public function getByCanton($canId = null) {
		$this -> layout = "ajax";
		//$ciudades_con_inspectores = $this -> Ciudad -> Usuario -> find('list', array('fields' => array('Usuario.ciudad_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		//$ciudades = $this -> Ciudad -> find('list', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.id' => $ciudades_con_inspectores, 'Ciudad.canton_id' => $canId)));
		$ciudades = $this -> Ciudad -> find('list', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.canton_id' => $canId)));
		echo json_encode($ciudades);
		exit(0);
	}
	
	/**
	 * Obtener ciudades acorde un cantón
	 * @param int $canton_id ID del cantón
	 * @return Arreglo de ciudades del cantón
	 */
	public function getCiudades($canton_id) {
		$this -> Ciudad -> recursive = -1;
		if ($canton_id) {
			return $this -> Ciudad -> find('all', array('order' => array('Ciudad.ciu_nombre' => 'ASC'), 'conditions' => array('Ciudad.canton_id' => $canton_id)));
		} else {
			return $this -> Ciudad -> find('all', array('order' => array('Ciudad.ciu_nombre' => 'ASC')));
		}
	}

	/**
	 * Obtener el nombre de una ciudad
	 * @param int $id ID de la ciudad
	 * @return Nombre de la ciudad
	 */
	public function getNombre($id) {
		$ciudad = $this -> Ciudad -> read('ciu_nombre', $id);
		return $ciudad['Ciudad']['ciu_nombre'];
	}

	/**
	 * Ver una ciudad
	 *
	 * @param int $id ID de la ciudad
	 * @return void
	 */
	public function view($id) {
		$this -> Ciudad -> id = $id;
		if (!$this -> Ciudad -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		$this -> set('ciudad', $this -> Ciudad -> read(null, $id));
	}

	/**
	 * Agregar ciudad
	 *
	 * @return void
	 */
	public function add() {
		$this -> Ciudad -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Ciudad -> create();
			if ($this -> Ciudad -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la ciudad'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones', 'provincias'));
	}

	/**
	 * Modificar ciudad
	 *
	 * @param int $id ID de la ciudad
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Ciudad -> currentUsrId = $this -> Auth -> user('id');
		$this -> Ciudad -> id = $id;
		if (!$this -> Ciudad -> exists()) {
			throw new NotFoundException(__('Ciudad no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Ciudad -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la ciudad'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la ciudad. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Ciudad -> read(null, $id);
		}
		$provincias = $this -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Ciudad -> Canton -> find('list');
		$this -> set(compact('cantones', 'provincias'));
	}
	
	/**
	 * Listado de ciudades
	 * @return void
	 */
	public function index() {
		$this -> Recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];

			$idsCiudades = $this -> Ciudad -> find('list', array('conditions' => array('OR' => array('Ciudad.ciu_nombre LIKE' => "%$query%", )), 'fields' => array('Ciudad.id')));

			$idsCantones = $this -> Ciudad -> Canton -> find('list', array('conditions' => array('OR' => array('Canton.can_nombre LIKE' => "%$query%", )), 'fields' => array('Canton.id')));

			$conditions['OR']['Ciudad.id'] = $idsCiudades;
			$conditions['OR']['Ciudad.canton_id'] = $idsCantones;
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}

		$ciudades = $this -> paginate();
		$this -> set(compact('ciudades'));
	}

}
