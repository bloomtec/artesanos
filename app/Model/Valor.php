<?php
App::uses('AppModel', 'Model');
/**
 * Valor Model
 *
 * @property ParametrosInformativo $ParametrosInformativo
 */
class Valor extends AppModel {
	
	public $currentUsrId = -1;
	
	public $displayField = 'val_nombre';
	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'parametros_informativo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'val_nombre' => array(
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
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'ParametrosInformativo' => array(
			'className' => 'ParametrosInformativo',
			'foreignKey' => 'parametros_informativo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * Procedimientos antes de guardar
	 * @return true o false indicando si se puede o no guardar
	 */
	public function beforeSave($model) {
	    if(isset($this -> data['Valor']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Valor.id' => $this -> data['Valor']['id'])));
		}
	    return true;
	}

	/**
	 * Procedimientos despues de guardar
	 * @param bool $created Indica si es creación o actualización
	 */
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
				'aud_nombre_modelo' => 'Valor',
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
				'aud_nombre_modelo' => 'Valor',
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

	/**
	 * Procedimiento antes de eliminar
	 */
	public function beforeDelete($model = null, $cascade = null) {
		$this -> data['OldData'] = $this -> read(null, $this -> id);
		return true;
	}
	
	/**
	 * Procedimiento luego de eliminar
	 */
	public function afterDelete($model = null) {
		$data = $this -> parseDeleted($this -> data);
		$AudModel = new Auditoria();
		$auditoria = array();
		// Se ha modificado un usuario
		$AudModel -> create();
		$auditoria['Auditoria'] = array(
			'usuario_id' => $this -> currentUsrId,
			'aud_nombre_modelo' => 'Valor',
			'aud_llave_foranea' => $this -> id,
			'aud_datos_previos' => $data['Antes'],
			'aud_datos_nuevos' => $data['Despues'],
			'aud_add' => false,
			'aud_edit' => false,
			'aud_delete' => true
		);
		$AudModel -> save($auditoria);
	}
	
	/**
	 * Formatear la información
	 */
	private function parseDeleted($data) {
		$new_data = array();
		$new_data['Antes'] = '';
		$new_data['Despues'] = '';
		
		// Revisar si hay información vieja para registrarla
		if(isset($data['OldData'])) {
			$new_data['Antes'] .= '<table class="audit-table">';
			$new_data['Antes'] .= '<caption>Valor De Parámetro De Configuración</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Parámetro</td><td class="audit-data">'. $data['OldData']['ParametrosInformativo']['par_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Valor</td><td class="audit-data">' . $data['OldData']['Valor']['val_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '</table>';
		}
		
		return $new_data;
	}

	/**
	 * Formatear la información
	 */
	private function parseData($data) {
		$new_data = array();
		$new_data['Antes'] = '';
		$new_data['Despues'] = '';
		
		// Revisar si hay información vieja para registrarla
		if(isset($data['OldData'])) {
			if(isset($data['OldData'])) {
				$new_data['Antes'] .= '<table class="audit-table">';
				$new_data['Antes'] .= '<caption>Valor De Parámetro De Configuración</caption>';
				$new_data['Antes'] .= '<tr><td class="audit-value">Parámetro</td><td class="audit-data">'. $data['OldData']['ParametrosInformativo']['par_nombre'] . '</td></tr>';
				$new_data['Antes'] .= '<tr><td class="audit-value">Valor</td><td class="audit-data">' . $data['OldData']['Valor']['val_nombre'] . '</td></tr>';
				$new_data['Antes'] .= '</table>';
			}
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Valor De Parámetro De Configuración</caption>';
		if(isset($data['OldData']['Valor']['parametros_informativo_id'])) {
			if($data['OldData']['Valor']['parametros_informativo_id'] != $data['Valor']['parametros_informativo_id']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Parámetro</td><td class="audit-data">' . $this -> requestAction('/parametros_informativos/getNombre/' . $data['Valor']['parametros_informativo_id']) . '</td></tr>';
		if(isset($data['OldData']['Valor']['val_nombre'])) {
			if($data['OldData']['Valor']['val_nombre'] != $data['Valor']['val_nombre']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Valor</td><td class="audit-data">'. $data['Valor']['val_nombre'] . '</td></tr>';
		$new_data['Despues'] .= '</table>';
		
		return $new_data;
	}
}
