<?php

	//Incluimos la clase Asignautra que vamos a utilizar en esta
	//Usamos require_once de este modo evitamos incluir varias veces la misma clase
	require_once('Asignatura.php');

	class Alumno{

		//Atributos de la clase Alumno, las características que tiene un alumno, generalmente privados
		private $nombre;
		private $apellidos;
		private $dni;

		//Los alumnos pueden matricularse en varias asignaturas así que usamos un array de objetos Asignatura
		//Para nombres de variables array se suele usar el plural porque almacena varios elementos
		private $asignaturas;
		private $examenes;


		//Métodos de la clasem Alumno, aquí definimos las acciones que un alumno puede realizar

		//Constructor de la clase, lo redefinimos nosotros para que cuando creemos un alumno ya lo hagaos con los atributos
		//así no tenemos que utilizar todos los métodos set uno a uno		
		public function __construct($nombre,$apellidos,$dni){
			//Lo recomendable para establecer los atributos es usar los métodos set de la propia clase
			//$this se refiere siempre al atributo de la propia clase que declaramos previamente como private $nombre $apellidos y $dni
			$this->set_nombre($nombre);
			$this->set_apellidos($apellidos);
			$this->set_dni($dni);
			$this->asignaturas = array();
			$this->examenes = array();
		}

		//Establece como nombre del alumno el que le pasamos en el parametro $nombre
		public function set_nombre($nombre){			
			$this->nombre = $nombre;
		}

		//Nos devuelve el nombre del alumno
		public function get_nombre(){
			return $this->nombre;
		}

		//Establece los apellidos del alumno que pasamos mediante el parametro $apellidos
		public function set_apellidos($apellidos){
			$this->apellidos = $apellidos;			
		}

		//Nos devuelve los apellidos del alumno
		public function get_apellidos(){
			return $this->apellidos;
		}

		//Estable el dni del alumno que pasamos como parametro $dni
		public function set_dni($dni){
			$this->dni = $dni;
		}

		//Nos devuelve el dni del alumno
		public function get_dni(){
			return $this->dni;
		}


		//Matricula al alumno en una asignatura, esto se traduce en programación como añadir un elemento al array de
		//asignaturas
		public function matricular_asignatura($asignatura){

			//Antes de añadir la asignatura comprobamos que el alumno no esté ya matriculado
			//Usamos una variable que nos servirá como aviso			
			$no_matriculado=true;

			//Declaramos una variable error que nos devolvera un mensaje con el exito o fracaso a la hora de realizar la matrícula
			$error="";

			//Recorremos el array de asignaturas, $asignatura_matriculada será cada asignatura que tenemos en el array $asignaturas
			
			foreach ($this->asignaturas as $asignatura_matriculada) {
				//Comprobamos si el nombre de la asignatura que tenemos en nuestro array coincide con el nombre de la asignatura
				//que queremos matricular, si coincide es que ya tenemos esa asignatura matriculada y lo indicaremos gracias al aviso
				//que declaramos antes $no_matriculado que ahora será falso porque ya está matriculada
				//Indicamos con un mensaje de error que el alumno ya está matriculado en esa asignatura
				if(strcmp($asignatura_matriculada->get_nombre(), $asignatura->get_nombre())==0){
					$no_matriculado=false;
					$error="El Alumno ".$this->get_nombre()." ya está matriculado en ".$asignatura->get_nombre();
				}
			}

			//Después de comprobar que el alumno no esté ya matriculado añadimos la asignatura al array de asignaturas
			//y lo indicamos en el mensaje de retorno
			if($no_matriculado){
				//Añade el elemento en último lugar del array
				$this->asignaturas[] = $asignatura;
				$error="El Alumno ".$this->get_nombre()." se ha matriculado correctanmente en ".$asignatura->get_nombre();
			}

			return $error;
		}

		public function buscar_asignatura($nombre){
			$asignatura_buscada = null;

			foreach ($this->asignaturas as $asignatura_matriculada) {
				if(strcmp($asignatura_matriculada->get_nombre(), $nombre) == 0){
					$asignatura_buscada = $asignatura_matriculada;
				}
			}
			return $asignatura_buscada;
		}

		//Devuelve el número de asignaturas en las que está matriculado un alumno
		public function asignaturas_matriculadas(){
			return count($this->asignaturas);
		}

		//Añade examenes, le pasamos como parametro el examen
		public function incluir_examen($examen){
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
		public function promedio($asignatura){
			
			$suma_notas=0;
			$numero_exmanes=0;

			foreach ($this->examenes as $examen_realizado) {
				if(strcmp($examen_realizado->get_asignatura(), $asignatura) == 0){
					$suma_notas+=$examen_realizado->get_nota();
					$numero_exmanes++;
				}			
			}
			
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

		//Devuelve un string con todos los datos del alumno
		public function __tostring(){
			$retorno = "Alumno: ".$this->get_nombre()." ".$this->get_apellidos()." DNI: ".$this->get_dni()."<br />";
			if($this->asignaturas_matriculadas() == 0){
				$retorno .= "El alumno no se ha matriculado en ninguna asignatura.";
			}else{
				$retorno .= "Asignaturas:<br />";
				foreach ($this->asignaturas as $asignatura_matriculada) {
					$retorno .= $asignatura_matriculada;
				}
			}

			if($this->examenes_realizados() == 0){
				$retorno .= "El alumno no ha realizado examenes.";
			}else{
				$retorno .= "Examenes:<br />";
				foreach ($this->examenes as $examen_realizado) {
					$retorno .= $examen_realizado;
				}
			}
			return $retorno;
		}
	}
 ?>