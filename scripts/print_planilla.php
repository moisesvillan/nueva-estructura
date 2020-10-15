<?php

include 'functions.php';

connect_mysqli();

$data=SelectWhere(
	'alumnos.*,grados.grado,familiares.*,periodo_escolar.titulo,datos_emergencia.*',
	"pre_incripcion, alumnos, grados, familiares, periodo_escolar,datos_emergencia",
	"pre_incripcion.alumno='".$_GET['alumno']."' AND pre_incripcion.representante=familiares.id AND pre_incripcion.grado=grados.id AND pre_incripcion.perido_escolar=periodo_escolar.id AND alumnos.id=datos_emergencia.id"
);
var_dump($data);
?>