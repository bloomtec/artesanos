<?php
App::uses('AppController', 'Controller');
/**
 * EspeciesValoradas Controller
 *
 * @property EspeciesValorada $EspeciesValorada
 */
class EspeciesValoradasController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('verificarEspecieArtesano');
	}
	
	public function verificarEspecieArtesano($artesano_id = null, $tipo_especie_id = null) {
		if($artesano_id && $tipo_especie_id) {
			$ventasEspecie = $this -> EspeciesValorada -> VentasEspecie -> find(
				'list',
				array(
					'conditions' => array(
						'VentasEspecie.artesano_id' => $artesano_id
					),
					'fields' => array(
						'VentasEspecie.id'
					)
				)
			);
			if($ventasEspecie) {
				$especieValorada = $this -> EspeciesValorada -> find(
					'first',
					array(
						'conditions' => array(
							'EspeciesValorada.ventas_especie_id' => $ventasEspecie,
							'EspeciesValorada.tipos_especies_valorada_id' => $tipo_especie_id
						),
						'order' => array(
							'EspeciesValorada.created' => 'DESC'
						)
					)
				);
				return $especieValorada;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}
	
}
