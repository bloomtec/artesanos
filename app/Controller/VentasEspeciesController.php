<?php
App::uses('AppController', 'Controller');
/**
 * VentasEspecies Controller
 *
 * @property VentasEspecie $VentasEspecie
 */
class VentasEspeciesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VentasEspecie->recursive = 0;
		$this->set('ventasEspecies', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->VentasEspecie->id = $id;
		if (!$this->VentasEspecie->exists()) {
			throw new NotFoundException(__('Invalid ventas especie'));
		}
		$this->set('ventasEspecie', $this->VentasEspecie->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VentasEspecie->create();
			if ($this->VentasEspecie->save($this->request->data)) {
				$this->Session->setFlash(__('The ventas especie has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ventas especie could not be saved. Please, try again.'),'crud/error');
			}
		}
		$juntasProvinciales = $this->VentasEspecie->JuntasProvincial->find('list');
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all');
		$this->set(compact('juntasProvinciales', 'tiposEspeciesValorada'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->VentasEspecie->id = $id;
		if (!$this->VentasEspecie->exists()) {
			throw new NotFoundException(__('Invalid ventas especie'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VentasEspecie->save($this->request->data)) {
				$this->Session->setFlash(__('The ventas especie has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ventas especie could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->VentasEspecie->read(null, $id);
		}
		$juntasProvinciales = $this->VentasEspecie->JuntasProvincial->find('list');
		$artesanos = $this->VentasEspecie->Artesano->find('list');
		$especiesValoradas = $this->VentasEspecie->EspeciesValorada->find('list');
		$this->set(compact('juntasProvinciales', 'artesanos', 'especiesValoradas'));
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
		$this->VentasEspecie->id = $id;
		if (!$this->VentasEspecie->exists()) {
			throw new NotFoundException(__('Invalid ventas especie'));
		}
		if ($this->VentasEspecie->delete()) {
			$this->Session->setFlash(__('Ventas especie deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ventas especie was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function reporte(){
		
	}
}
