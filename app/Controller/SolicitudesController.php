<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');

/**
 * Solicitudes Controller
 *
 * @property Solicitud $Solicitud
 */
class SolicitudesController extends AppController {
	
	private function formatearValor($valor = null) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		return $valor;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Solicitud -> recursive = 0;
		$this->Recursive=0;
		$conditions = array();
		if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
			//$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
			$query = $this -> params['named']['query'];
			
			$idsSolicitudes = $this -> Solicitud -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'Solicitud.sol_nombre_de_la_capacitacion LIKE' => "%$query%",
							'Solicitud.sol_numero_de_memorandum LIKE' => "%$query%"
						)
					),
					'fields' => array(
						'Solicitud.id'
					)
				)
			);
			
			
			$idsJuntas = $this -> Solicitud -> JuntasProvincial -> find(
				'list',
				array(
					'conditions' => array(
						'OR' => array(
							'JuntasProvincial.jun_nombre LIKE' => "%$query%",
						)
					),
					'fields' => array(
						'JuntasProvincial.id'
					)
				)
			);
				
			$conditions['OR']['Solicitud.id'] = $idsSolicitudes;
			$conditions['OR']['Solicitud.juntas_provincial_id'] = $idsJuntas;
		}
		if(!empty($conditions)) {
			$this -> paginate = array('conditions' => $conditions);
		}
		
		$this -> set('solicitudes', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$this -> set('solicitud', $this -> Solicitud -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$now = new DateTime('now');
			$this -> request -> data['Solicitud']['sol_estado'] = 1;
			$this -> request -> data['Solicitud']['sol_fecha_solicitud'] = $now -> format('Y-m-d H:i:s');
			$this -> request -> data['Solicitud']['sol_costos'] = $this -> formatearValor($this -> request -> data['Solicitud']['sol_costos']);
			$this -> request -> data['Solicitud']['sol_esta_aprobada'] = false;
			$this -> Solicitud -> create();
			
			if ($this -> Solicitud -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La solicitud ha sido guardada'), 'crud/success');
				/*ENVIAR CORREO ELECTRONICO AL LOS CORREOS QUE ESTAN EN EL PARAMETRO DE correos_solicitudes*/
				$this -> loadModel('Configuracion');
				$configuracion = $this -> Configuracion -> read(null,1);
				CakeEmail::deliver($configuracion['Configuracion']['con_correos_solicitudes'], 'Solicitud de curso','Tiene una nueva solicitud de creación de cursos en el sistema: '.$this -> request -> data['Solicitud']['sol_nombre_de_la_capacitacion'], array('from' => array('no-reply@jnda.gob.ec' => 'JNDA SOLICITUDES')));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la solicitud. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$juntasProvinciales = $this -> Solicitud -> JuntasProvincial -> find('list');
		$this -> set(compact('juntasProvinciales'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Solicitud no valida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> request -> data['Solicitud']['sol_costos'] = $this -> formatearValor($this -> request -> data['Solicitud']['sol_costos']);
			if ($this -> Solicitud -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La solicitud ha sido guardada'), 'crud/success');
				CakeEmail::deliver($configuracion['Configuracion']['con_correos_solicitudes'], 'Solicitud de curso','Se modifico una solicitud en el sistema: '.$this -> request -> data['Solicitud']['sol_nombre_de_la_capacitacion'], array('from' => array('no-reply@jnda.gob.ec' => 'JNDA SOLICITUDES')));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la solicitud. Por favor, intente de nuevo.'), 'crud/error');
				
			}
		} else {
			$this -> request -> data = $this -> Solicitud -> read(null, $id);
			$this -> request -> data['Solicitud']['sol_costos'] = 100 * $this -> request -> data['Solicitud']['sol_costos'] ;
		}
		$juntasProvinciales = $this -> Solicitud -> JuntasProvincial -> find('list');
		$this -> set(compact('juntasProvinciales'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Solicitud no valida'));
		}
		if ($this -> Solicitud -> delete()) {
			$this -> Session -> setFlash(__('Solicitud borrada'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('La Solicitud no fue borrada'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}
	
	public function aprobar($id = null){
		$this -> Solicitud -> id = $id;
		if (!$this -> Solicitud -> exists()) {
			throw new NotFoundException(__('Solicitud no valida'));
		}
		$solicitud = $this -> Solicitud -> read(null,$id);
		$solicitud['Solicitud']['sol_estado']=2;//estado 2 aprobada
		if($this->Solicitud->save($solicitud)){
			$curso['Curso']=array(
				"solicitud_id"=>$solicitud['Solicitud']['id'],
				"cur_nombre"=>$solicitud['Solicitud']['sol_nombre_de_la_capacitacion'],
				"cur_fecha_de_inicio"=>$solicitud['Solicitud']['sol_fecha_inicio_de_la_capacitacion'],
				"cur_fecha_de_fin"=>$solicitud['Solicitud']['sol_fecha_de_fin_de_la_capacitacion'],
				"cur_costo"=>$solicitud['Solicitud']['sol_costos'],
			);
			if($this -> Solicitud -> Curso -> save($curso)){
					$this -> Session -> setFlash(__('Se ha aprobado la solicitud.'), 'crud/success');
					$this -> redirect(array('controller'=>'cursos','action' => 'edit',$this -> Solicitud -> Curso -> id));
			}else{
				
			}	
		}
	}

}
