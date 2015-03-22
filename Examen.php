<?php 

	class Examen{

		//Atributos de la clase Examen, generalmente privados
		//Fecha en la que se realizara el examen
		private $fecha;
		//La nota del examen
		private $nota;

		private $asignatura;

		//Redefinimos el constructor de la clase para añadir la fecha en el momento de la creacción
		
		public function __construct($fecha, $nota, $asignatura){
			$this->set_fecha($fecha);
			$this->set_nota($nota);
			$this->set_asignatura($asignatura);
		}

		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}

		public function get_fecha(){
			return $this->fecha;
		}

		public function set_nota($nota){
			$error =  "";
			if($nota>=0 && $nota<=10){
				$this->nota=$nota;
				$error = "La calificación del examen ha sido de: ".$nota;
			}else{
				$error = "La calificación no es valida. (0-10)";
			}

			return $error;
		}

		public function get_nota(){
			return $this->nota;
		}

		public function set_asignatura($asignatura){
			$this->asignatura = $asignatura;
		}

		public function get_asignatura(){
			return $this->asignatura;
		}

		public function __tostring(){
			return $this->get_asignatura()."Fecha: ".$this->get_fecha()."<br />Calificación: ".$this->get_nota()."<br />";

		}
	}
 ?>