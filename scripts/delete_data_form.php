<?php
include 'functions.php';

connect_mysqli();
$return= array();
$act_return=0;
if (array_key_exists('database', $_GET) && $_GET['database']=='pre_incripcion') {
	$alumno=SelectWhere('alumno','pre_inscripcion',"id='".$_GET['id']."'");
	if (count($alumno)>0) {
		if(Delete("id='".$alumno['0']['alumno']."'",'alumnos')){
			if (Delete("id='".$_GET['id']."'",'pre_incripcion')) {
				$act_return=1;
			}else{
				$act_return=2;
			}
		}else{
			$act_return=2;
		}
	}
}else{
	if (array_key_exists('id', $_GET) && array_key_exists('database', $_GET)) {
		if ($_GET['database']=='permisos') {
			$data= Delete("permiso='".$_GET['id']."'",$_GET['database']);
		}else{
			$data= Delete("id='".$_GET['id']."'",$_GET['database']);
		}
		if($data){
			$act_return=1;
		}else{
			$act_return=2;
		}
	}else{
		$act_return=2;
	}
}

switch ($act_return) {
	case '1':
		$return['titulo']= 'Formulario enviado con exito';
		$return['error']= false;
		$return['descripcion']= 'los datos ingresados fueron guardados con exito';
		break;
	case '2':
		$return['titulo']= 'Error al procesar los datos';
		$return['error']= true;
		$return['descripcion']= 'Campos vacios o incorrectos';
		break;
}
echo json_encode($return);
?>