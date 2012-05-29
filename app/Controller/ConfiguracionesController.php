<?php
App::uses('AppController', 'Controller');
/**
 * Configuraciones Controller
 *
 * @property Configuracion $Configuracion
 */
class ConfiguracionesController extends AppController {

	/**
	 * Definir características que se requieren globalmente por esta clase.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getValorConfiguracion');
	}

	/**
	 * Formatear un valor numérico
	 * @param string $valor Valor a formatear
	 * @return Valor formateado
	 */
	private function formatearValor($valor) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * Obtener el valor de una configuración
	 * @param string $valor La configuración que cuyo valor se quiere obtener
	 * @return El valor de la configuración
	 */
	public function getValorConfiguracion($valor) {
		if ($valor) {
			$valor_configuracion = $this -> Configuracion -> read($valor, 1);
			return $valor_configuracion['Configuracion'][$valor];
		} else {
			return null;
		}
	}

	/**
	 * "Listado" de la configuracion
	 *
	 * @return void
	 */
	public function index() {
		$this -> Configuracion -> recursive = 0;
		$this -> set('configuracion', $this -> Configuracion -> read(null, 1));
	}

	/**
	 * Modificar la configuración
	 *
	 * @param int $id ID de la configuración
	 * @return void
	 */
	public function edit($id) {
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
			$this -> request -> data['Configuracion']['con_iva'] = $this -> formatearValor($this -> request -> data['Configuracion']['con_iva']);
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
			$this -> request -> data['Configuracion']['con_calificacion_maxima'] = 100 * $this -> request -> data['Configuracion']['con_calificacion_maxima'];
			$this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso'] = 100 * $this -> request -> data['Configuracion']['con_calificacion_para_aprobar_curso'];
			$this -> request -> data['Configuracion']['con_iva'] = 100 * $this -> request -> data['Configuracion']['con_iva'];
		}
	}

}
