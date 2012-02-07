<?php
App::uses('AppController', 'Controller');
/**
 * ProductosElaborados Controller
 *
 * @property ProductosElaborado $ProductosElaborado
 */
class ProductosElaboradosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductosElaborado->recursive = 0;
		$this->set('productosElaborados', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProductosElaborado->id = $id;
		if (!$this->ProductosElaborado->exists()) {
			throw new NotFoundException(__('Invalid productos elaborado'));
		}
		$this->set('productosElaborado', $this->ProductosElaborado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductosElaborado->create();
			if ($this->ProductosElaborado->save($this->request->data)) {
				$this->Session->setFlash(__('The productos elaborado has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The productos elaborado could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->ProductosElaborado->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProductosElaborado->id = $id;
		if (!$this->ProductosElaborado->exists()) {
			throw new NotFoundException(__('Invalid productos elaborado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductosElaborado->save($this->request->data)) {
				$this->Session->setFlash(__('The productos elaborado has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The productos elaborado could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->ProductosElaborado->read(null, $id);
		}
		$talleres = $this->ProductosElaborado->Taller->find('list');
		$this->set(compact('talleres'));
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
		$this->ProductosElaborado->id = $id;
		if (!$this->ProductosElaborado->exists()) {
			throw new NotFoundException(__('Invalid productos elaborado'));
		}
		if ($this->ProductosElaborado->delete()) {
			$this->Session->setFlash(__('Productos elaborado deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Productos elaborado was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
