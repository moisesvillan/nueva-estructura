<?php
include 'functions.php';

connect_mysqli();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$data = SelectWhere(
	'alumnos.nombres, alumnos.apellidos, incripcion.grado',
	'incripcion,alumnos',
	"familiares='".$_GET['q']."' AND año_escolar='".$periodo['0']['id']."'"
);
$array = array();
$count_Data = count($data);
if ($count_Data>0) {
	$array['hermanos']=str_pad($count_Data, 2, '0', STR_PAD_LEFT);
	$array['ci']=$_GET['q'];
}else{
	$count_Data++;
	$array['hermanos']=str_pad($count_Data, 2, '0', STR_PAD_LEFT);
	$array['ci']=$_GET['q'];
}
echo json_encode($array);