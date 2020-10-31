<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$data = SelectAll('*','horario');
if (count($data)>0) {
	foreach ($data as $key => $value) {
		$array_data[$key]=$value;		
	}
	for ($i=0; $i < count($array_data); $i++) { 
		
		foreach ($array_data[$i] as $key => $value) {
			if(empty($value)){
				unset($array_data[$i][$key]);
			}
		}
	}
	
}
echo json_encode($array_data);
?>