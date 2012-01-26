<?php
App::uses('AppController', 'Controller');
/**
 * Balances Controller
 *
 * @property Balance $Balance
 */
class BalancesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Balance->recursive = 0;
		$this->set('balances', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Balance->id = $id;
		if (!$this->Balance->exists()) {
			throw new NotFoundException(__('Invalid balance'));
		}
		$this->set('balance', $this->Balance->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Balance->create();
			if ($this->Balance->save($this->request->data)) {
				$this->Session->setFlash(__('The balance has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The balance could not be saved. Please, try again.'),'crud/error');
			}
		}
		$talleres = $this->Balance->Taller->find('list');
		$locales = $this->Balance->Local->find('list');
		$this->set(compact('talleres', 'locales'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Balance->id = $id;
		if (!$this->Balance->exists()) {
			throw new NotFoundException(__('Invalid balance'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Balance->save($this->request->data)) {
				$this->Session->setFlash(__('The balance has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The balance could not be saved. Please, try again.'),'crud/error');
			}
		} else {
			$this->request->data = $this->Balance->read(null, $id);
		}
		$talleres = $this->Balance->Taller->find('list');
		$locales = $this->Balance->Local->find('list');
		$this->set(compact('talleres', 'locales'));
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
		$this->Balance->id = $id;
		if (!$this->Balance->exists()) {
			throw new NotFoundException(__('Invalid balance'));
		}
		if ($this->Balance->delete()) {
			$this->Session->setFlash(__('Balance deleted'),'crud/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Balance was not deleted'),'crud/error');
		$this->redirect(array('action' => 'index'));
	}
}
