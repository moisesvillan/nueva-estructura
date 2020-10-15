<?php
include 'functions.php';

connect_mysqli();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$data = SelectWhere(
	'count(alumno)',
	'incripcion',
	"representante='".$_GET['q']."' AND año_escolar='".$periodo['0']['id']."'"
);
$array = array();
$count_Data = 0;
$count_Data2 = 0;
$count_Data = count($data);
if ($count_Data>0) {
	$count_Data++;
	$array['hermanos']=str_pad($count_Data, 2, '0', STR_PAD_LEFT);
	$array['ci']=$_GET['q'];
}else{
	$data2 = SelectWhere(
	'count(alumno)',
	'pre_incripcion',
	"representante='".$_GET['q']."' AND perido_escolar='".$periodo['0']['id']."'"
	);
	$count_Data2 = count($data2);
	if($count_Data2>0){
		$count_Data++;
		$array['hermanos']=str_pad($count_Data2, 2, '0', STR_PAD_LEFT);
		$array['ci']=$_GET['q'];
	}else{
		$count_Data++;
		$array['hermanos']=str_pad($count_Data, 2, '0', STR_PAD_LEFT);
		$array['ci']=$_GET['q'];
	}
	
}
echo json_encode($array);