<?php
App::uses('AppController', 'Controller');
/**
 * EspeciesValoradas Controller
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class EspeciesValoradasController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('verificarEspecieArtesano');
	}
	
	/**
	 * Verificar si un artesano tiene una especie valorada
	 * @param int $artesano_id ID del artesano
	 * @param int $tipo_especie_id ID del tipo de especie
	 * @return Array con la especie valorada o vacío si no la tiene
	 */
	public function verificarEspecieArtesano($artesano_id = null, $tipo_especie_id = null) {
		if ($artesano_id && $tipo_especie_id) {
			$ventasEspecie = $this -> EspeciesValorada -> VentasEspecie -> find('list', array('conditions' => array('VentasEspecie.artesano_id' => $artesano_id), 'fields' => array('VentasEspecie.id')));
			if ($ventasEspecie) {
				$especieValorada = $this -> EspeciesValorada -> find('first', array('conditions' => array('EspeciesValorada.ventas_especie_id' => $ventasEspecie, 'EspeciesValorada.tipos_especies_valorada_id' => $tipo_especie_id), 'order' => array('EspeciesValorada.created' => 'DESC')));
				return $especieValorada;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}

}
