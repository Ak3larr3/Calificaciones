<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php 
	
	require_once('Curso.php');
	require_once('Alumno.php');
	require_once('Asignatura.php');
	require_once('Examen.php');

	$asignatura1 = new Asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR");
	$asignatura2 = new Asignatura("ELABORACIÓN DE DOCUMENTOS WEB MEDIANTE LENGUAJES DE MARCAS");

	$asignaturas[] = $asignatura1;
	$asignaturas[] = $asignatura2;
	$curso1 = new Curso("DESARROLLO DE APLICACIONES CON TECNOLOGÍA WEB",$asignaturas);

	$alumno1 = new Alumno("Ricardo","Fernandez García","10342289K");
	$alumno2 = new Alumno("Cecilia","Perez Alonso","71239145C");
	$alumno3 = new Alumno("Gustavo","Ruiz García","45678901E");
	$alumno4 = new Alumno("Roberto","Alonso García","12345678D");
	$alumno5 = new Alumno("Carlos","Perez García","10763901E");
	$alumno6 = new Alumno("Sergio","Gonzalez García","10349278B");
	$alumno7 = new Alumno("Eduardo","Diaz Alonso","11456978D");
	$alumno8 = new Alumno("Ceci","Fernandez García","70345678D");
	$alumno9 = new Alumno("Diana","Perez Diaz","10645678F");
	$alumno10 = new Alumno("Patry","Fernandez García","71345578D");
	$alumno11 = new Alumno("Ivan","Diaz García","10445678C");
	$alumno12 = new Alumno("Willy","Alonso García","70345678D");
	$alumno13 = new Alumno("Loli","Gonzalez Diaz","70349278P");

	$curso1->inscribir_alumno($alumno1);
	$curso1->inscribir_alumno($alumno2);
	$curso1->inscribir_alumno($alumno3);
	$curso1->inscribir_alumno($alumno4);
	$curso1->inscribir_alumno($alumno5);
	$curso1->inscribir_alumno($alumno6);
	$curso1->inscribir_alumno($alumno7);
	$curso1->inscribir_alumno($alumno8);
	$curso1->inscribir_alumno($alumno9);
	$curso1->inscribir_alumno($alumno10);
	$curso1->inscribir_alumno($alumno11);
	$curso1->inscribir_alumno($alumno12);
	$curso1->inscribir_alumno($alumno13);

	$alumno1->incluir_examen(new Examen("13-4-2015",8,$alumno1->buscar_asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR")));
	$alumno1->incluir_examen(new Examen("25-4-2015",6,$alumno1->buscar_asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR")));
	
	echo $curso1;

	echo "<br /><br />El promedio del alumno es: ".$alumno1->promedio($alumno1->buscar_asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR"));
	


	/*
	$asignatura1 = new Asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR");
	$asignatura2 = new Asignatura("ELABORACIÓN DE DOCUMENTOS WEB MEDIANTE LENGUAJES DE MARCAS");	

	$alumno1 = new Alumno("Loli","Fernandez García","23456789K");
	$alumno2 = new Alumno("Willy","Fernandez García","34567890C");
	$alumno3 = new Alumno("Patry","Fernandez García","45678901E");
	$alumno4 = new Alumno("Diana","Fernandez García","12345678D");

	
	$asignaturas[] = $asignatura1;
	$asignaturas[] = $asignatura2;
	$curso1 = new Curso("DESARROLLO DE APLICACIONES CON TECNOLOGÍA WEB",$asignaturas);

	$curso1->inscribir_alumno($alumno1);
	$curso1->inscribir_alumno($alumno2);
	$curso1->inscribir_alumno($alumno3);
	$curso1->inscribir_alumno($alumno4);

	$examen1 = new Examen("13-4-2015");
	$asignatura1->planificar_examen($examen1);

	echo $alumno1->get_nombre();
	echo $asignatura1->get_nombre();
	*/
	

 ?>
 </body>
</html>
