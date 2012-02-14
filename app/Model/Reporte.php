<?php
App::uses('AppModel', 'Model');
App::uses('Artesano', 'Model');
App::uses('DatosPersonal', 'Model');
App::uses('Calificacion', 'Model');
/**
 * Reporte Model
 */
class Reporte extends AppModel {
	
	public $name = 'Reporte';
	public $useTable = false;
	
	public function getValores($param_id = null) {
		$fetched_data = $this -> query(
			"SELECT `id`,`val_nombre`
			 FROM `valores`
			 WHERE `parametros_informativo_id`=$param_id
			 ORDER BY `val_nombre` ASC;"
		);
		$formatted_data = array();
		foreach ($fetched_data as $key => $value) {
			$formatted_data[$value['valores']['val_nombre']] = $value['valores']['val_nombre'];
		}
		return $formatted_data;
	}
	
}
