<?php
App::uses('AppController', 'Controller');
/**
 * Parroquias Controller
 *
 * @property Parroquia $Parroquia
 */
class ParroquiasController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getParroquias', 'getBySector');
	}

	public function beforeRender() {
		//$this -> layout = "parametros";
	}

	public function getBySector($secId=null) {
		$this -> layout = "ajax";
		echo json_encode($this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $secId))));
		exit(0);
	}

	public function getParroquias($sector_id = null) {
		$this -> Parroquia ->recursive=0;
		if ($sector_id) {
			return $this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC'), 'conditions' => array('Parroquia.sector_id' => $sector_id)));
		} else {
			return $this -> Parroquia -> find('list', array('order' => array('Parroquia.par_nombre' => 'ASC')));
		}
	}

	public function getNombre($id) {
		$parroquia = $this -> Parroquia -> read('par_nombre', $id);
		return $parroquia['Parroquia']['par_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Parroquia -> id = $id;
		if (!$this -> Parroquia -> exists()) {
			throw new NotFoundException(__('Parroquia no válida'));
		}
		$this -> set('parroquia', $this -> Parroquia -> read(null, $id));
	}

	/**
	 * add method
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
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
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
	
	public function index() {
		
		$this->Recursive=0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
					
			$idsParroquias = $this -> Parroquia -> find(
			'list',
				array(
					'conditions' => array(
						'OR' => array(
							'Parroquia.par_nombre LIKE' => "%$query%",
						)
					),
					'fields' => array(
						'Parroquia.id'
					)
				)
			);
			
			$idsSectores = $this -> Parroquia->Sector -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'Sector.sec_nombre LIKE' => "%$query%",
						)
					),
					'fields' => array(
						'Sector.id'
					)
				)
			);
			
			$conditions['OR']['Parroquia.id'] = $idsParroquias;
			$conditions['OR']['Parroquia.sector_id'] = $idsSectores;
		}
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		
		
		$parroquias = $this -> paginate();
		$this -> set(compact('parroquias'));
	}
}