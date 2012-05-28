<?php
App::uses('AppModel', 'Model');
App::uses('Auditoria', 'Model');
/**
 * Configuracion Model
 *
 */
class Configuracion extends AppModel {
	
	public $actsAs = array('Auditable');
	
	public $currentUsrId = -1;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'con_anos_renovacion_artesanos_autonomos' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'con_anos_renovacion_artesanos_normales' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'con_anos_pasar_de_aprendiz_a_operario' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'con_anos_operario_se_pueda_calificar' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function beforeSave($model) {
	    if(isset($this -> data['Configuracion']['id'])) {
			$this -> data['OldData'] = $this -> find('first', array('conditions' => array('Configuracion.id' => $this -> data['Configuracion']['id'])));
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
				'aud_nombre_modelo' => 'Configuracion',
				'aud_llave_foranea' => 1,
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
				'aud_nombre_modelo' => 'Configuracion',
				'aud_llave_foranea' => 1,
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
			$new_data['Antes'] .= '<caption>Parámetros De Configuración</caption>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Capital Máximo De Inversión</td><td class="audit-data">'. $data['OldData']['Configuracion']['con_capital_maximo_de_inversion'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Salario Básico Unificado</td><td class="audit-data">' . $data['OldData']['Configuracion']['con_salario_basico_unificado'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Años Para Renovación Artesanos Autónomos</td><td class="audit-data">' . $data['OldData']['Configuracion']['con_anos_renovacion_artesanos_autonomos'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Años Para Renovación Artesanos Normales</td><td class="audit-data">' . $data['OldData']['Configuracion']['con_anos_renovacion_artesanos_normales'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Años Para Pasar De Aprendiz A Operario</td><td class="audit-data">' . $data['OldData']['Configuracion']['con_anos_pasar_de_aprendiz_a_operario'] . '</td></tr>';
			$new_data['Antes'] .= '<tr><td class="audit-value">Años Para Que Un Operario Se Pueda Calificar</td><td class="audit-data">' . $data['OldData']['Configuracion']['con_anos_operario_se_pueda_calificar'] . '</td></tr>';
			$new_data['Antes'] .= '</table>';
		}
		
		// Registrar la información nueva
		$class = null;
		$new_data['Despues'] .= '<table class="audit-table">';
		$new_data['Despues'] .= '<caption>Parámetros De Configuración</caption>';
		if(isset($data['OldData']['Configuracion']['con_capital_maximo_de_inversion'])) {
			if($data['OldData']['Configuracion']['con_capital_maximo_de_inversion'] != $data['Configuracion']['con_capital_maximo_de_inversion']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Capital Máximo De Inversión</td><td class="audit-data">'. $data['Configuracion']['con_capital_maximo_de_inversion'] . '</td></tr>';
		if(isset($data['OldData']['Configuracion']['con_salario_basico_unificado'])) {
			if($data['OldData']['Configuracion']['con_salario_basico_unificado'] != $data['Configuracion']['con_salario_basico_unificado']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Salario Básico Unificado</td><td class="audit-data">' . $data['Configuracion']['con_salario_basico_unificado'] . '</td></tr>';
		if(isset($data['OldData']['Configuracion']['con_anos_renovacion_artesanos_autonomos'])) {
			if($data['OldData']['Configuracion']['con_anos_renovacion_artesanos_autonomos'] != $data['Configuracion']['con_anos_renovacion_artesanos_autonomos']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Años Para Renovación Artesanos Autónomos</td><td class="audit-data">' . $data['Configuracion']['con_anos_renovacion_artesanos_autonomos'] . '</td></tr>';
		if(isset($data['OldData']['Configuracion']['con_anos_renovacion_artesanos_normales'])) {
			if($data['OldData']['Configuracion']['con_anos_renovacion_artesanos_normales'] != $data['Configuracion']['con_anos_renovacion_artesanos_normales']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Años Para Renovación Artesanos Normales</td><td class="audit-data">' . $data['Configuracion']['con_anos_renovacion_artesanos_normales'] . '</td></tr>';
		if(isset($data['OldData']['Configuracion']['con_anos_pasar_de_aprendiz_a_operario'])) {
			if($data['OldData']['Configuracion']['con_anos_pasar_de_aprendiz_a_operario'] != $data['Configuracion']['con_anos_pasar_de_aprendiz_a_operario']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Años Para Pasar De Aprendiz A Operario</td><td class="audit-data">' . $data['Configuracion']['con_anos_pasar_de_aprendiz_a_operario'] . '</td></tr>';
		if(isset($data['OldData']['Configuracion']['con_anos_operario_se_pueda_calificar'])) {
			if($data['OldData']['Configuracion']['con_anos_operario_se_pueda_calificar'] != $data['Configuracion']['con_anos_operario_se_pueda_calificar']) {
				$class = 'diferente';
			} else {
				$class = 'igual';
			}
		} else {
			$class = 'igual';
		}
		$new_data['Despues'] .= '<tr class="' . $class . '"><td class="audit-value">Años Para Que Un Operario Se Pueda Calificar</td><td class="audit-data">' . $data['Configuracion']['con_anos_operario_se_pueda_calificar'] . '</td></tr>';
		$new_data['Despues'] .= '</table>';
		
		return $new_data;
	}
	
}
