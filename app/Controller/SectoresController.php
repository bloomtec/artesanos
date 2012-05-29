<?php
App::uses('AppController', 'Controller');
/**
 * Sectores Controller
 *
 * @property Sector $Sector
 */
class SectoresController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getSectores', 'getByCiudad');
	}
	
	/**
	 * Obtener los sectores acorde una ciudad.
	 *
	 * @param int $ciuId ID de la ciudad de la cual se quiere tener un listado de sectores.
	 * 
	 * @return Arreglo codificado en JSON con la información de los sectores correspondientes.
	 */
	public function getByCiudad($ciuId) {
		$this -> layout = "ajax";
		$sectores = $this -> Sector -> find('list', array('order' => array('Sector.sec_nombre' => 'ASC'), 'conditions' => array('Sector.ciudad_id' => $ciuId)));
		echo json_encode($sectores);
		exit(0);
	}
	
	/**
	 * Obtener los sectores acorde una ciudad.
	 *
	 * @param int $ciuId ID de la ciudad de la cual se quiere tener un listado de sectores.
	 * @return Arreglo con la información de los sectores correspondientes.
	 */
	public function getSectores($ciudad_id = null) {
		$this -> Sector -> recursive = -1;
		if ($ciudad_id) {
			return $this -> Sector -> find('list', array('order' => array('Sector.sec_nombre' => 'ASC'), 'conditions' => array('Sector.ciudad_id' => $ciudad_id)));
		} else {
			return $this -> Sector -> find('list', array('order' => array('Sector.sec_nombre' => 'ASC')));
		}
	}
	
	/**
	 * Obtener el nombre de un sector.
	 *
	 * @param int $id ID del sector que se quiere obtener el nombre.
	 * 
	 * @return Nombre del sector cuyo ID fue pasado por parámetro.
	 */
	public function getNombre($id) {
		$sector = $this -> Sector -> read('sec_nombre', $id);
		if (empty($sector)) {
			return '<b>:: eliminado ::</b>';
		} else {
			return $sector['Sector']['sec_nombre'];
		}
	}

	/**
	 * Ver sector
	 *
	 * @param int $id ID del sector que se quiere ver
	 * 
	 * @return void
	 */
	public function view($id) {

		$this -> Sector -> id = $id;
		if (!$this -> Sector -> exists()) {
			throw new NotFoundException(__('Sector no válido'));
		}
		$this -> set('sector', $this -> Sector -> read(null, $id));
	}

	/**
	 * Agregar sector
	 *
	 * @return void
	 */
	public function add() {
		$this -> Sector -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Sector -> create();
			if ($this -> Sector -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el sector'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el sector. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Sector -> Ciudad -> find('list');
		$this -> set(compact('ciudades', 'cantones', 'provincias'));
	}

	/**
	 * Modificar sector
	 *
	 * @param int $id ID del sector que se quiere modificar
	 * 
	 * @return void
	 */
	public function edit($id) {
		$this -> Sector -> currentUsrId = $this -> Auth -> user('id');
		$this -> Sector -> id = $id;
		if (!$this -> Sector -> exists()) {
			throw new NotFoundException(__('Sector no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Sector -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el sector'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el sector. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Sector -> read(null, $id);
		}
		$provincias = $this -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Sector -> Ciudad -> find('list');
		$this -> set(compact('ciudades', 'cantones', 'provincias'));
	}
	
	/**
	 * Listar sectores
	 * 
	 * @return void
	 */
	public function index() {
		$this -> Recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];

			$idsSectores = $this -> Sector -> find('list', array('conditions' => array('OR' => array('Sector.sec_nombre LIKE' => "%$query%", )), 'fields' => array('Sector.id')));

			$idsCiudades = $this -> Sector -> Ciudad -> find('list', array('conditions' => array('OR' => array('Ciudad.ciu_nombre LIKE' => "%$query%", )), 'fields' => array('Ciudad.id')));

			$conditions['OR']['Sector.id'] = $idsSectores;
			$conditions['OR']['Sector.ciudad_id'] = $idsCiudades;
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$sectores = $this -> paginate();
		$this -> set(compact('sectores'));
	}

}
