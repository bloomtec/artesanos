<?php
App::uses('AppController', 'Controller');
/**
 * IngresosEspecies Controller
 *
 * @property IngresosEspecie $IngresosEspecie
 */
class IngresosEspeciesController extends AppController {
	
	private function uploadIngresoEspecieFile($tmp_name = null, $filename = null) {
		$this -> cleanupIngresoEspecieFiles();
		if ($tmp_name && $filename) {
			$url = 'files/uploads/especiesValoradas/' . $filename;
			return move_uploaded_file($tmp_name, $url);
		}
	}
	
	private function cleanupIngresoEspecieFiles() {
		$items = $this -> IngresosEspecie -> find('all');
		$db_files = array();
		foreach ($items as $key => $item) {
			$db_files[] = $item['IngresosEspecie']['ing_documento_soporte'];
		}
		$dir_files = array();
		$dir_path = APP . 'webroot/files/uploads/especiesValoradas';
		if ($handle = opendir($dir_path)) {
			while (false !== ($entry = readdir($handle))) {
				if($entry != 'empty' && is_file($dir_path . DS . $entry)) $dir_files[] = 'files/uploads/especiesValoradas/' . $entry;
			}
			closedir($handle);
		}
		foreach($dir_files as $file) {
			if(!in_array($file, $db_files)) {
				$file = explode('/', $file);
				$file = $file[count($file) - 1];
				$tmp_file_path = $dir_path . DS . $file;
				unlink($tmp_file_path);
			}
		}
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> IngresosEspecie -> recursive = 0;
		$this -> set('ingresosEspecies', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> IngresosEspecie -> id = $id;
		if (!$this -> IngresosEspecie -> exists()) {
			throw new NotFoundException(__('Ingreso Especie no válido'));
		}
		$this -> set('ingresosEspecie', $this -> IngresosEspecie -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			// Validar que no hayan seriados existentes entre los rangos ingresados
			$seriados_validos = true;
			$tipo_especie = null;
			$rango_inicio = null;
			$rango_fin = null;
			foreach ($this -> request -> data['EspeciesValorada'] as $key => $especieValorada) {
				$tmp_especie_valorada = $this -> IngresosEspecie -> EspeciesValorada -> find(
					'all',
					array(
						'conditions' => array(
							'EspeciesValorada.esp_serie BETWEEN ? AND ?' => array($especieValorada['serie_inicial'], $especieValorada['serie_final']),
							'EspeciesValorada.tipos_especies_valorada_id' => $especieValorada['tipos_especies_valorada_id']
						)
					)
				);
				if($tmp_especie_valorada) {
					$seriados_validos = false;
					$tipo_especie = $tmp_especie_valorada[0]['TiposEspeciesValorada']['tip_nombre'];
					$rango_inicio = $tmp_especie_valorada[0]['EspeciesValorada']['esp_serie'];
					$rango_fin = $tmp_especie_valorada[count($tmp_especie_valorada) - 1]['EspeciesValorada']['esp_serie'];
					break;
				}
			}
			if($seriados_validos) {
				if (!empty($this -> request -> data['IngresosEspecie']['ing_documento_soporte']['name']) && !$this -> request -> data['IngresosEspecie']['ing_documento_soporte']['error']) {
					$now = new DateTime('now');
					$filename = $now -> format('Y-m-d_H-i-s') . '_' . str_replace(' ', '_', $this -> request -> data['IngresosEspecie']['ing_documento_soporte']['name']);
					if ($this -> uploadIngresoEspecieFile($this -> request -> data['IngresosEspecie']['ing_documento_soporte']['tmp_name'], $filename)) {
						$this -> request -> data['IngresosEspecie']['ing_documento_soporte'] = 'files/uploads/especiesValoradas/' . $filename;
					}
				}
				$this -> IngresosEspecie -> create();
				if ($this -> IngresosEspecie -> save($this -> request -> data)) {
					
					foreach ($this -> request -> data['EspeciesValorada'] as $key => $especieValorada) {
						$especieValorada['ingresos_especie_id'] = $this -> IngresosEspecie -> id;
						while($especieValorada['serie_inicial'] <= $especieValorada['serie_final']) {
							$this -> IngresosEspecie -> EspeciesValorada -> create();
							$especieValorada['esp_serie'] = $especieValorada['serie_inicial'];
							$this -> IngresosEspecie -> EspeciesValorada -> save($especieValorada);
							$especieValorada['serie_inicial'] += 1;
						}
					}
					
					$this -> Session -> setFlash(__('Se registró el ingreso de especies valoradas'), 'crud/success');
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se registró el ingreso de especies valoradas. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash(__("El ingreso de especies valoradas $tipo_especie contiene un rango con valores existentes. Conflicto de valor con valores existentes entre $rango_inicio y $rango_fin."), 'crud/error');
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
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> IngresosEspecie -> id = $id;
		if (!$this -> IngresosEspecie -> exists()) {
			throw new NotFoundException(__('Ingreso Especie no válido'));
		}
		if ($this -> IngresosEspecie -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el ingreso de especie'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el ingreso de especie'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function reporte() {

	}

}
