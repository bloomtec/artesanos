<?php
App::uses('AppController', 'Controller');
/**
 * Provincias Controller
 *
 * @property Provincia $Provincia
 */
class ProvinciasController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getProvincias');
	}

	public function getProvincias() {
		//return $this -> Provincia -> find('all', array('order' => array('Provincia.pro_nombre' => 'ASC')));
		$this -> Provincia ->recursive=-1;
		return $this -> Provincia -> find('list', array('order' => array('Provincia.pro_nombre' => 'ASC')));
	}
	
	public function getNombre($id) {
		$provincia = $this -> Provincia -> read('pro_nombre', $id);
		return $provincia['Provincia']['pro_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		
		$this -> Provincia -> id = $id;
		if (!$this -> Provincia -> exists()) {
			throw new NotFoundException(__('Provincia no válida'));
		}
		$this -> set('provincia', $this -> Provincia -> read(null, $id));
	}

	/**
	 * add method
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
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Provincia -> currentUsrId = $this -> Auth -> user('id');
		$this -> Provincia -> id = $id;
		if (!$this -> Provincia -> exists()) {
			throw new NotFoundException(__('Provincia no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Provincia -> save($this -> request -> data)) {
				/*foreach($this->data['Canton'] as $canton){
					if(!empty($canton['can_nombre'])){
						$canton['provincia_id']=$this->data['Provincia']['id'];
						$this -> Provincia -> Canton -> save($canton);
						$this -> Provincia -> Canton -> id = 0;
					}
				}*/
				$this -> Session -> setFlash(__('Se ha guardado la provincia'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la provincia. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Provincia -> read(null, $id);
		}
	}

	public function index() {
		$this->Recursive=0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			
			$idsProvincias = $this -> Provincia -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'Provincia.pro_nombre LIKE' => "%$query%",
						)
					),
					'fields' => array(
						'Provincia.id'
					)
				)
			);
			
			$conditions['OR']['Provincia.id'] = $idsProvincias;
		}
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		$provincias = $this -> paginate();
		$this -> set(compact('provincias'));
	}

}
