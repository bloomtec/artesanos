<?php
class AuditableBehavior extends ModelBehavior {
	
	public function setup(Model $Model, $settings) {
		$this -> Model = $Model;
	    if (!isset($this->settings[$Model->alias])) {
	        $this->settings[$Model->alias] = array(
	            
	        );
	    }
   	 	$this->settings[$Model->alias] = array_merge(
        $this->settings[$Model->alias], (array)$settings);
	}
	
    public function beforeSave() {
        if($this -> Model -> id){
        	//EDICION
        	$this -> Model -> recursive = -1;
        	$oldData = $this -> Model -> findById($this -> Model -> id);
        $this -> oldData = array($this -> Model -> id => $oldData);
        }else{
        	// CREACION
        	
        }
        //do something
        return true;
    }
	public function afterSave($created){
		if(isset($this -> oldData[$this -> Model -> id]) && isset($_SESSION)){
			//EDICION
			App::import("Model", "Auditoria"); 
			$this -> Auditoria = new Auditoria;
			$this -> Auditoria -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $_SESSION['Auth']['User']['id'],
				'aud_nombre_modelo' => $this -> Model -> alias,
				'aud_llave_foranea' => $this -> Model -> id,
				'aud_datos_previos' => $this -> parseData($this -> oldData[$this -> Model -> id]),
				'aud_datos_nuevos' =>$this -> parseData($this -> Model -> data),
				'aud_add' => false,
				'aud_edit' => true,
				'aud_delete' => false
			);
			
			$this -> Auditoria -> save($auditoria);
			unset($this -> oldData[$this -> Model -> id]);
		}else{
			//CREACION
			if(isset($_SESSION)){
				App::import("Model", "Auditoria"); 
				$this -> Auditoria = new Auditoria;
				$this -> Auditoria -> create();
				
				$auditoria['Auditoria'] = array(
					'usuario_id' => $_SESSION['Auth']['User']['id'],
					'aud_nombre_modelo' => $this -> Model -> alias,
					'aud_llave_foranea' => $this -> Model -> id,
					'aud_datos_previos' => 'No existen datos previos',
					'aud_datos_nuevos' =>  $this -> parseData($this -> Model -> data),
					'aud_add' => true,
					'aud_edit' => false,
					'aud_delete' => false
				);
				
				$this -> Auditoria -> save($auditoria);
			}
		}
		return true;
	}
	function beforeDelete(){
		if($this -> Model -> id){
        	//EDICION
        	$this -> Model -> recursive = -1;
        	$oldData = $this -> Model -> findById($this -> Model -> id);
        	$this -> oldData = array($this -> Model -> id => $oldData);
        }
	
		return true;
	}
	function afterDelete(){
		if(isset($_SESSION)){
			App::import("Model", "Auditoria"); 
			$this -> Auditoria = new Auditoria;
			$this -> Auditoria -> create();
			$auditoria['Auditoria'] = array(
				'usuario_id' => $_SESSION['Auth']['User']['id'],
				'aud_nombre_modelo' => $this -> Model -> alias,
				'aud_llave_foranea' => $this -> Model -> id,
				'aud_datos_previos' => $this -> parseData($this -> oldData[$this -> Model -> id]),
				'aud_datos_nuevos' => 'No existen datos nuevos',
				'aud_add' => false,
				'aud_edit' => false,
				'aud_delete' => true
			);
		$this -> Auditoria -> save($auditoria);
		}
		unset($this -> oldData[$this -> Model -> id]);
		return true;
	}
	private function parseData($data){
		$newData="";
		if($data){
		foreach($data as $alias => $rows){
			$newData.='<div class="audit">';
			foreach($rows as $row => $value){
				$newData.="<div class='audit-entity'>";
					$newData.="<label>";
						$newData.=$row;
					$newData.="</label>";
					$newData.="<span>";
						$newData.=$value;
					$newData.="</span><div style='clear:both'></div>";
				$newData.="</div>";
			}
			$newData.='</div>';
		}	
		}
		return $newData;
	}
}