<?php
App::uses('AppController', 'Controller');
/**
 * TiposEspeciesValoradas Controller
 *
 * @property TiposEspeciesValorada $TiposEspeciesValorada
 */
class TiposEspeciesValoradasController extends AppController {
	
	/**
	 * Formatear un valor númerico
	 * 
	 * @param string $valor El valor a formatear
	 * @return El valor formateado
	 */
	private function formatearValor($valor) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * Listado de tipos de especies valoradas
	 *
	 * @return void
	 */
	public function index() {

		$this -> TiposEspeciesValorada -> recursive = 0;

		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			$query = $this -> params['named']['query'];
			$idsEspecies = $this -> TiposEspeciesValorada -> find('list', array('conditions' => array('OR' => array('TiposEspeciesValorada.tip_nombre LIKE' => "%$query%", 'TiposEspeciesValorada.tip_codigo LIKE' => "%$query%", 'TiposEspeciesValorada.tip_valor_unitario' => "%$query%")), 'fields' => array('TiposEspeciesValorada.id')));
			$conditions['OR']['TiposEspeciesValorada.id'] = $idsEspecies;
		}
		if (!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}

		$this -> set('tiposEspeciesValoradas', $this -> paginate());
	}

	/**
	 * Ver un tipo de especie valorada
	 *
	 * @param int $id ID del tipo de especie valorada que se va a ver
	 * @return void
	 */
	public function view($id) {
		$this -> TiposEspeciesValorada -> id = $id;
		if (!$this -> TiposEspeciesValorada -> exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		$this -> set('tiposEspeciesValorada', $this -> TiposEspeciesValorada -> read(null, $id));
	}

	/**
	 * Agregar un tipo de especie valorada
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> TiposEspeciesValorada -> create();
			$this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario'] = $this -> formatearValor($this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario']);
			if ($this -> TiposEspeciesValorada -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La especies valorada ha sido guardada'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * Modificar un tipo de especie valorada
	 *
	 * @param int $id ID del tipo de especie valorada que se va a modificar
	 * @return void
	 */
	public function edit($id) {
		$this -> TiposEspeciesValorada -> id = $id;
		if (!$this -> TiposEspeciesValorada -> exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario'] = $this -> formatearValor($this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario']);

			if ($this -> TiposEspeciesValorada -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La especie valorada ha sido guardada'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$tipoEspecie = $this -> TiposEspeciesValorada -> read(null, $id);
			$tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario'] = $tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario'] * 100;
			$this -> request -> data = $tipoEspecie;
		}

	}

	/**
	 * Eliminar un tipo de especia valorada
	 *
	 * @param int $id ID del tipo de especie valorada que se va a eliminar
	 * @return void
	 */
	public function delete($id) {
		if ($id <= 50) {
			$this -> Session -> setFlash(__('No se permite eliminar este tipo de especie valorada'), 'crud/error');
			$this -> redirect(array('action' => 'index'));
		}
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> TiposEspeciesValorada -> id = $id;
		if (!$this -> TiposEspeciesValorada -> exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this -> TiposEspeciesValorada -> delete()) {
			$this -> Session -> setFlash(__('Especie valorada borrada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se pudo borrar la especie valorada'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
