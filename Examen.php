<?php 

	class Examen{

		//Atributos de la clase Examen, generalmente privados
		//Fecha en la que se realizara el examen
		private $fecha;
		//La nota del examen
		private $nota;

		//Redefinimos el constructor de la clase para añadir la fecha en el momento de la creacción y por defecto la nota
		//será 0, si no se llegara a realizar el examen esa sería la calificación
		public function __construct($fecha){
			$this->set_fecha($fecha);
			$this->calificar_examen(0);
		}

		public function set_fecha($fecha){
			$this->fecha = $fecha;
		}

		public function get_fecha(){
			return $this->fecha;
		}

		public function calificar_examen($nota){
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

		public function __tostring(){
			return "Fecha: ".$this->get_fecha()."<br />Calificación: ".$this->get_nota();

		}
	}
 ?>