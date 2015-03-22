<?php 
	
	require_once('Alumno.php');

	class Curso{

		private $nombre;
		private $alumnos;
		private $asignaturas;

		public function __construct($nombre,$asignaturas){
			$this->set_nombre($nombre);
			$this->set_asignaturas($asignaturas);
		}

		public function set_nombre($nombre){
			$this->nombre = $nombre;
		}

		public function get_nombre(){
			return $this->nombre;
		}

		public function set_asignaturas($asignaturas){
			$this->asignaturas = $asignaturas;
		}

		public function inscribir_alumno($alumno){
			foreach ($this->asignaturas as $asignatura) {
				$alumno->matricular_asignatura($asignatura);
			}
			$this->alumnos[] = $alumno;
		}

		public function alumnos_inscritos(){
			return count($this->alumnos);
		}

		public function __tostring(){
			$retorno = "Alumnos matriculados en el curso ".$this->get_nombre()."<br />";
			if($this->alumnos_inscritos() == 0){
				$retorno .= "No hay alumnos inscritos en el curso.";
			}else{				
				foreach ($this->alumnos as $alumno_inscrito) {
					$retorno .= $alumno_inscrito."<br /><br />";
				}
			}
			return $retorno;
		}
	}

 ?>