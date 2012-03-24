<?php
class CrearAlumnosShell extends AppShell {
	
	public $uses = array('Alumno');
	
	private $cantidad = 0;
	private $nacionalidades = array();
	private $tipos_de_sangre = array();
	private $estados_civiles = array();
	private $grados_de_estudio = array();
	private $sexos = array();

	public function main() {
		if(!empty($this -> args[0]) && is_numeric($this -> args[0])) {
			$this -> cantidad = $this -> args[0];
			$this -> obtenerDatos();
			$this -> crearAlumnos();
		} else {
			$this -> out('Debe ingresar un número como parametro');
		}
	}
	
	private function crearAlumnos() {
		for(; $this -> cantidad > 0;) {
			$alumno = array(
				'Alumno' => array(
					'alu_nacionalidad' => $this -> nacionalidades[rand(0, count($this -> nacionalidades) - 1)],
					'alu_is_cedula' => false,
					'alu_documento_de_identificacion' => rand(94000000, 95000000),
					'alu_apellido_paterno' => $this -> getUniqueCode(),
					'alu_apellido_materno' => $this -> getUniqueCode(),
					'alu_nombres' => $this -> getUniqueCode(),
					'alu_fecha_de_nacimiento' => rand(1980, 1992) . '-' . rand(1, 12) . '-' . rand(1, 28),
					'alu_tipo_de_sangre' => $this -> tipos_de_sangre[rand(0, count($this -> tipos_de_sangre) - 1)],
					'alu_estado_civil' => $this -> estados_civiles[rand(0, count($this -> estados_civiles) - 1)],
					'alu_grado_de_estudio' => $this -> grados_de_estudio[rand(0, count($this -> grados_de_estudio) - 1)],
					'alu_sexo' => $this -> sexos[rand(0, count($this -> sexos) - 1)]
				)
			);
			$this -> Alumno -> create();
			if($this -> Alumno -> save($alumno)) $this -> cantidad -= 1; 
		}
	}
	
	private function obtenerDatos() {
		$this -> nacionalidades = array_keys($this -> Alumno -> getValores(1));
		$this -> tipos_de_sangre = array_keys($this -> Alumno -> getValores(2));
		$this -> estados_civiles = array_keys($this -> Alumno -> getValores(3));
		$this -> grados_de_estudio = array_keys($this -> Alumno -> getValores(4));
		$this -> sexos = array_keys($this -> Alumno -> getValores(5));
	}
	
	private function getUniqueCode($length = "") {
		$code = md5(uniqid(rand(), true));
		if ($length != "") return substr($code, 0, $length);
		else return $code;
	}

}
