<?php
App::uses('AppController', 'Controller');
/**
 * Cantones Controller
 *
 * @property Canton $Canton
 */
class CantonesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getCantones', 'getByProvincia');
	}

	public function beforeRender() {
		//$this -> layout = "parametros";
	}

	public function getByProvincia($provId=null) {
		$this -> layout = "ajax";
		//$cantones_con_inspectores = $this -> Canton -> Usuario -> find('list', array('fields' => array('Usuario.canton_id'), 'conditions' => array('Usuario.rol_id' => 3)));
		//$cantones = $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.id' => $cantones_con_inspectores, 'Canton.provincia_id' => $provId)));
		$cantones = $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provId)));
		echo json_encode($cantones);
		exit(0);
	}

	public function getCantones($provincia_id = null) {
		$this -> Canton ->recursive=-1;
		if ($provincia_id) {
			return $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provincia_id)));
		} else {
			return $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC')));
		}
	}

	public function getNombre($id) {
		$canton = $this -> Canton -> read('can_nombre', $id);
		return $canton['Canton']['can_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Canton -> id = $id;
		if (!$this -> Canton -> exists()) {
			throw new NotFoundException(__('Cantón no válido'));
		}
		$this -> set('canton', $this -> Canton -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> Canton -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Canton -> create();
			if ($this -> Canton -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el cantón'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el cantón. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$provincias = $this -> Canton -> Provincia -> find('list');
		$this -> set(compact('provincias'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Canton -> currentUsrId = $this -> Auth -> user('id');
		$this -> Canton -> id = $id;
		if (!$this -> Canton -> exists()) {
			throw new NotFoundException(__('Cantón no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Canton -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó el cantón'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el cantón. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Canton -> read(null, $id);
		}
		$provincias = $this -> Canton -> Provincia -> find('list');
		$this -> set(compact('provincias'));
	}

	public function index() {
		$this->Recursive=0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			
			$idsCanton = $this -> Canton -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'Canton.can_nombre LIKE' => "%$query%",
						)
					),
					'fields' => array(
						'Canton.id'
					)
				)
			);
			
			$idsProvincia = $this -> Canton -> Provincia -> find(
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
			
			$conditions['OR']['Canton.id'] = $idsCanton;
			$conditions['OR']['Canton.provincia_id'] = $idsProvincia;
		}
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		
		$cantones = $this -> paginate();
		
		//debug($cantones);
		$this -> set(compact('cantones'));
	}
}
