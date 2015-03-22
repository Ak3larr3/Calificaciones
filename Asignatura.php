<?php

	//Incluimos la clase Examen que vamos a utilizar en esta
	//Usamos require_once de este modo evitamos incluir varias veces la misma clase
	require_once('Examen.php');

	class Asignatura{

		//Atributos de la clase Asignatura, generalmente privados
		//El nombre de la asignatura será el elemento identificador de la misma
		private $nombre;

		//Una asignatura puede tener varios examenes como bien sabemos de este curso :P
		//usamos un nombre de variable en plural porque vamos a contener varios elementos
		private $examenes;

		//Métodos de la clase Asignatura

		//Redefinimos el constructor de la clase para poder crear Asignaturas con sus caracteristicas ya definidas
		//en este caso sólo el nombre
		public function __construct($nombre){
			//Lo recomendable para establecer los atributos es usar los métodos set de la propia clase
			//$this se refiere siempre al atributo de la propia clase que declaramos previamente como private $nombre
			$this->set_nombre($nombre);
		}

		//Establece como nombre de la asignatura el que le pasamos en el parametro $nombre
		public function set_nombre($nombre){			
			$this->nombre = $nombre;
		}

		//Nos devuelve el nombre de la asignatura
		public function get_nombre(){
			return $this->nombre;
		}

		//Añade examenes de la asinatura, le pasamos como parametro el examen
		public function planificar_examen($examen){
			//Añade el examen en la última posición del array
			$this->examenes[]=$examen;
		}

		public function buscar_examen($fecha){
			$exame_buscado = null;

			foreach ($this->examenes as $examen_realizado) {
				if(strcmp($examen_realizado->get_fecha(), $fecha) == 0){
					$examen_buscado = $examen_realizado;
				}
			}
			return $examen_buscado;
		}

		//Nos devuelve la media de las notas de los examenes
		public function promedio(){
			//Variable donde sumamos las notas de todos los examenes de la asignatura
			$suma_notas=0;
			//Recorreos todos los examenes obteniendo las notas de los mismos y los sumamos
			//lo almacenaos en la variable $suma_notas		
			foreach ($examenes as $examen_realizado) {
				$suma_notas+=$examen_realizado->get_nota();				
			}			
			//Obtenemos el número de examenes realizados para comprobar que no sea mayor que 0 y así evitar la división por 0
			$numero_exmanes=count($examenes);
			//Si no se han realizado examenes forzamos la división para que el resultado sea -1, así podremos usar este
			//resultado a modo de mensaje de error
			if($numero_exmanes==0){
				$numero_exmanes=-1;
				$suma_notas=1;
			}
			//Dividimos la suma de todas las notas por el número total de examenes pera obtener la media
			return ($suma_notas/$numero_exmanes);
		}

		public function examenes_realizados(){
			return count($this->examenes);
		}

		public function __tostring(){			
			$retorno = "Asignatura ".$this->get_nombre().":<br />";

			if($this->examenes_realizados() == 0){
				$retorno .= "El alumno no ha realizado ningún examen de esta asignatura.";
			}else{
				$retorno .= "Examenes realizados:<br />";
				foreach ($this->examenes as $examen_realizado) {
					$retorno .= $examen_realizado."<br />";
				}
			}
			return $retorno;
		}
	}
 ?>