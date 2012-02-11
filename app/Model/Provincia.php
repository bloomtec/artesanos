<?php
App::uses('AppModel', 'Model');
App::uses('Auditoria', 'Model');
/**
 * Provincia Model
 *
 * @property Canton $Canton
 * @property Local $Local
 * @property Taller $Taller
 */
class Provincia extends AppModel {
	
	public $currentUsrId = -1;
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'pro_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'pro_nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
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
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'provincia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Local' => array(
			'className' => 'Local',
			'foreignKey' => 'provincia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'provincia_id',
			'dependent' => false,
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
	
	public function beforeSave($model) {
		if(isset($this -> data['Provincia']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Provincia.id' => $this -> data['Provincia']['id'])));
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
				'aud_nombre_modelo' => 'Provincia',
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
				'aud_nombre_modelo' => 'Provincia',
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
			$new_data['Antes'] .= '<caption>Datos De La Provincia</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Nombre</td><td class="audit-data">'. $data['OldData']['Provincia']['pro_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '</table>';
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Datos De La Provincia</caption>';
		if(isset($data['OldData']['Provincia']['pro_nombre'])) {
			if($data['OldData']['Provincia']['pro_nombre'] != $data['Provincia']['pro_nombre']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Nombre</td><td class="audit-data">'. $data['Provincia']['pro_nombre'] . '</td></tr>';
		$new_data['Despues'] .= '</table>';
		
		return $new_data;
	}

}
