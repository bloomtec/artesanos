<?php
App::uses('AppController', 'Controller');
App::import('Helper', 'csv');

/**
 * SolicitudesTitulaciones Controller
 *
 * @property SolicitudesTitulacion $SolicitudesTitulacion
 */
class SolicitudesTitulacionesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
	
    public function index() {
        $this -> SolicitudesTitulacion -> recursive = 0;
        $conditions = array();
        if (isset($this -> params['named']['query']) && !empty($this -> params['named']['query'])) {
            //$conditions = $this -> searchFilter($this -> params['named']['query'], array('art_cedula'));
            $query = $this -> params['named']['query'];

            $idsTitulos = $this -> SolicitudesTitulacion -> Titulo -> find('list', array('conditions' => array('OR' => array('Titulo.tit_nombre LIKE' => "%$query%", )), 'fields' => array('Titulo.id')));

            $idsTiposSolicitudes = $this -> SolicitudesTitulacion -> TiposSolicitudesTitulacion -> find('list', array('conditions' => array('OR' => array('TiposSolicitudesTitulacion.tip_nombre LIKE' => "%$query%", )), 'fields' => array('TiposSolicitudesTitulacion.id')));

            $idsArtesanos = $this -> SolicitudesTitulacion -> Artesano -> find('list', array('conditions' => array('OR' => array('Artesano.art_cedula LIKE' => "%$query%", )), 'fields' => array('Artesano.id')));

            $idsEstados = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list', array('conditions' => array('OR' => array('EstadosSolicitudesTitulacion.est_estado LIKE' => "%$query%", )), 'fields' => array('EstadosSolicitudesTitulacion.id')));

            $conditions['OR']['SolicitudesTitulacion.titulo_id'] = $idsTitulos;
            $conditions['OR']['SolicitudesTitulacion.tipos_solicitudes_titulacion_id'] = $idsTiposSolicitudes;
            $conditions['OR']['SolicitudesTitulacion.artesano_id'] = $idsArtesanos;
            $conditions['OR']['SolicitudesTitulacion.estados_solicitudes_titulacion_id'] = $idsEstados;
        }
        if (!empty($conditions)) {
            $this -> paginate = array('conditions' => $conditions);
        }

        $this -> set('solicitudesTitulaciones', $this -> paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this -> SolicitudesTitulacion -> id = $id;
        if (!$this -> SolicitudesTitulacion -> exists()) {
            throw new NotFoundException(__('Solicitud de titulación no válida'));
        }
        $this -> loadModel('Archivo');
        $archivos = $this -> Archivo -> find('all', array('conditions' => array('Archivo.model' => 'SolicitudesTitulacion', 'Archivo.foreign_key' => $id)));
        $this -> set('archivos', $archivos);
        $this -> set('solicitudesTitulacion', $this -> SolicitudesTitulacion -> read(null, $id));
    }

    private function cleanupFiles() {
        $this -> loadModel('Archivo');
        $items = $this -> Archivo -> find('all');
        $db_files = array();
        foreach ($items as $key => $item) {
            $db_files[] = $item['Archivo']['ruta'];
        }
        $dir_files = array();
        $dir_path = APP . 'webroot/files/uploads/solicitudesTitulacion';
        if ($handle = opendir($dir_path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != 'empty' && is_file($dir_path . DS . $entry))
                    $dir_files[] = 'files/uploads/solicitudesTitulacion/' . $entry;
            }
            closedir($handle);
        }
        foreach ($dir_files as $file) {
            if (!in_array($file, $db_files)) {
                $file = explode('/', $file);
                $file = $file[count($file) - 1];
                $tmp_file_path = $dir_path . DS . $file;
                unlink($tmp_file_path);
            }
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this -> request -> is('post')) {
            //debug($this -> request -> data);
            $archivos = null;
            if ($this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 1) {
                $archivos = $this -> request -> data['Archivos1'];
            } elseif ($this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 2 || $this -> request -> data['SolicitudesTitulacion']['tipos_solicitudes_titulacion_id'] == 3) {
                $archivos = $this -> request -> data['Archivos2'];
            }
            // Verificar los documentos requeridos
            $documentosValidos = true;
            foreach ($archivos as $key => $archivo) {
                if ((key($archivo) != 'cedulaMilitar') && $archivo[key($archivo)]['error']) {
                    $documentosValidos = false;
                }
            }
            if ($documentosValidos) {
                $this -> SolicitudesTitulacion -> create();
                if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
                    $this -> loadModel('Archivo');
                    foreach ($archivos as $key => $archivo) {
                        if (!$archivo[key($archivo)]['error']) {
                            $this -> Archivo -> create();
                            $this -> Archivo -> set('model', 'SolicitudesTitulacion');
                            $this -> Archivo -> set('foreign_key', $this -> SolicitudesTitulacion -> id);
                            $now = new DateTime('now');
                            $filename = $now -> format('Y-m-d_H-i-s') . '_' . key($archivo) . '_' . $this -> SolicitudesTitulacion -> id . '_' . $archivo[key($archivo)]['name'];
                            $this -> Archivo -> set('nombre', $filename);
                            $this -> Archivo -> set('ruta', 'files/uploads/solicitudesTitulacion/' . $filename);
                            if ($this -> Archivo -> save()) {
                                $url = 'files/uploads/solicitudesTitulacion/' . $filename;
                                move_uploaded_file($archivo[key($archivo)]['tmp_name'], $url);
                                $this -> cleanupFiles();
                            }
                        }
                    }

                    $this -> Session -> setFlash(__('Se registro la solicitud de titulación'), 'crud/success');
                    $this -> redirect(array('action' => 'index'));
                } else {
                    $this -> Session -> setFlash(__('No se pudo registrar la solicitud de titulación. Por favor, intente de nuevo.'), 'crud/error');
                }
            } else {
                $this -> Session -> setFlash(__('Hace falta un documento requerido. No olvide incluir la cedula militar si aplica.'), 'crud/error');
            }
        }
        $estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
        $titulos = $this -> SolicitudesTitulacion -> Titulo -> find('list');
        $tiposSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> TiposSolicitudesTitulacion -> find('list');
        $artesanos = $this -> SolicitudesTitulacion -> Artesano -> find('list');
        $this -> set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     *
     public function edit($id = null) {
     $this -> SolicitudesTitulacion -> id = $id;
     if (!$this -> SolicitudesTitulacion -> exists()) {
     throw new NotFoundException(__('Solicitud de titulación no válida'));
     }
     if ($this -> request -> is('post') || $this -> request -> is('put')) {
     if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
     $this -> Session -> setFlash(__('The solicitudes titulacion has been saved'), 'crud/success');
     $this -> redirect(array('action' => 'index'));
     } else {
     $this -> Session -> setFlash(__('The solicitudes titulacion could not be saved. Please, try again.'), 'crud/error');
     }
     } else {
     $this -> request -> data = $this -> SolicitudesTitulacion -> read(null, $id);
     }
     $estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
     $titulos = $this -> SolicitudesTitulacion -> Titulo -> find('list');
     $tiposSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> TiposSolicitudesTitulacion -> find('list');
     $artesanos = $this -> SolicitudesTitulacion -> Artesano -> find('list');
     $this -> set(compact('estadosSolicitudesTitulaciones', 'titulos', 'tiposSolicitudesTitulaciones', 'artesanos'));
     }*/

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
        $this -> SolicitudesTitulacion -> id = $id;
        if (!$this -> SolicitudesTitulacion -> exists()) {
            throw new NotFoundException(__('Solicitud de titulación no válida'));
        }
        if ($this -> SolicitudesTitulacion -> delete()) {
            $this -> Session -> setFlash(__('La solicitud fue borrada'), 'crud/success');
            $this -> redirect(array('action' => 'index'));
        }
        $this -> Session -> setFlash(__('La solicitud no pudo ser borrada'), 'crud/error');
        $this -> redirect(array('action' => 'index'));
    }

    public function revision($id = null) {
        if ($this -> request -> is('post') || $this -> request -> is('put')) {
            if ($this -> request -> data['SolicitudesTitulacion']['tipos_especies_valorada_id']) {
                if ($this -> SolicitudesTitulacion -> save($this -> request -> data)) {
                    $this -> Session -> setFlash(__('Se registró el cambio'), 'crud/success');
                    $this -> redirect(array('action' => 'index'));
                } else {
                    $this -> Session -> setFlash(__('No se pudo registrar el cambio. Por favor, intente de nuevo.'), 'crud/error');
                    $this -> redirect(array('action' => 'index'));
                }
            } else {
                $this -> Session -> setFlash(__('No se pudo registrar el cambio. Seleccione el tipo de especie valorada. Por favor, intente de nuevo.'), 'crud/error');
                $this -> redirect(array('action' => 'index'));
            }
        } else {
            if (!$id) {

            } else {
                $this -> loadModel('Archivo');
                $archivos = $this -> Archivo -> find('all', array('conditions' => array('Archivo.model' => 'SolicitudesTitulacion', 'Archivo.foreign_key' => $id)));
                //$estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find('list');
                $estadosSolicitudesTitulaciones = $this -> SolicitudesTitulacion -> EstadosSolicitudesTitulacion -> find("list", array("fields" => array("id", "est_estado")));
                unset($estadosSolicitudesTitulaciones[4]); //Quito el estado de refrendado
                //debug($estadosSolicitudesTitulaciones);
                $tiposEspeciesValoradas = $this -> SolicitudesTitulacion -> TiposEspeciesValorada -> find('list');
                $this -> set(compact('estadosSolicitudesTitulaciones', 'tiposEspeciesValoradas'));
                $this -> set('archivos', $archivos);
                $solicitud = $this -> SolicitudesTitulacion -> read(null, $id);
                $this -> request -> data = $solicitud;
                //$this -> set('solicitud', $solicitud);
            }
        }
    }

    public function reporte() {
        if ($this -> request -> is('post')) {
            if (!empty($this -> request -> data['VentasEspecie']['fecha_inicio']) && !empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
                $conditions = array('VentasEspecie.created BETWEEN ? AND ?' => array($this -> request -> data['VentasEspecie']['fecha_inicio'], $this -> request -> data['VentasEspecie']['fecha_fin'] . " 23:59:59"));
                $this -> paginate = array('conditions' => $conditions);
                $this -> Session -> delete('conditions');
                $this -> Session -> write('conditions', $conditions);
                $this -> set('ingresos', $this -> paginate());
            } elseif (!empty($this -> request -> data['VentasEspecie']['fecha_inicio'])) {
                $conditions = array('VentasEspecie.created >=' => $this -> request -> data['VentasEspecie']['fecha_inicio']);
                $this -> paginate = array('conditions' => $conditions);
                $this -> Session -> delete('conditions');
                $this -> Session -> write('conditions', $conditions);
                $this -> set('ingresos', $this -> paginate());
            } elseif (!empty($this -> request -> data['VentasEspecie']['fecha_fin'])) {
                $conditions = array('VentasEspecie.created <=' => $this -> request -> data['VentasEspecie']['fecha_fin'] . " 23:59:59");
                $this -> paginate = array('conditions' => $conditions);
                $this -> Session -> delete('conditions');
                $this -> Session -> write('conditions', $conditions);
                $this -> set('ingresos', $this -> paginate());
            } else {
                $this -> set('ingresos', $this -> paginate());
            }
        }
        if (isset($this -> params['named']['sort'])) {
            $this -> paginate = array('conditions' => $this -> Session -> read('conditions'));
            $this -> set('ingresos', $this -> paginate());
        }
    }

    public function imprimirReporte() {
        $this -> layout = 'pdf2';
        $nombre_archivo = "ReporteSolicitudesTitulaciones";
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

    function reporteSolicitudesTitulacion() {
        $this -> SolicitudesTitulacion -> recursive = 0;
        $this -> loadModel("Rama", true);
        $this -> loadModel("Titulo", true);
        $this -> loadModel("Artesano", true);

        $reporte = false;

        $pagina = "";
        if (isset($this -> params['named']['page'])) {
            $pagina = $this -> params['named']['page'];
        } else if (isset($this -> params["named"]["sort"])) {
            $pagina = true;
        } else {
            $pagina = false;
        }

        if ($this -> request -> is('post') or $pagina != false) {
            $conditions = array();

            if ($pagina == false) {
                $rama = $this -> data["Reporte"]["rama"];
                $titulo = $this -> data["Reporte"]["titulo"];
                $fecha1 = $this -> data["Reporte"]["fecha1"];
                $fecha2 = $this -> data["Reporte"]["fecha2"];

                if (!empty($artesano)) {
                    //Id de las titulaciones donde un artesano x
                    //$idArtesanos = $this -> SolicitudesTitulacion -> find("list", array("fields" => array("id"), "conditions" => array("SolicitudesTitulacion.artesano_id" => $artesano)));
                    $conditions[] = array('SolicitudesTitulacion.artesano_id' => $artesano);
                }

                if (!empty($rama)) {
                    $idTitulos = $this -> Titulo -> find("list", array("fields" => array("id"), "conditions" => array("Titulo.rama_id" => $rama)));
                    $conditions[] = array('SolicitudesTitulacion.titulo_id' => $idTitulos);
                }

                if (!empty($titulo)) {
                    $conditions[] = array('SolicitudesTitulacion.titulo_id' => $titulo);
                }

                if ($fecha1 != null && $fecha2 != null) {

                    if ($fecha1 > $fecha2) {
                        $this -> Session -> setFlash(__('La fecha inicial debe ser menor a la fecha final', true));
                        return;
                    }

                    list($ano, $mes, $dia) = explode("-", $fecha1);
                    $fecha1 = $ano . "-" . $mes . "-" . ($dia);

                    list($ano, $mes, $dia) = explode("-", $fecha2);

                    if ($dia == 31) {
                        $fecha2 = $ano . "-" . $mes . "-" . ($dia);
                    } else {
                        $fecha2 = $ano . "-" . $mes . "-" . ($dia + 1);
                    }

                    $conditions[] = array('SolicitudesTitulacion.created between ? and ?' => array($fecha1, $fecha2));

                } else if ($fecha1 != null) {
                    $conditions[] = array('SolicitudesTitulacion.created >=' => $fecha1);
                } else if ($fecha2 != null) {
                    $conditions[] = array('SolicitudesTitulacion.created <=' => $fecha2);
                }
            }

            $this -> paginate = array('SolicitudesTitulacion' => array('limit' => 20, 'conditions' => $conditions));
            $reporteSolicitudesTitulacion = $this -> paginate('SolicitudesTitulacion');

            //debug($reporteSolicitudesTitulacion); return;
            $this -> Session -> write('reporte', $reporteSolicitudesTitulacion);
            $this -> Session -> write('archivo', "ReporteSolicitudesTitulacion");
            $cabeceras = array('Id solicitud', 'Titulo', 'Estado', 'Tipo solicitud', 'Artesano', 'Mensaje', 'Fecha');
            $reporte = true;
            $this -> set(compact('reporteSolicitudesTitulacion', 'reporte'));

        }

        $idArtesanosSolitudesTitulacion = $this -> SolicitudesTitulacion -> find("list", array("fields" => "artesano_id"));
        $artesanos = $this -> Artesano -> find("list", array("conditions" => array("Artesano.id" => $idArtesanosSolitudesTitulacion)));
        $ramas = $this -> Rama -> find("list");
        $titulos = $this -> Titulo -> find("list");
		$this -> set('fechaActual', date('Y-m-d', strtotime('now')));
        $this -> set(compact('ramas', "titulos", "reporte", "artesanos"));
    }

    //Reporte solicitudes titulaciones
    function impReporte() {
        $this -> layout = 'pdf2';
        $reporteSolicitudesTitulacion = $this -> Session -> read('reporte');
        $nombre_archivo = $this -> Session -> read('archivo');
        //Tamaño de la fuente
        $tamano = 5;
        //debug($reporteSolicitudesTitulacion);
        $this -> set(compact('reporteSolicitudesTitulacion', 'nombre_archivo', 'tamano'));
    }

    //Reporte titulaciones
    function impReporte2() {
        $this -> layout = 'pdf2';
        $reporteTitulaciones = $this -> Session -> read('reporte');
        $nombre_archivo = "ReporteTitulaciones";
        //Tamaño de la fuente
        $tamano = 5;
        //debug($reporteSolicitudesTitulacion);
        $this -> set(compact('reporteTitulaciones', 'nombre_archivo', 'tamano'));
    }

    //CSV solicitudes titulaciones
    function export_csv2() {
        $this -> layout = "";
        $this -> render(false);

        $csv = new csvHelper();
        $reporteSolicitudesTitulacion = $this -> Session -> read('reporte');
        $cabeceras = array('Id solicitud', 'Titulo', 'Estado', 'Tipo solicitud', 'Artesano', 'Mensaje', 'Fecha');
        $csv -> addRow($cabeceras);

        for ($i = 0; $i < count($reporteSolicitudesTitulacion); $i++) {
            $filas = array($reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['id'], $reporteSolicitudesTitulacion[$i]['Titulo']['tit_nombre'], $reporteSolicitudesTitulacion[$i]['EstadosSolicitudesTitulacion']['est_estado'], $reporteSolicitudesTitulacion[$i]['TiposSolicitudesTitulacion']['tip_nombre'], $reporteSolicitudesTitulacion[$i]['Artesano']['nombre_completo'], $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['sol_mensaje'], $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['created']);
            $csv -> addRow($filas);
        }

        $titulo = "csvSolicitudesTitulacion_" . date("Y-m-d H:i:s", time()) . ".csv";
        echo $csv -> render($titulo);
    }

    //CSV  titulaciones
    function export_csv3() {
        $this -> layout = "";
        $this -> render(false);

        $csv = new csvHelper();
        $reporteTitulaciones = $this -> Session -> read('reporte');
        $cabeceras = array('Id titulacion', 'Titulo', 'Rama', 'Provincia', 'Cedula artesano', 'Fecha');
        $csv -> addRow($cabeceras);

        for ($i = 0; $i < count($reporteTitulaciones); $i++) {
            $filas = array($reporteTitulaciones[$i]['Titulacion']['id'], $reporteTitulaciones[$i]['Titulo']['tit_nombre'], $reporteTitulaciones[$i]['Titulo']['nom_rama'], $reporteTitulaciones[$i]['JuntasProvincial']['nom_provincia'], $reporteTitulaciones[$i]['SolicitudesTitulacion']['cedula_artesano'], $reporteTitulaciones[$i]['Titulacion']['created']);
            $csv -> addRow($filas);
        }

        $titulo = "csvTitulaciones_" . date("Y-m-d H:i:s", time()) . ".csv";
        echo $csv -> render($titulo);
    }

    function refrendar($idSolicitudTitulacion) {
        //$this -> layout = "";
        //$this -> render(false);
        $this -> SolicitudesTitulacion -> recursive = -1;
        $solicitudTitulacion = $this -> SolicitudesTitulacion -> find("all", array("conditions" => array("SolicitudesTitulacion.id" => $idSolicitudTitulacion)));

        //$idTipoEspecieValorada = $this -> SolicitudesTitulacion -> find("list", array("fields" => array("tipos_especies_valorada_id"), "conditions" => array("SolicitudesTitulacion.id" => $idSolicitudTitulacion)));
        $idTipoEspecieValorada = $solicitudTitulacion[0]["SolicitudesTitulacion"]["tipos_especies_valorada_id"];
        //$idTitulo = $this -> SolicitudesTitulacion -> find("list", array("fields" => array("titulo_id"), "conditions" => array("SolicitudesTitulacion.id" => $idSolicitudTitulacion)));
        $idTitulo = $solicitudTitulacion[0]["SolicitudesTitulacion"]["titulo_id"];
        $idArtesano = $solicitudTitulacion[0]["SolicitudesTitulacion"]["artesano_id"];
        $res = $this -> requestAction('/EspeciesValoradas/verificarEspecieArtesano/' . $idArtesano . "/" . $idTipoEspecieValorada);

        //debug($res); return;

        if (!isset($res['VentasEspecie'])) {//Si existe la venta
            $this -> Session -> setFlash(__('No se puede refrendar el título. El artesano debe comprar la especie valorda requerida', true));
            $this -> redirect(array('action' => 'index'));
        }

        if ($res["EspeciesValorada"]["se_uso"] == 1) {
            $this -> Session -> setFlash(__('No se puede refrendar el título. El artesano debe comprar la especie valorda requerida', true));
            $this -> redirect(array('action' => 'index'));

        } else {
            //Hacer la modificación del campo se_uso y agregar el titulo
            $data = array();
            $this -> loadModel("Titulacion", true);
            $this -> Titulacion -> create();
            $data["Titulacion"]["titulo_id"] = $idTitulo;
            $data["Titulacion"]["solicitudes_titulacion_id"] = $idSolicitudTitulacion;
            $data["Titulacion"]["juntas_provincial_id"] = $res["VentasEspecie"]["juntas_provincial_id"];
            //$data["Titulacion"]["especies_valoradas_id"] = $res["EspeciesValorada"]["id"];
            if ($this -> Titulacion -> save($data)) {
                $this -> loadModel("EspeciesValorada", true);
                $this -> EspeciesValorada -> id = $res["EspeciesValorada"]["id"];
                $data["EspeciesValorada"]["se_uso"] = 1;
                $this -> EspeciesValorada -> save($data);

                //Cambio del estado de la solicitud para indicar que ya se refrendo
                $data = array();
                $this -> SolicitudesTitulacion -> id = $idSolicitudTitulacion;
                $data["SolicitudesTitulacion"]["estados_solicitudes_titulacion_id"] = 4;
                $this -> SolicitudesTitulacion -> save($data);

                $this -> Session -> setFlash(__('El título se ha refrendado satisfactoriamente'), 'crud/success');

            } else {
                //debug($this->Titulacion->validationErrors);
                $this -> Session -> setFlash(__('Error al intentar refrendar', true));
            }
            $this -> redirect(array('action' => 'index'));
        }
    }

    function reporteTitulaciones() {
        $this -> loadModel("JuntasProvincial", true);
        $this -> loadModel("Titulo", true);
        $this -> loadModel("Titulacion", true);
        $this -> loadModel("Artesano", true);
        $this -> loadModel("Rama", true);
        $this -> loadModel("Provincia", true);

        $reporte = false;

        $pagina = "";
        if (isset($this -> params['named']['page'])) {
            $pagina = $this -> params['named']['page'];
        } else if (isset($this -> params["named"]["sort"])) {
            $pagina = true;
        } else {
            $pagina = false;
        }

        if ($this -> request -> is('post') or $pagina != false) {
            $conditions = array();

            if ($pagina == false) {
                $artesano = $this -> data["Reporte"]["artesano"];
                $titulo = $this -> data["Reporte"]["titulo"];
                $provincia = $this -> data["Reporte"]["provincia"];
                $rama = $this -> data["Reporte"]["rama"];
                $fecha1 = $this -> data["Reporte"]["fecha1"];
                $fecha2 = $this -> data["Reporte"]["fecha2"];

                if (!empty($artesano)) {
                    //Id de las titulaciones donde un artesano x
                    $idTitulaciones = $this -> SolicitudesTitulacion -> find("list", array("fields" => array("id"), "conditions" => array("SolicitudesTitulacion.artesano_id" => $artesano)));
                    $conditions[] = array('Titulacion.solicitudes_titulacion_id' => $idTitulaciones);
                }

                if (!empty($titulo)) {
                    $conditions[] = array('Titulacion.titulo_id' => $titulo);
                }

                if (!empty($provincia)) {
                    $idsJuntasProvinciales = $this -> JuntasProvincial -> find("list", array("conditions" => array("JuntasProvincial.provincia_id" => $provincia)));
                    $conditions[] = array('Titulacion.juntas_provincial_id' => $idsJuntasProvinciales);
                }

                if (!empty($rama)) {
                    $idTitulos = $this -> Titulo -> find("list", array("conditions" => array("Titulo.rama_id" => $rama)));
                    $conditions[] = array('Titulacion.titulo_id' => $idTitulos);
                }

                if ($fecha1 != null && $fecha2 != null) {

                    if ($fecha1 > $fecha2) {
                        $this -> Session -> setFlash(__('La fecha inicial debe ser menor a la fecha final', true));
                        return;
                    }

                    list($ano, $mes, $dia) = explode("-", $fecha1);
                    $fecha1 = $ano . "-" . $mes . "-" . ($dia);

                    list($ano, $mes, $dia) = explode("-", $fecha2);

                    if ($dia == 31) {
                        $fecha2 = $ano . "-" . $mes . "-" . ($dia);
                    } else {
                        $fecha2 = $ano . "-" . $mes . "-" . ($dia + 1);
                    }

                    $conditions[] = array('Titulacion.created between ? and ?' => array($fecha1, $fecha2));

                } else if ($fecha1 != null) {
                    $conditions[] = array('Titulacion.created >=' => $fecha1);
                } else if ($fecha2 != null) {
                    $conditions[] = array('Titulacion.created <=' => $fecha2);
                }
            }

            $this -> paginate = array('Titulacion' => array('limit' => 20, 'conditions' => $conditions));
            $reporteTitulaciones = $this -> paginate('Titulacion');

            //Agregar cedula artesano
            for ($i = 0; $i < count($reporteTitulaciones); $i++) {
                foreach ($reporteTitulaciones[$i]['SolicitudesTitulacion'] as $key => $value) {
                    if ($key == "artesano_id") {
                        $ced_artesano = $this -> Artesano -> find("list", array("fields" => array("art_cedula"), "conditions" => array("Artesano.id" => $value)));
                        $cedula = "";
                        foreach ($ced_artesano as $ced_artesano) {
                            $cedula = $ced_artesano;
                        }
                        $reporteTitulaciones[$i]['SolicitudesTitulacion']["cedula_artesano"] = $cedula;
                    }
                }
            }

            //Agregar nombre provincia
            for ($i = 0; $i < count($reporteTitulaciones); $i++) {
                foreach ($reporteTitulaciones[$i]['JuntasProvincial'] as $key => $value) {
                    if ($key == "provincia_id") {
                        $nombre_provincia = $this -> Provincia -> find("list", array("fields" => array("pro_nombre"), "conditions" => array("Provincia.id" => $value)));
                        $nombre = "";
                        foreach ($nombre_provincia as $nombre_provincia) {
                            $nombre = $nombre_provincia;
                        }
                        $reporteTitulaciones[$i]['JuntasProvincial']["nom_provincia"] = $nombre;
                        //debug($nombre_provincia);
                    }
                }
            }

            //Agregar nombre rama
            for ($i = 0; $i < count($reporteTitulaciones); $i++) {
                foreach ($reporteTitulaciones[$i]['Titulo'] as $key => $value) {
                    if ($key == "rama_id") {
                        $nombre_rama = $this -> Rama -> find("list", array("fields" => array("ram_nombre"), "conditions" => array("Rama.id" => $value)));
                        foreach ($nombre_rama as $nombre_rama) {
                            $nombre = $nombre_rama;
                        }
                        $reporteTitulaciones[$i]['Titulo']["nom_rama"] = $nombre_rama;
                        //debug($nombre_rama);
                    }
                }
            }

            //debug($reporteTitulaciones);
            //return;
            $this -> Session -> write('reporte', $reporteTitulaciones);
            $this -> Session -> write('archivo', "$reporteTitulaciones");
            $reporte = true;
            $this -> set(compact('reporteTitulaciones', 'reporte'));

        }

        $provincias = $this -> JuntasProvincial -> Provincia -> find("list");
        //Solamente los titulos que han sido otorgados
        $idsTitulosOtorgados = $this -> Titulacion -> find("list", array("fields" => array("titulo_id")));
        $titulos = $this -> Titulo -> find("list", array("conditions" => array("Titulo.id" => $idsTitulosOtorgados)));
        //Solamente artesanos que han solicitado titulacion
        $idArtesanosSolitudesTitulacion = $this -> SolicitudesTitulacion -> find("list", array("fields" => "artesano_id"));
        $artesanos = $this -> Artesano -> find("list", array("conditions" => array("Artesano.id" => $idArtesanosSolitudesTitulacion)));
        $ramas = $this -> Titulo -> Rama -> find("list");
		$this -> set('fechaActual', date('Y-m-d', strtotime('now')));
        $this -> set(compact('provincias', "titulos", "reporte", 'ramas', 'especiesValoradas', 'artesanos'));
    }

}
