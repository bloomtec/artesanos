<?php
App::uses('AppController', 'Controller');
/**
 * EspeciesValoradas Controller
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class EspeciesValoradasController extends AppController {

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
		
		$this->EspeciesValorada->recursive = 0;
		$this->set('especiesValoradas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EspeciesValorada->id = $id;
		if (!$this->EspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		$this->set('especiesValorada', $this->EspeciesValorada->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EspeciesValorada->create();
			$this -> request -> data['EspeciesValorada']['esp_valor_unitario'] = $this -> formatearValor($this -> request -> data['EspeciesValorada']['esp_valor_unitario']);
			if ($this->EspeciesValorada->save($this->request->data)) {
				$this->Session->setFlash(__('La especies valorada ha sido guardada'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'),'crud/error');
			}
		}
		$ingresosEspecies = $this->EspeciesValorada->IngresosEspecie->find('list');
		$ventasEspecies = $this->EspeciesValorada->VentasEspecie->find('list');
		$this->set(compact('ingresosEspecies', 'ventasEspecies'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EspeciesValorada->id = $id;
		if (!$this->EspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EspeciesValorada->save($this->request->data)) {
				$this->Session->setFlash(__('La especies valorada ha sido guardada'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La especie valorada no se pudo guardar. Por favor, intente de nuevo.'),'crud/error');
			}
		} else {
			$this->request->data = $this->EspeciesValorada->read(null, $id);
		}
		$ingresosEspecies = $this->EspeciesValorada->IngresosEspecie->find('list');
		$ventasEspecies = $this->EspeciesValorada->VentasEspecie->find('list');
		$this->set(compact('ingresosEspecies', 'ventasEspecies'));
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
		$this->EspeciesValorada->id = $id;
		if (!$this->EspeciesValorada->exists()) {
			throw new NotFoundException(__('Especie valorada no valida'));
		}
		if ($this->EspeciesValorada->delete()) {
			$this->Session->setFlash(__('Especie valorada borrada'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar la especie valorada'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
