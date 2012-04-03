<?php
App::uses('AppController', 'Controller');
/**
 * TiposEspeciesValoradas Controller
 *
 * @property TiposEspeciesValorada $TiposEspeciesValorada
 */
class TiposEspeciesValoradasController extends AppController {

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
		
		$this->TiposEspeciesValorada->recursive = 0;
		
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			
			$idsEspecies = $this -> TiposEspeciesValorada -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'TiposEspeciesValorada.tip_nombre LIKE' => "%$query%",
							'TiposEspeciesValorada.tip_codigo LIKE' => "%$query%",
							'TiposEspeciesValorada.tip_valor_unitario' => "%$query%"
						)
					),
					'fields' => array(
						'TiposEspeciesValorada.id'
					)
				)
			);
			
			$conditions['OR']['TiposEspeciesValorada.id'] = $idsEspecies;
			//$conditions['OR']['Solicitud.juntas_provincial_id'] = $idsJuntas;
		}
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		
		$this->set('tiposEspeciesValoradas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TiposEspeciesValorada->id = $id;
		if (!$this->TiposEspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		$this->set('tiposEspeciesValorada', $this->TiposEspeciesValorada->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TiposEspeciesValorada->create();
			$this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario'] = $this -> formatearValor($this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario']);
			if ($this->TiposEspeciesValorada->save($this->request->data)) {
				$this->Session->setFlash(__('La especies valorada ha sido guardada'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'),'crud/error');
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
		$this->TiposEspeciesValorada->id = $id;
		if (!$this->TiposEspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario'] = $this -> formatearValor($this -> request -> data['TiposEspeciesValorada']['tip_valor_unitario']);
			
			if ($this->TiposEspeciesValorada->save($this->request->data)) {
				$this->Session->setFlash(__('La especies valorada ha sido guardada'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'),'crud/error');
			}
		} else {
			$this->request->data = $this->TiposEspeciesValorada->read(null, $id);
		}
		
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TiposEspeciesValorada->id = $id;
		if (!$this->TiposEspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this->TiposEspeciesValorada->delete()) {
			$this->Session->setFlash(__('Especie valorada borrada'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar la especie valorada'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
