<?php
App::uses('AppController', 'Controller');
/**
 * Solicitudes Controller
 *
 * @property Solicitud $Solicitud
 */
class SolicitudesController extends AppController {
	
	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Solicitud -> recursive = 0;
		$this -> set('solicitudes', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$this -> set('solicitud', $this -> Solicitud -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$now = new DateTime('now');
			$this -> request -> data['Solicitud']['sol_fecha_solicitud'] = $now -> format('Y-m-d H:i:s');
			$this -> request -> data['Solicitud']['sol_costos'] = $this -> formatearValor($this -> request -> data['Solicitud']['sol_costos']);
			$this -> Solicitud -> create();
			if ($this -> Solicitud -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The solicitud has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The solicitud could not be saved. Please, try again.'), 'crud/error');
			}
		}
		$juntasProvinciales = $this -> Solicitud -> JuntasProvincial -> find('list');
		$this -> set(compact('juntasProvinciales'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['Solicitud']['sol_costos'] = $this -> formatearValor($this -> request -> data['Solicitud']['sol_costos']);
			if ($this -> Solicitud -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The solicitud has been saved'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The solicitud could not be saved. Please, try again.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Solicitud -> read(null, $id);
		}
		$juntasProvinciales = $this -> Solicitud -> JuntasProvincial -> find('list');
		$this -> set(compact('juntasProvinciales'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		if ($this -> Solicitud -> delete()) {
			$this -> Session -> setFlash(__('Solicitud deleted'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Solicitud was not deleted'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
