<?php
App::uses('AppController', 'Controller');
/**
 * Provincias Controller
 *
 * @property Provincia $Provincia
 */
class ProvinciasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getProvincias');
	}
	
	/**
	 * Obtener las provincias.
	 *
	 * @return Arreglo con las provincias registradas.
	 */
	public function getProvincias() {
		$this -> Provincia -> recursive = -1;
		return $this -> Provincia -> find('list', array('order' => array('Provincia.pro_nombre' => 'ASC')));
	}
	
	/**
	 * Obtener el nombre de una provincia.
	 *
	 * @param int $id ID de la provincia de la cual se quiere tener su nombre.
	 * @return El nombre de la provincia.
	 */
	public function getNombre($id) {
		$provincia = $this -> Provincia -> read('pro_nombre', $id);
		return $provincia['Provincia']['pro_nombre'];
	}

	/**
	 * Ver provincia
	 *
	 * @param int $id ID de la provincia que se quiere ver
	 * @return void
	 */
	public function view($id) {
		$this -> Provincia -> id = $id;
		if (!$this -> Provincia -> exists()) {
			throw new NotFoundException(__('Provincia no válida'));
		}
		$this -> set('provincia', $this -> Provincia -> read(null, $id));
	}

	/**
	 * Agregar provincia
	 *
	 * @return void
	 */
	public function add() {
		$this -> Provincia -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Provincia -> create();
			if ($this -> Provincia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la provincia'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la provincia. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * Modificar provincia
	 *
	 * @param int $id ID de la provincia a modificar
	 * @return void
	 */
	public function edit($id) {
		$this -> Provincia -> currentUsrId = $this -> Auth -> user('id');
		$this -> Provincia -> id = $id;
		if (!$this -> Provincia -> exists()) {
			throw new NotFoundException(__('Provincia no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Provincia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la provincia'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la provincia. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Provincia -> read(null, $id);
		}
	}
	
	/**
	 * Listado de provincias
	 * 
	 * @return void
	 */
	public function index() {
		$this -> Recursive = 0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];

			$idsProvincias = $this -> Provincia -> find('list', array('conditions' => array('OR' => array('Provincia.pro_nombre LIKE' => "%$query%", )), 'fields' => array('Provincia.id')));

			$conditions['OR']['Provincia.id'] = $idsProvincias;
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$provincias = $this -> paginate();
		$this -> set(compact('provincias'));
	}

}