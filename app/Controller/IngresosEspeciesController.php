<?php
App::uses('AppController', 'Controller');
/**
 * IngresosEspecies Controller
 *
 * @property IngresosEspecie $IngresosEspecie
 */
class IngresosEspeciesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IngresosEspecie->recursive = 0;
		$this->set('ingresosEspecies', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IngresosEspecie->id = $id;
		if (!$this->IngresosEspecie->exists()) {
			throw new NotFoundException(__('Invalid ingresos especie'));
		}
		$this->set('ingresosEspecie', $this->IngresosEspecie->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IngresosEspecie->create();
			if ($this->IngresosEspecie->save($this->request->data)) {
				$this->Session->setFlash(__('The ingresos especie has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingresos especie could not be saved. Please, try again.'),'crud/error');
			}
		}
		$tiposEspeciesValoradas = $this->IngresosEspecie->EspeciesValorada->TiposEspeciesValorada->find('all');
		$this->set(compact('tiposEspeciesValoradas'));
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
		$this->IngresosEspecie->id = $id;
		if (!$this->IngresosEspecie->exists()) {
			throw new NotFoundException(__('Invalid ingresos especie'));
		}
		if ($this->IngresosEspecie->delete()) {
			$this->Session->setFlash(__('Ingresos especie deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ingresos especie was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
	public function reporte(){
		
	}
}
