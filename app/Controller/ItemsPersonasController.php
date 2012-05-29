<?php
App::uses('AppController', 'Controller');
/**
 * ItemsPersonas Controller
 *
 * @property ItemsPersona $ItemsPersona
 */
class ItemsPersonasController extends AppController {
	
	/**
	 * Reporte de asignaciones
	 * @return void
	 */
	public function reporteAsignaciones() {
		if (isset($this -> params['named']['page']) || isset($this -> params["named"]["sort"])) {
			$conditions = $this -> Session -> read('condiciones');
			$this -> paginate = array('conditions' => $conditions);
			$asignaciones = $this -> paginate();
			$this -> set('asignaciones', $asignaciones);
			$this -> set('reporte', true);
		} elseif ($this -> request -> is('post')) {
			$this -> request -> data['ItemsPersona']['fecha_inicio'] = $this -> request -> data['ItemsPersona']['fecha_inicio'] . ' 00:00:00';
			$this -> request -> data['ItemsPersona']['fecha_fin'] = $fechaFin = $this -> request -> data['ItemsPersona']['fecha_fin'] . ' 23:59:59';

			$conditions = array();

			if ($this -> request -> data['ItemsPersona']['item_id']) {
				$conditions['ItemsPersona.item_id'] = $this -> request -> data['ItemsPersona']['item_id'];
			}

			if ($this -> request -> data['ItemsPersona']['persona_id']) {
				$conditions['ItemsPersona.persona_id'] = $this -> request -> data['ItemsPersona']['persona_id'];
			}

			$conditions['ItemsPersona.modified BETWEEN ? AND ?'] = array($this -> request -> data['ItemsPersona']['fecha_inicio'], $this -> request -> data['ItemsPersona']['fecha_fin']);

			$this -> Session -> delete('condiciones');
			$this -> Session -> write('condiciones', $conditions);
			$this -> paginate = array('conditions' => $conditions);
			$asignaciones = $this -> paginate();
			$this -> set('asignaciones', $asignaciones);
			$this -> set('reporte', true);
		} else {
			$itemes = $this -> ItemsPersona -> Item -> find('list', array('conditions' => array('Item.ite_is_activo_fijo' => 1)));
			$personas = $this -> ItemsPersona -> Persona -> find('list');
			$departamentos = $this -> ItemsPersona -> getValores(14);
			$fechaActual = date('Y-m-d', strtotime('now'));
			$this -> set(compact('itemes', 'personas', 'departamentos', 'fechaActual'));
			$this -> set('reporte', false);
		}
	}
	
	/**
	 * Descargar reporte
	 * @return void
	 */
	public function descargarReporte() {
		$this -> layout = 'pdf2';
		$conditions = $this -> Session -> read('condiciones');
		$this -> paginate = array('conditions' => $conditions);
		$asignaciones = $this -> paginate();
		$this -> set('asignaciones', $asignaciones);
		//Tamaño de la fuente
		$this -> set('tamano', 5);
		$this -> set('nombre_archivo', 'reporte_asignaciones');
	}

}
