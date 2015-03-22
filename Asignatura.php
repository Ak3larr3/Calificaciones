<?php

	//Incluimos la clase Examen que vamos a utilizar en esta
	//Usamos require_once de este modo evitamos incluir varias veces la misma clase
	require_once('Examen.php');

	class Asignatura{

		//Atributos de la clase Asignatura, generalmente privados
		//El nombre de la asignatura será el elemento identificador de la misma
		private $nombre;		

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

		public function __tostring(){
			return "Asignatura ".$this->get_nombre().":<br />";
		}
	}
 ?>