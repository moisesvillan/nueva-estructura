<?php
include 'functions.php';

connect_mysqli();
$ci = $_GET['ci'];
$data = SelectWhere(
	"alumnos.id, CONCAT(alumnos.nombres,' ', alumnos.apellidos) as alumnos,aula.id as id_aula, aula.aula,familiares.id as id_representante,CONCAT(familiares.nombre,' ',familiares.apellido) as representante",
	'alumnos,aula,familiares,pre_incripcion',
	'pre_incripcion.alumno="'.$ci.'" AND alumnos.id="'.$ci.'" AND pre_incripcion.representante = familiares.id AND pre_incripcion.grado = aula.grado');
echo json_encode($data);
?>
