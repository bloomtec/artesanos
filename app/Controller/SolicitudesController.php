<?php
App::uses('AppController', 'Controller');
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
			$this -> request -> data['Solicitud']['sol_fecha_solicitud'] = $now -> format('Y-m-d H:i:s');
			$this -> request -> data['Solicitud']['sol_costos'] = $this -> formatearValor($this -> request -> data['Solicitud']['sol_costos']);
			$this -> request -> data['Solicitud']['sol_esta_aprobada'] = false;
			$this -> Solicitud -> create();
			
			if ($this -> Solicitud -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('La solicitud ha sido guardada'), 'crud/success');
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
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la solicitud. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Solicitud -> read(null, $id);
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
