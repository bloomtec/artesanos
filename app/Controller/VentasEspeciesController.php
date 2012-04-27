<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');
/**
 * VentasEspecies Controller
 *
 * @property VentasEspecie $VentasEspecie
 */
class VentasEspeciesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	
	
	
	public function index() {
		$this -> VentasEspecie -> recursive = 0;
		$this -> set('ventasEspecies', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		$this -> paginate = array('EspeciesValorada' => array('limit' => 10, 'conditions' => array('EspeciesValorada.ventas_especie_id' => $id)));
		$especiesValoradas = $this -> paginate('EspeciesValorada');
		$this -> set('especiesValoradas', $especiesValoradas);
		$this -> set('ventasEspecie', $this -> VentasEspecie -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$factura = array('Factura' => $this -> request -> data['Factura']);
			$infoVentaEspeciesValoradas = $this -> request -> data['EspeciesValorada'];
			$ventasEspecie = array('VentasEspecie' => $this -> request -> data['VentasEspecie']);
			unset($ventasEspecie['VentasEspecie']['what_is']);
			unset($ventasEspecie['VentasEspecie']['juntas_provincial_id']);
			unset($ventasEspecie['VentasEspecie']['cedula_artesanos']);
			unset($this -> request -> data['Factura']);
			unset($this -> request -> data['EspeciesValorada']);
			unset($this -> request -> data['VentasEspecie']);
			//debug($ventasEspecie);
			//debug($factura);
			//debug($infoVentaEspeciesValoradas);
			// Generar la factura
			$this -> VentasEspecie -> Factura -> create();
			if($this -> VentasEspecie -> Factura -> save($factura)) {
				// Generación de la venta asociada a la factura
				$facturaId = $this -> VentasEspecie -> Factura -> id;
				
				// Calcular la cantidad y el valor total de la venta
				$totalCantidad = 0;
				$totalValor = 0;
				foreach($infoVentaEspeciesValoradas as $key => $infoVenta) {
					// Si hay cantidad de especie crear
					if($infoVenta['cantidad'] > 0) {
						$totalCantidad += $infoVenta['cantidad'];
						// Obtener el valor unitario de la especie en cuestión
						$tipoEspecie = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find(
							'first',
							array(
								'conditions' => array(
									'TiposEspeciesValorada.id' => $infoVenta['tipos_especies_valorada_id']
								),
								'recursive' => -1
							)
						);
						$totalValor += $infoVenta['cantidad'] * $tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario'];
					}
				}
				
				$ventasEspecie['VentasEspecie']['ven_cantidad'] = $totalCantidad;
				$ventasEspecie['VentasEspecie']['ven_valor'] = $totalValor;
				$ventasEspecie['VentasEspecie']['factura_id'] = $facturaId;
				
				// Crear la venta
				$this -> VentasEspecie -> create();
				if($this -> VentasEspecie -> save($ventasEspecie)) {
					$ventasEspecieId = $this -> VentasEspecie -> id;
					// Recorrer los tipos de especie para asignar las especies valoradas a la venta
					foreach($infoVentaEspeciesValoradas as $key => $infoVenta) {
						// Si hay cantidad de especie crear
						if($infoVenta['cantidad'] > 0) {
							for ($tmp = $infoVenta['cantidad']; $tmp > 0; $tmp -= 1) {
								$especieValorada = $this -> VentasEspecie -> EspeciesValorada -> find(
									'first',
									array(
										'conditions' => array(
											'EspeciesValorada.tipos_especies_valorada_id' => $infoVenta['tipos_especies_valorada_id'],
											'EspeciesValorada.ventas_especie_id' => null
										),
										'recursive' => -1
									)
								);
								$especieValorada['EspeciesValorada']['ventas_especie_id'] = $ventasEspecieId;
								$this -> VentasEspecie -> EspeciesValorada -> save($especieValorada);
							}
						} // endif;
					} // endforeach;
				}
				
				$this -> Session -> setFlash('La venta fue registrada satisfactoriamente', 'crud/success');
				//$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('No se registró la venta. Por favor, intente de nuevo', 'crud/error');
			}
			
			
			/* CODIGO ANTERIOR
			if ((!$this -> request -> data['VentasEspecie']['juntas_provincial_id'] && $this -> request -> data['VentasEspecie']['artesano_id']) || ($this -> request -> data['VentasEspecie']['juntas_provincial_id'] && !$this -> request -> data['VentasEspecie']['artesano_id'])) {

				$this -> VentasEspecie -> create();

				$this -> request -> data['VentasEspecie']['ven_cantidad'] = 0;
				$this -> request -> data['VentasEspecie']['ven_valor'] = 0;

				//debug($this -> request -> data);
				foreach ($this -> request -> data['EspeciesValorada'] as $key => $datosEspecieValorada) {
					//debug($datosEspecieValorada);
					if ($datosEspecieValorada['cantidad']) {
						$tipoEspecie = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> read(null, $datosEspecieValorada['tipos_especies_valorada_id']);
						$this -> request -> data['VentasEspecie']['ven_valor'] += ($tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario'] * $datosEspecieValorada['cantidad']);
						$this -> request -> data['VentasEspecie']['ven_cantidad'] += $datosEspecieValorada['cantidad'];
					}
				}

				if ($this -> VentasEspecie -> save($this -> request -> data)) {
					//debug($this -> request -> data);
					foreach ($this -> request -> data['EspeciesValorada'] as $key => $datosEspecieValorada) {
						//debug($datosEspecieValorada);
						if ($datosEspecieValorada['cantidad']) {
							for ($tmp = $datosEspecieValorada['cantidad']; $tmp > 0; $tmp -= 1) {
								$especieValorada = $this -> VentasEspecie -> EspeciesValorada -> find('first', array('conditions' => array('EspeciesValorada.tipos_especies_valorada_id' => $datosEspecieValorada['tipos_especies_valorada_id'], 'EspeciesValorada.ventas_especie_id' => null), 'recursive' => -1));

								$especieValorada['EspeciesValorada']['ventas_especie_id'] = $this -> VentasEspecie -> id;
								//debug($especieValorada);
								$this -> VentasEspecie -> EspeciesValorada -> save($especieValorada);
							}
						}
					}

					$this -> Session -> setFlash(__('Se registró la venta de especie valorada'), 'crud/success');
					$this -> redirect(array('action' => 'index'));
				} else {
					$this -> Session -> setFlash(__('No se registró la venta de especie valorada. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this -> Session -> setFlash('La venta de especies es para un individuo o una junta provincial', 'crud/error');
			}
			*/
		}
		$juntasProvinciales = $this -> VentasEspecie -> JuntasProvincial -> find('list');
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all',array('conditions'=>array('TiposEspeciesValorada.total_especies_para_vender >'=>0), 'recursive' => -1));
		$this -> set(compact('juntasProvinciales', 'tiposEspeciesValorada'));

		//Para el modal agregar artesano
		$this -> loadModel("Artesano", true);
		$nacionalidades = $this -> Artesano -> getValores(1);
		$tipos_de_sangre = $this -> Artesano -> getValores(2);
		$estados_civiles = $this -> Artesano -> getValores(3);
		$grados_de_estudio = $this -> Artesano -> getValores(4);
		$sexos = $this -> Artesano -> getValores(5);
		$tipos_de_discapacidad = $this -> Artesano -> getValores(6);
		$this -> set(compact('nacionalidades', 'tipos_de_sangre', 'estados_civiles', 'grados_de_estudio', 'sexos', 'tipos_de_discapacidad'));
		$this -> set('fecha', date('Y-m-d', strtotime('now')));
	}

	public function addToOthers() {
		if($this -> request -> data){
			$factura = array('Factura' => $this -> request -> data['Factura']);
			$infoVentaEspeciesValoradas = $this -> request -> data['EspeciesValorada'];
			unset($this -> request -> data['Factura']);
			unset($this -> request -> data['EspeciesValorada']);
			// Generar la factura
			$this -> VentasEspecie -> Factura -> create();
			if($this -> VentasEspecie -> Factura -> save($factura)) {
				// Generación de ventas asociadas a la factura
				$facturaId = $this -> VentasEspecie -> Factura -> id;
				foreach($infoVentaEspeciesValoradas as $key => $infoVenta) {
					// Si hay artesanos definidos recorrerlos para crear la venta
					if(isset($infoVenta['Artesanos']) && !empty($infoVenta['Artesanos']) && $infoVenta['cantidad'] > 0) {
						// Obtener el valor unitario de la especie en cuestión
						$tipoEspecie = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find(
							'first',
							array(
								'conditions' => array(
									'TiposEspeciesValorada.id' => $infoVenta['tipos_especies_valorada_id']
								),
								'recursive' => -1
							)
						);
						foreach($infoVenta['Artesanos'] as $key => $artesanoId) {
							// Arreglo que representa el objeto VentasEspecie
							$ventaEspecie = array(
								'VentasEspecie' => array(
									'factura_id' => $facturaId,
									'artesano_id' => $artesanoId,
									'ven_cantidad' => 1,
									'ven_valor' => $tipoEspecie['TiposEspeciesValorada']['tip_valor_unitario']
								)
							);
							$this -> VentasEspecie -> create();
							if($this -> VentasEspecie -> save($ventaEspecie)) {
								$ventasEspecieId = $this -> VentasEspecie -> id;
								$especieValorada = $this -> VentasEspecie -> EspeciesValorada -> find(
									'first',
									array(
										'conditions' => array(
											'EspeciesValorada.tipos_especies_valorada_id' => $infoVenta['tipos_especies_valorada_id'],
											'EspeciesValorada.ventas_especie_id' => null
										),
										'recursive' => -1
									)
								);
								$especieValorada['EspeciesValorada']['ventas_especie_id'] = $ventasEspecieId;
								$this -> VentasEspecie -> EspeciesValorada -> save($especieValorada);
							}
						} // endforeach;
					} // endif;
				} // endforeach;
				$this -> Session -> setFlash('Se generó la venta', 'crud/success');
				//$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash('No se pudo completar la venta', 'crud/error');
			}
		}
		$tiposEspeciesValorada = $this -> VentasEspecie -> EspeciesValorada -> TiposEspeciesValorada -> find('all',array('conditions'=>array('TiposEspeciesValorada.total_especies_para_vender >'=>0), 'recursive' => -1));
		//debug($tiposEspeciesValorada);
		$this -> set('fecha', date('Y-m-d', strtotime('now')));
		$this -> set(compact('tiposEspeciesValorada'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> VentasEspecie -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se registró la venta de especie valorada'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se registró la venta de especie valorada. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> VentasEspecie -> read(null, $id);
		}
		$juntasProvinciales = $this -> VentasEspecie -> JuntasProvincial -> find('list');
		$artesanos = $this -> VentasEspecie -> Artesano -> find('list');
		$especiesValoradas = $this -> VentasEspecie -> EspeciesValorada -> find('list');
		$this -> set(compact('juntasProvinciales', 'artesanos', 'especiesValoradas'));
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
		$this -> VentasEspecie -> id = $id;
		if (!$this -> VentasEspecie -> exists()) {
			throw new NotFoundException(__('Venta De Especie no válida'));
		}
		if ($this -> VentasEspecie -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la venta de especie'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la venta de especie'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

	public function reporte() {
		if ($this -> request -> is('post')) {
			if (!empty($this -> request -> data['VentasEspecie']['fecha_inicio']) && !empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array(
					'VentasEspecie.created BETWEEN ? AND ?' => array(
						$this -> request -> data['VentasEspecie']['fecha_inicio']." 00:00:00",
						$this -> request -> data['VentasEspecie']['fecha_fin']." 23:59:59"
					)
				);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$ingresos = $this -> paginate();
				//debug($ingresos);
				$this -> set('ingresos', $ingresos);
			} elseif (!empty($this -> request -> data['VentasEspecie']['fecha_inicio'])) {
				$conditions = array('VentasEspecie.created >=' => $this -> request -> data['VentasEspecie']['fecha_inicio']);
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$ingresos = $this -> paginate();
				//debug($ingresos);
				$this -> set('ingresos', $ingresos);
			} elseif (!empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
				$conditions = array('VentasEspecie.created <=' => $this -> request -> data['VentasEspecie']['fecha_fin']." 23:59:59");
				$this -> paginate = array('conditions' => $conditions);
				$this -> Session -> delete('conditions');
				$this -> Session -> write('conditions', $conditions);
				$ingresos = $this -> paginate();
				//debug($ingresos);
				$this -> set('ingresos', $ingresos);
			} else {
				$this -> set('ingresos', $this -> paginate());
			}
		}
		if (isset($this -> params['named']['sort'])) {
			$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
			$ingresos = $this -> paginate();
			//debug($ingresos);
			$this -> set('ingresos', $ingresos);
		}
		$this -> set('fechaActual', date('Y-m-d', strtotime('now')));
	}

	public function imprimirReporte() {
		$this -> layout = 'pdf4';
		$nombre_archivo = "ReporteVentasEspecies";
		$tamano = 5;
		$this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
		$ingresos = $this -> paginate();
		$this -> set(compact('ingresos', 'nombre_archivo', 'tamano'));
	}

	function export_csv() {

		$this -> layout = "";
		$this -> render(false);

		$csv = new csvHelper();
		$reporteIngresos = $this -> Session -> read('reporteIngresos');

		$cabeceras = array('Proveedor', 'Ciudad', 'Persona', '# Memorando', 'Asunto', 'Sub total', 'IVA', 'Total', 'Items', 'Fecha');

		$csv -> addRow($cabeceras);

		for ($i = 0; $i < count($reporteIngresos); $i++) {
			$items = "";
			foreach ($reporteIngresos[$i]['Item'] as $key => $value) {
				if ($reporteIngresos[$i]['Item'] != array())
					if ($items == "") {
						$items = $value['ite_nombre'];
					} else {
						$items = $items . ' ' . $value['ite_nombre'];
					}
			}

			$filas = array($reporteIngresos[$i]['Proveedor']['pro_nombre_razon_social'], $reporteIngresos[$i]['Ciudad']['ciu_nombre'], $reporteIngresos[$i]['Persona']['per_nombres'], $reporteIngresos[$i]['IngresosDeInventario']['ing_numero_de_memorandum'], $reporteIngresos[$i]['IngresosDeInventario']['ing_asunto'], $reporteIngresos[$i]['IngresosDeInventario']['ing_subtotal'], $reporteIngresos[$i]['IngresosDeInventario']['ing_iva'], $reporteIngresos[$i]['IngresosDeInventario']['ing_total'], $items, $reporteIngresos[$i]['IngresosDeInventario']['created']);

			$csv -> addRow($filas);

		}
		$titulo = "csvVentasEspecies_" . date("Y-m-d H:i:s", time()) . ".csv";
		echo $csv -> render($titulo);
	}
	
	public function factura($idFactura = null) {
		$this->layout="factura";
		$this->loadModel("Factura");
		$ventaEspecie = $this->Factura->find("all", array("conditions"=>array("Factura.id"=>$idFactura)));
		$idVenta = $ventaEspecie[0]["VentasEspecie"][0]["id"];
		$this->loadModel("EspeciesValorada");
		$this->EspeciesValorada->recursive=-1;
		$especiesValoradas = $this->EspeciesValorada->find("all", array("conditions"=>array("EspeciesValorada.ventas_especie_id"=>$idVenta)));
		$iva = $this -> requestAction('/configuraciones/getValorConfiguracion/' . "con_iva");
		$this -> set(compact('ventaEspecie','especiesValoradas','iva'));
		//debug($especieValorada);
	}
    
   public function ventas() {
      $this->Recursive=0;
        $conditions = array();
        if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
            //$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
            $query = $this -> params['named']['query'];
            
			$this->loadModel("Factura");      
            $idsFacturas = $this ->Factura -> find(
            'list',
                array(
                    'conditions' => array(
                        'OR' => array(
                            'Factura.fac_numero LIKE' => "%$query%",
                            'Factura.fac_comprobante_deposito LIKE' => "%$query%",
                            'Factura.fac_cliente LIKE' => "%$query%",
                        )
                    ),
                    'fields' => array(
                        'Factura.id'
                    )
                )
            );
           
            
            $conditions['OR']['Factura.id'] = $idsFacturas;
            
            if(!empty($conditions)) {
                    $this -> paginate = array('conditions' => $conditions);
                }
            
            $ventasEspecies = $this -> paginate();
            $this -> set(compact('ventasEspecies'));
        }else {
           
          $idsFacturas = $this->VentasEspecie->find("list", array("fields"=>array("factura_id")));
          $ventasEspecies = $this->VentasEspecie->Factura->find("all", array("conditions"=>$idsFacturas)); 
          $this -> paginate = array('order' => array("Factura.id"=>'desc'),"conditions"=>array("VentasEspecie.factura_id <>"=>null));
          $ventasEspecies = $this->paginate();
          //$conditions['Factura.id'] = $idsFacturas;
          //$this -> paginate = array('conditions'=>$conditions);
          //$this -> paginate = array('order' => array("Factura.id"=>'desc'));
          $this->set(compact("ventasEspecies"));
      }
   }
	
}
