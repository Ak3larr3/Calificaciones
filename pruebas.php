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

	$alumno1 = new Alumno("Loli","Fernandez García","23456789K");
	$alumno2 = new Alumno("Willy","Fernandez García","34567890C");
	
	$asignatura1 = new Asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR");
	

	$examen1 = new Examen("13-4-2015");
	

	$alumno1->matricular_asignatura($asignatura1);
	$alumno2->matricular_asignatura($asignatura1);


	$asignatura1->planificar_examen($examen1);

	echo "<br />";

	echo $alumno1;

	$alumno1->buscar_asignatura("DESARROLLO DE APLICACIONES WEB EN EL ENTORNO SERVIDOR")->buscar_examen("13-4-2015")->calificar_examen(8);
	
	echo "<br />".$alumno1;

	echo "<br />".$alumno2;



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
