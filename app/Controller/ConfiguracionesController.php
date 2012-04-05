<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class ConfiguracionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getValorConfiguracion');
	}

	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	public function beforeRender() {
		//$this -> layout = "parametros";
	}

	public function getValorConfiguracion($valor = null) {
		if ($valor) {
			$valor_configuracion = $this -> Configuracion -> read($valor, 1);
			return $valor_configuracion['Configuracion'][$valor];
		} else {
			return null;
		}
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Configuracion -> recursive = 0;
		$this -> set('configuracion', $this -> Configuracion -> read(null, 1));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Configuracion -> currentUsrId = $this -> Auth -> user('id');

		$this -> Configuracion -> id = $id;
		if (!$this -> Configuracion -> exists()) {
			throw new NotFoundException(__('Configuración no válida'));
		}

		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['Configuracion']['con_capital_maximo_de_inversion'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_capital_maximo_de_inversion']);
			$this -> request -> data['Configuracion']['con_salario_basico_unificado'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_salario_basico_unificado']);
			$this -> request -> data['Configuracion']['con_calificacion_minima'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_calificacion_minima']);
			$this -> request -> data['Configuracion']['con_calificacion_maxima'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_calificacion_maxima']);
			$this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso']);
			if ($this -> Configuracion -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se ha guardado la configuración'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la configuración. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Configuracion -> read(null, $id);
			$this -> request -> data['Configuracion']['con_capital_maximo_de_inversion'] = 100 * $this -> request -> data['Configuracion']['con_capital_maximo_de_inversion'];
			$this -> request -> data['Configuracion']['con_salario_basico_unificado'] = 100 * $this -> request -> data['Configuracion']['con_salario_basico_unificado'];
			$this -> request -> data['Configuracion']['con_calificacion_minima'] = 100 * $this -> request -> data['Configuracion']['con_calificacion_minima'];
			$this -> request -> data['Configuracion']['con_calificacion_maxima'] =100 * $this -> request -> data['Configuracion']['con_calificacion_maxima'];
			$this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso'] = 100 * $this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso'];
			
		}
	}

}
