<?php
App::uses('AppController', 'Controller');
/**
 * ParametrosInformativos Controller
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class ParametrosInformativosController extends AppController {
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> ParametrosInformativo -> recursive = 0;
		$this -> paginate = array(
			'order' => array(
				'ParametrosInformativo.par_nombre' => 'ASC'
			)
		);
		$this -> set('parametrosInformativos', $this -> paginate());
	}
	
	public function getNombre($id) {
		$parametro = $this -> ParametrosInformativo -> read('par_nombre', $id);
		return $parametro['ParametrosInformativo']['par_nombre'];
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> ParametrosInformativo -> id = $id;
		if (!$this -> ParametrosInformativo -> exists()) {
			throw new NotFoundException(__('Invalid parametros informativo'));
		}
		$this -> set('parametrosInformativo', $this -> ParametrosInformativo -> read(null, $id));
		$this -> set(
			'valores',
			$this -> ParametrosInformativo -> Valor -> find(
				'all',
				array(
					'order' => array('Valor.val_nombre' => 'ASC'),
					'conditions' => array('Valor.parametros_informativo_id' => $id)
				)
			)
		);
	}

}
