<?php
App::uses('AppModel', 'Model');
App::uses('Auditoria', 'Model');
/**
 * Canton Model
 *
 * @property Provincia $Provincia
 * @property Ciudad $Ciudad
 * @property Local $Local
 * @property Taller $Taller
 */
class Canton extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'can_nombre';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'provincia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'can_nombre' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'canton_id',
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
			'foreignKey' => 'canton_id',
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
			'foreignKey' => 'canton_id',
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
		if(isset($this -> data['Canton']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Canton.id' => $this -> data['Canton']['id'])));
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
				'aud_nombre_modelo' => 'Canton',
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
				'aud_nombre_modelo' => 'Canton',
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
			$new_data['Antes'] .= '<caption>Datos Del Canton</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Nombre</td><td class="audit-data">'. $data['OldData']['Canton']['can_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Provincia</td><td class="audit-data">'. $data['OldData']['Provincia']['pro_nombre'] . '</td></tr>';
			$new_data['Antes'] .= '</table>';
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Datos Del Canton</caption>';
		if(isset($data['OldData']['Canton']['can_nombre'])) {
			if($data['OldData']['Canton']['can_nombre'] != $data['Canton']['can_nombre']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Nombre</td><td class="audit-data">'. $data['Canton']['can_nombre'] . '</td></tr>';
		if(isset($data['OldData']['Provincia']['pro_nombre'])) {
			if($data['OldData']['Provincia']['pro_nombre'] != $this -> requestAction('/provincias/getNombre/'.$data['Canton']['provincia_id'])) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Provincia</td><td class="audit-data">'. $this -> requestAction('/provincias/getNombre/'.$data['Canton']['provincia_id']) . '</td></tr>';
		$new_data['Despues'] .= '</table>';
		
		return $new_data;
	}

}
