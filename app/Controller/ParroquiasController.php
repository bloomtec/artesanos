<?php
App::uses('AppController', 'Controller');
/**
 * Parroquias Controller
 *
 * @property Parroquia $Parroquia
 */
class ParroquiasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getParroquias', 'getBySector', 'getByCiudad');
	}
	
	/**
	 * Obtener parroquias de un sector
	 * @param int $secId ID del sector
	 * @return Arreglo codificado en JSON con las parroquias del sector
	 */
	public function getBySector($secId = null) {
		$this -> layout = "ajax";
		echo json_encode($this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $secId))));
		exit(0);
	}
	
	/**
	 * Obtener parroquias de una ciudad
	 * @param int $ciudadId ID de la ciudad
	 * @return Arreglo codificado en JSON con las parroquias de una ciudad
	 */
	public function getByCiudad($ciudadId = null) {
		$this -> layout = "ajax";
		$sectores = $this -> Parroquia -> Sector -> find('list', array('conditions' => array('ciudad_id' => $ciudadId), 'fields' => array('id', 'id')));
		echo json_encode($this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $sectores))));
		exit(0);
	}
	
	/**
	 * Obtener las parroquias de un sector
	 * @param int $sector_id ID del sector
	 * @return Arreglo con las parroquias del sector
	 */
	public function getParroquias($sector_id) {
		$this -> Parroquia -> recursive = 0;
		if ($sector_id) {
			return $this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $sector_id)));
		} else {
			return $this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC')));
		}
	}
	
	/**
	 * Obtener el nombre de una parroquia
	 * @param int $id ID de la parroquia
	 * @return El nombre de la parroquia
	 */
	public function getNombre($id) {
		$parroquia = $this -> Parroquia -> read('par_nombre', $id);
		return $parroquia['Parroquia']['par_nombre'];
	}

	/**
	 * Ver parroquia
	 *
	 * @param int $id ID de la parroquia
	 * @return void
	 */
	public function view($id) {
		$this -> Parroquia -> id = $id;
		if (!$this -> Parroquia -> exists()) {
			throw new NotFoundException(__('Parroquia no válida'));
		}
		$this -> set('parroquia', $this -> Parroquia -> read(null, $id));
	}

	/**
	 * Agregar parroquia
	 *
	 * @return void
	 */
	public function add() {
		$this -> Parroquia -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Parroquia -> create();
			if ($this -> Parroquia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la parroquia'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la parroquia. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Parroquia -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Parroquia -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Parroquia -> Sector -> Ciudad -> find('list');
		$sectores = $this -> Parroquia -> Sector -> find('list');
		$this -> set(compact('sectores', 'ciudades', 'cantones', 'provincias'));
	}

	/**
	 * Modificar parroquia
	 *
	 * @param int $id ID de la parroquia
	 * @return void
	 */
	public function edit($id) {
		$this -> Parroquia -> currentUsrId = $this -> Auth -> user('id');
		$this -> Parroquia -> id = $id;
		if (!$this -> Parroquia -> exists()) {
			throw new NotFoundException(__('Parroquia no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Parroquia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la parroquia'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la parroquia. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Parroquia -> read(null, $id);
		}
		$provincias = $this -> Parroquia -> Sector -> Ciudad -> Canton -> Provincia -> find('list');
		$cantones = $this -> Parroquia -> Sector -> Ciudad -> Canton -> find('list');
		$ciudades = $this -> Parroquia -> Sector -> Ciudad -> find('list');
		$sectores = $this -> Parroquia -> Sector -> find('list');
		$this -> set(compact('sectores', 'ciudades', 'cantones', 'provincias'));
	}
	
	/**
	 * Listado de parroquias
	 * 
	 * @return void
	 */
	public function index() {
		$this -> Recursive = 0;
		$conditions = array();

		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			$query = $this -> params['named']['query'];

			$idsParroquias = $this -> Parroquia -> find('list', array('conditions' => array('OR' => array('Parroquia.par_nombre LIKE' => "%$query%", )), 'fields' => array('Parroquia.id')));

			$idsSectores = $this -> Parroquia -> Sector -> find('list', array('conditions' => array('OR' => array('Sector.sec_nombre LIKE' => "%$query%", )), 'fields' => array('Sector.id')));

			$conditions['OR']['Parroquia.id'] = $idsParroquias;
			$conditions['OR']['Parroquia.sector_id'] = $idsSectores;
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$parroquias = $this -> paginate();
		$this -> set(compact('parroquias'));
	}

}
