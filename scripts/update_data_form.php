<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$return= array();
$act_return=0;
if ($_POST['database']=='pre_incripcion') {
	$arrayDataFamiliar['ocupacion']=$_POST['ocupacion'];
	$arrayDataFamiliar['Dtrabajo']=$_POST['Dtrabajo'];
	$arrayDataFamiliar['Tlftrabajo']=$_POST['Tlftrabajo'];
	$arrayDataFamiliar['DHogar']=$_POST['DHogar'];
	$arrayDataFamiliar['nombre']=$_POST['nombre'];
	$arrayDataFamiliar['apellido']=$_POST['apellido'];
	$arrayDataFamiliar['TlfHogar']=$_POST['TlfHogar'];
	$arrayDataFamiliar['Parestesco']=$_POST['Parestesco'];
	if (Update('familiares',$arrayDataFamiliar,"id='".$_POST['Cedula']."'")) {
		$arrayDataAlummno['id'] = $_POST['id'];
		$arrayDataAlummno['nombres'] = $_POST['nombres'];
		$arrayDataAlummno['apellidos'] = $_POST['apellidos'];
		$arrayDataAlummno['nacionalidad'] = $_POST['nacionalidad'];
		$arrayDataAlummno['Lnaciomiento'] = $_POST['Lnaciomiento'];
		$arrayDataAlummno['fecha'] = $_POST['fecha'];
		$arrayDataAlummno['edad'] = $_POST['edad'];
		$arrayDataAlummno['sexo'] = ($_POST['sexo'] == 'M' ? 0 : 1);
		$arrayDataAlummno['plantelAnterior'] = $_POST['plantelAnterior'];
		$arrayDataAlummno['religion'] = $_POST['religion'];
		$arrayDataAlummno['correo'] = $_POST['correo'];
		if (Update('alumnos',$arrayDataAlummno,"id='".$_POST['id']."'")) {
			$array['fecha']= date("Y-m-d");
			$array['alumno']= $_POST['id'];
			$array['grado']= $_POST['grado'];
			$array['representante']= $_POST['Cedula'];
			$array['statud']= 1;
			$periodo =SelectWhere('*','periodo_escolar','statud=1');
			$array['perido_escolar']= $periodo[0]['id'];
			if(Update('pre_incripcion',$array,"id='".$_POST['pre_id']."'")){
				$act_return=1;
			}else{
				$act_return=2;
			}
		}else{
			$act_return=2;
		}
	}else{
		$act_return=2;
	}
}elseif($_POST['database']=='incripcion'){
	$arrayDataFamiliar['ocupacion']=$_POST['ocupacion'];
	$arrayDataFamiliar['Dtrabajo']=$_POST['Dtrabajo'];
	$arrayDataFamiliar['Tlftrabajo']=$_POST['Tlftrabajo'];
	$arrayDataFamiliar['DHogar']=$_POST['DHogar'];
	$arrayDataFamiliar['nombre']=$_POST['nombre'];
	$arrayDataFamiliar['apellido']=$_POST['apellido'];
	$arrayDataFamiliar['TlfHogar']=$_POST['TlfHogar'];
	$arrayDataFamiliar['Parestesco']=$_POST['Parestesco'];
	if (Update('familiares',$arrayDataFamiliar,"id='".$_POST['Cedula']."'")) {
		$arrayDataAlummno['id'] = $_POST['id'];
		$arrayDataAlummno['nombres'] = $_POST['nombres'];
		$arrayDataAlummno['apellidos'] = $_POST['apellidos'];
		$arrayDataAlummno['nacionalidad'] = $_POST['nacionalidad'];
		$arrayDataAlummno['Lnaciomiento'] = $_POST['Lnaciomiento'];
		$arrayDataAlummno['fecha'] = $_POST['fecha'];
		$arrayDataAlummno['edad'] = $_POST['edad'];
		$arrayDataAlummno['sexo'] = ($_POST['sexo'] == 'M' ? 0 : 1);
		$arrayDataAlummno['plantelAnterior'] = $_POST['plantelAnterior'];
		$arrayDataAlummno['religion'] = $_POST['religion'];
		$arrayDataAlummno['correo'] = $_POST['correo'];
		if (Update('alumnos',$arrayDataAlummno,"id='".$_POST['id']."'")) {
			$array['alumno']= $_POST['id'];
			$array['aula']= $_POST['aula'];
			$array['representante']= $_POST['Cedula'];
			$array['statud']= 1;
			$periodo =SelectWhere('*','periodo_escolar','statud=1');
			$array['año_escolar']= $periodo[0]['id'];
			if(Update('incripcion',$array,"id='".$_POST['pre_id']."'")){
				$act_return=1;
			}else{
				$act_return=2;
			}
		}else{
			$act_return=2;
		}
	}else{
		$act_return=2;
	}
}else{
	var_dump($_GET);
	die;
	foreach ($_GET as $key => $value) {
		if (empty($value)) {
			if ($key <> 'database' && $key <> 'id') {
				$array_data[$key]=$value;
			}
		}
	}
	if (count($array_data) > 0 && array_key_exists('database', $_GET) && isset($array_data)) {
		if (Update($_GET['database'],$array_data,"id='".$_GET['id']."'")) {
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