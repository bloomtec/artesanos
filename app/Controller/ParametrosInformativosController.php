<?php
App::uses('AppController', 'Controller');
/**
 * ParametrosInformativos Controller
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class ParametrosInformativosController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getValores');
	}
	
	public function beforeRender() {
		$this -> layout = "parametros";
	}
	
	public function getNombre($id) {
		$parametro = $this -> ParametrosInformativo -> read('par_nombre', $id);
		return $parametro['ParametrosInformativo']['par_nombre'];
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
	
	public function getValores($id = null) {
		$this -> layout = "ajax";
		if($id) {
			echo json_encode($this -> ParametrosInformativo -> getValores($id));
		} else {
			echo 'error';
		}
		exit(0);
	}

}
