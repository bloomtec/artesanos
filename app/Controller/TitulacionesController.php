<?php
App::uses('AppController', 'Controller');
/**
 * Titulaciones Controller
 *
 * @property Titulacion $Titulacion
 */
class TitulacionesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('verificarTituloRamaArtesano');
	}
	
	public function verificarTituloRamaArtesano($artesano_id = null, $rama_id = null) {
		if($artesano_id && $rama_id) {
			$titulos = $this -> Titulacion -> Titulo -> find(
				'list',
				array(
					'fields' => array(
						'Titulo.id'
					),
					'conditions' => array(
						'Titulo.rama_id' => $rama_id
					)
				)
			);
			$solicitudesTitulaciones = $this -> Titulacion -> SolicitudesTitulacion -> find(
				'list',
				array(
					'fields' => array(
						'SolicitudesTitulacion.id'
					),
					'conditions' => array(
						'SolicitudesTitulacion.artesano_id' => $artesano_id
					)
				)
			);
			$titulaciones = $this -> Titulacion -> find(
				'all',
				array(
					'conditions' => array(
						'Titulacion.titulo_id' => $titulos,
						'Titulacion.solicitudes_titulacion_id' => $solicitudesTitulaciones
					),
					'recursive' => -1
				)
			);
			return $titulaciones;
		} else {
			return array();
		}
	}
	
}
