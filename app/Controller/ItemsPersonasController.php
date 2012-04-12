<?php
App::uses('AppController', 'Controller');
/**
 * ItemsPersonas Controller
 *
 * @property ItemsPersona $ItemsPersona
 */
class ItemsPersonasController extends AppController {
	
	public function reporteAsignaciones() {
		$itemes = $this -> ItemsPersona -> Item -> find('list');
		$personas = $this -> ItemsPersona -> Persona -> find('list');
		$departamentos = $this -> ItemsPersona -> getValores(14);
		$this -> set(compact('itemes', 'personas', 'departamentos'));
	}
	
}
