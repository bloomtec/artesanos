<?php
App::uses('AppController', 'Controller');
/**
 * Valores Controller
 *
 * @property Valor $Valor
 */
class ValoresController extends AppController {
	
	public function getNombre($id) {
		$valor = $this -> Valor -> read('val_nombre', $id);
		if(empty($valor)) {
			return '<b>:: eliminado ::</b>';
		} else {
			return $valor['Valor']['val_nombre'];
		}
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Valor -> id = $id;
		if (!$this -> Valor -> exists()) {
			throw new NotFoundException(__('Valor no válido'));
		}
		$this -> set('valor', $this -> Valor -> read(null, $id));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($parametro_id = null) {
		$this -> Valor -> currentUsrId = $this -> Auth -> user('id');
		if ($this -> request -> is('post')) {
			$this -> Valor -> create();
			if ($this -> Valor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el valor'), 'crud/success');
				$this -> redirect(array('controller' => 'parametros_informativos', 'action' => 'view', $parametro_id));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el valor. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$parametrosInformativos = $this -> Valor -> ParametrosInformativo -> find('list');
		foreach ($parametrosInformativos as $key => $value) {
			if ($key != $parametro_id)
				unset($parametrosInformativos[$key]);
		}
		$this -> set(compact('parametrosInformativos'));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Valor -> currentUsrId = $this -> Auth -> user('id');
		$this -> Valor -> id = $id;
		if (!$this -> Valor -> exists()) {
			throw new NotFoundException(__('Valor no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Valor -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado el valor'), 'crud/success');
				$this -> redirect(array('controller' => 'parametros_informativos', 'action' => 'index'));
				$this -> redirect($this -> referer());
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el valor. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Valor -> read(null, $id);
		}
		$parametrosInformativos = $this -> Valor -> ParametrosInformativo -> find('list');
		$this -> set(compact('parametrosInformativos'));
		$this -> set('referer', $this -> referer());
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this -> Valor -> currentUsrId = $this -> Auth -> user('id');
		$this -> autoRender = false;
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Valor -> id = $id;
		if (!$this -> Valor -> exists()) {
			throw new NotFoundException(__('Valor no válido'));
		}
		if ($this -> Valor -> delete()) {
			$this -> Session -> setFlash(__('Se ha eliminado el valor'), 'crud/success');
			$this -> redirect($this->referer());
		}
		$this -> Session -> setFlash(__('No se ha eliminado el valor'), 'crud/error');
		$this -> redirect($this->referer());
	}

}
