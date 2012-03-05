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
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}
	
	public function getProvincias() {
		return $this -> Provincia -> find('all', array('order' => array('Provincia.pro_nombre' => 'ASC')));
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
			throw new NotFoundException(__('Invalid provincia'));
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
				$this -> Session -> setFlash(__('The provincia has been saved'), 'crud/success');
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The provincia could not be saved. Please, try again.'), 'crud/error');
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
			throw new NotFoundException(__('Invalid provincia'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Provincia -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The provincia has been saved'), 'crud/success');
				/*foreach($this->data['Canton'] as $canton){
					if(!empty($canton['can_nombre'])){
						$canton['provincia_id']=$this->data['Provincia']['id'];
						$this -> Provincia -> Canton -> save($canton);
						$this -> Provincia -> Canton -> id = 0;
					}
				}*/
				$this -> redirect(array('controller' => 'geograficos', 'action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The provincia could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Provincia -> read(null, $id);
		}
	}

}
