<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$data = SelectWhere('alumnos.id, concat(alumnos.nombres," ",alumnos.apellidos) nombre','incripcion, alumnos',"aula='".$_GET['q']."' AND año_escolar='".$periodo['0']['id']."' AND incripcion.alumno=alumnos.id");
if (count($data)>0) {
	foreach ($data as $value) {
		$array_data[]= array(
			"id"=> $value['id'],
			"error"=> false,
			"Nombre"=> $value['nombre']
		);
	}
}else{
	$array_data['id']= NULL;
	$array_data['error']= true;
	$array_data['Nombre']= 'NO HAY DATOS REGISTRADOS';
}
echo json_encode($array_data);
?>