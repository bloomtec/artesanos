<?php
App::uses('AppController', 'Controller');
/**
 * Cantones Controller
 *
 * @property Canton $Canton
 */
class CantonesController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getNombre', 'getCantones', 'getByProvincia');
	}
	
	/**
	 * Obtener los cantones acorde una provincia.
	 *
	 * @param int $provId ID de la provincia de la cual se quiere tener un listado de cantones.
	 * @return Arreglo codificado en JSON con la información de los cantones correspondientes.
	 */
	public function getByProvincia($provId) {
		$this -> layout = "ajax";
		if($provId) {
			$cantones = $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provId)));
			echo json_encode($cantones);
		} else {
			echo json_encode(array());
		}
		exit(0);
	}
	
	/**
	 * Obtener los cantones acorde una provincia.
	 *
	 * @param int $provincia_id ID de la provincia de la cual se quiere tener un listado de cantones.
	 * @return array Arreglo con la información de los cantones correspondientes.
	 */
	public function getCantones($provincia_id) {
		$this -> Canton ->recursive=-1;
		if ($provincia_id) {
			return $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC'), 'conditions' => array('Canton.provincia_id' => $provincia_id)));
		} else {
			return $this -> Canton -> find('list', array('order' => array('Canton.can_nombre' => 'ASC')));
		}
	}
	
	/**
	 * Obtener el nombre de un cantón.
	 *
	 * @param int $id ID del cantón que se quiere obtener el nombre.
	 * @return Nombre del cantón cuyo ID fue pasado por parámetro.
	 */
	public function getNombre($id) {
		if($id) {
			$canton = $this -> Canton -> read('can_nombre', $id);
			return $canton['Canton']['can_nombre'];
		} else {
			return null;
		}
	}

	/**
	 * Ver la información correspondiente a un cantón
	 *
	 * @param int $id ID del cantón que se quiere ver la información
	 * @return void
	 */
	public function view($id) {
		$this -> Canton -> id = $id;
		if (!$this -> Canton -> exists()) {
			throw new NotFoundException(__('Cantón no válido'));
		}
		$this -> set('canton', $this -> Canton -> read(null, $id));
	}

	/**
	 * Agregar un cantón
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
	 * Modificar un cantón
	 *
	 * @param int $id ID del cantón que se quiere modificar la información
	 * @return void
	 */
	public function edit($id) {
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
	
	/**
	 * Indice de cantones
	 *
	 * @return void
	 */
	public function index() {
		$this->Recursive=0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			$query = $this -> params['named']['query'];
			
			$idsCapacitacion = $this -> Canton -> find(
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
		$this -> set(compact('cantones'));
	}
}
