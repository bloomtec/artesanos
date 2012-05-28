<?php
App::uses('AppController', 'Controller');
/**
 * Titulaciones Controller
 *
 * @property Titulacion $Titulacion
 */
class TitulacionesController extends AppController {
	
	/**
	 * Definir características que se requieren globalmente por esta clase.
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('verificarTituloRamaArtesano');
	}
	
	/**
	 * Verificar si un artesano tiene un titulo en una rama
	 * 
	 * @param int $artesano_id ID del artesano que será validado
	 * @param int $rama_id ID de la rama que será validada
	 */
	public function verificarTituloRamaArtesano($artesano_id, $rama_id) {
		if($artesano_id && $rama_id) {
			$titulos = $this -> Titulacion -> Titulo -> find(
				'list',
				array(
					'fields' => array(
						'Titulo.id'
					),
					'conditions' => array(
						'Titulo.rama_id' => $rama_id
					),
					'recursive' => -1
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
					),
					'recursive' => -1
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
