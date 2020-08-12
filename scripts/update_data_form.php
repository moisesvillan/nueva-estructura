<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$return= array();
foreach ($_GET as $key => $value) {
	if (empty($value)) {
		if ($key <> 'database' && $key <> 'id') {
			$array_data[$key]=$value;
		}
	}
}
if (count($array_data) > 0 && array_key_exists('database', $_GET) && isset($array_data)) {

	if (Update($_GET['database'],$array_data,"id='".$_GET['id']."'")) {
		$return['titulo']= 'Formulario enviado con exito';
		$return['descripcion']= 'los datos fueron actualizados con exito';
	}else{
		$return['titulo']= 'Error al procesar los datos';
		$return['descripcion']= 'los datos no pudieron ser actualizados con exito por favor verificar';
	}
}else{
	$return['titulo']= 'Error al procesar los datos';
	$return['descripcion']= 'Campos vacios o incorrectos';
}
echo json_encode($return);