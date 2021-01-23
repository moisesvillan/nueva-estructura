<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$return= array();
$act_return=0;
$database = (isset($_POST['database'])) ? $_POST['database'] : $_GET['database'] ;
switch ($database) {
	case 'pre_incripcion':
		$arrayDataFamiliar['ocupacion']=$_POST['ocupacion'];
		$arrayDataFamiliar['Dtrabajo']=$_POST['Dtrabajo'];
		$arrayDataFamiliar['Tlftrabajo']=$_POST['Tlftrabajo'];
		$arrayDataFamiliar['DHogar']=$_POST['DHogar'];
		$arrayDataFamiliar['nombre']=$_POST['nombre'];
		$arrayDataFamiliar['apellido']=$_POST['apellido'];
		$arrayDataFamiliar['TlfHogar']=$_POST['TlfHogar'];
		$arrayDataFamiliar['Parestesco']=$_POST['Parestesco'];
		$arrayDataFamiliar['nacionalidad']=$_POST['n_representante'];
		if (Update('familiares',$arrayDataFamiliar,"id='".$_POST['Cedula']."'")) {
			$arrayDataAlummno['id'] = $_POST['id'];
			$arrayDataAlummno['nombres'] = $_POST['nombres'];
			$arrayDataAlummno['apellidos'] = $_POST['apellidos'];
			$arrayDataAlummno['nacionalidad'] = $_POST['nacionalidad'];
			$arrayDataAlummno['Lnaciomiento'] = $_POST['Lnaciomiento'];
			$arrayDataAlummno['fecha'] = $_POST['fecha'];
			$arrayDataAlummno['edad'] = $_POST['edad'];
			$arrayDataAlummno['sexo'] = $_POST['sexo'];
			$arrayDataAlummno['plantelAnterior'] = $_POST['plantelAnterior'];
			$arrayDataAlummno['religion'] = $_POST['religion'];
			$arrayDataAlummno['correo'] = $_POST['correo'];
			$arrayDataAlummno['statud'] = $_POST['statud'];
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
		break;
	case 'incripcion':
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
			$arrayDataAlummno['sexo'] = $_POST['sexo'];
			$arrayDataAlummno['plantelAnterior'] = $_POST['plantelAnterior'];
			$arrayDataAlummno['religion'] = $_POST['religion'];
			$arrayDataAlummno['statud']= $_POST['statud'];
			$arrayDataAlummno['correo'] = $_POST['correo'];
			if (Update('alumnos',$arrayDataAlummno,"id='".$_POST['id']."'")) {
				$array['alumno']= $_POST['id'];
				$array['aula']= $_POST['aula'];
				$array['representante']= $_POST['Cedula'];
				$array['statud']= $_POST['statud'];
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
		break;
	case 'profesor':
		$table_persona=DescribeTable('persona');
		$table_profesor=DescribeTable('profesor');
		$data_persona= array();
		$data_profesor= array();
		foreach ($table_persona as $key => $value) {
			if ($value['Field']<>'id') {
				if (array_key_exists($value['Field'], $_POST)) {
					$data_persona[$value['Field']]=$_POST[$value['Field']];
				}
			}
			
		}
		foreach ($table_profesor as $key => $value) {
			if ($value['Field']<>'persona') {
				if (array_key_exists($value['Field'], $_POST)) {
					$data_profesor[$value['Field']]=$_POST[$value['Field']];
				}
			}
			
		}
		if (Update('persona',$data_persona,"id='".$_POST['id']."'")) {
			if (Update('profesor',$data_profesor,"persona='".$_POST['id']."'")) {
				$act_return=1;
			}else{
				$act_return=2;
			}
		}else{
			$act_return=2;
		}
		break;
	case 'aula':
		
		$validar_registros=SelectWhere('*','aula',"grado='$_GET[grado]' AND seccion='$_GET[seccion]'");
		if (!empty($validar_registros)) {
			foreach ($_GET as $key => $value) {
				if (!empty($value) && $key <> 'database') {
					$array_data[$key]=$value;
				}
			}
			
			if (count($array_data) > 0 && array_key_exists('database', $_GET) && isset($array_data)) {
				if(Update($_GET['database'],$array_data,"id='".$_GET['id']."'")){
					$act_return = 1;
				}else{
					$act_return = 2;
				}
			}else{
				$act_return = 2;
			}
		}else{
			$act_return = 3;
		}
		break;
	default:
		foreach ($_GET as $key => $value) {
			if ($key <> 'database' && $key <> 'id' && $key <> 'enviar') {
				$array_data[$key]=$value;
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
		break;
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
	case '3':
		$return['titulo']= 'Error al procesar los datos';
		$return['error']= true;
		$return['descripcion']= 'Ya se encuentra una aula asignada con el mismo grado y seccion';
		break;
}
echo json_encode($return);