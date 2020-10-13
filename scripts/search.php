<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$data = SelectWhere('*','incripcion',"aula='".$_GET['q']."' AND año_escolar='".$periodo['0']['id']."'");
if (count($data)>0) {
	foreach ($data as $value) {
		$array_data['id']= $value['id'];
		$array_data['error']= false;
		$array_data['Nombre']= $value['nombres'].' '.$value['apellidos'];
	}
}else{
	$array_data['id']= NULL;
	$array_data['error']= true;
	$array_data['Nombre']= 'NO HAY DATOS REGISTRADOS';
}
echo json_encode($array_data);
?>