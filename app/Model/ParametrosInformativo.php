<?php
App::uses('AppModel', 'Model');
App::uses('Auditoria', 'Model');
/**
 * ParametrosInformativo Model
 *
 * @property Valor $Valor
 */
class ParametrosInformativo extends AppModel {
	
	public $currentUsrId = -1;
	
	public $displayField = 'par_nombre';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'par_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Valor' => array(
			'className' => 'Valor',
			'foreignKey' => 'parametros_informativo_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
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
	
	public function beforeSave($model) {
		if(isset($this -> data['ParametrosInformativo']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('ParametrosInformativo.id' => $this -> data['ParametrosInformativo']['id'])));
		}
	    return true;
	}

	public function afterSave($created) {
		$data = $this -> parseData($this -> data);
		$AudModel = new Auditoria();
		$auditoria = array();
		// Corregir añadir el primer usuario
		if($this -> currentUsrId == -1) {
			$this -> currentUsrId = 1;
		}
		if($created) {
			// Se ha creado un usuario
			$AudModel -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $this -> currentUsrId,
				'aud_nombre_modelo' => 'ParametrosInformativo',
				'aud_llave_foranea' => $this -> id,
				'aud_datos_previos' => $data['Antes'],
				'aud_datos_nuevos' => $data['Despues'],
				'aud_add' => true,
				'aud_edit' => false,
				'aud_delete' => false
			);
			$AudModel -> save($auditoria);
		} else {
			// Se ha modificado un usuario
			$AudModel -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $this -> currentUsrId,
				'aud_nombre_modelo' => 'ParametrosInformativo',
				'aud_llave_foranea' => $this -> id,
				'aud_datos_previos' => $data['Antes'],
				'aud_datos_nuevos' => $data['Despues'],
				'aud_add' => false,
				'aud_edit' => true,
				'aud_delete' => false
			);
			$AudModel -> save($auditoria);
		}
	}

	private function parseData($data) {
		$new_data = array();
		$new_data['Antes'] = '';
		$new_data['Despues'] = '';
		
		// Revisar si hay información vieja para registrarla
		if(isset($data['OldData'])) {
			$new_data['Antes'] .= '<table class="audit-table">';
			$new_data['Antes'] .= '<caption>Datos Del Parámetro Informativo</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Nombre</td><td class="audit-data">'. $data['OldData']['ParametrosInformativo']['par_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '</table>';
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Datos Del Parámetro Informativo</caption>';
		if(isset($data['OldData']['ParametrosInformativo']['par_nombre'])) {
			if($data['OldData']['ParametrosInformativo']['par_nombre'] != $data['ParametrosInformativo']['par_nombre']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Nombre</td><td class="audit-data">'. $data['ParametrosInformativo']['par_nombre'] . '</td></tr>';
		$new_data['Despues'] .= '</table>';
		
		return $new_data;
	}

}
