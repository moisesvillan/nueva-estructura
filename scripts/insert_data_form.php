<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$array_dataTable2= array();
$return= array();
$act_return=0;
$periodo =SelectWhere('*','periodo_escolar','statud=1');
if (array_key_exists('beneficio',$_POST)) {
	foreach ($_POST as $key => $value) {
		if (!empty($value) && $key <> 'database' && $key <> 'beneficio' && $value <> 'null') {
			$array_data[$key]=$value;
		}
	}
	$array_data['año_escolar']=$periodo[0]["id"];
	unset($array_data['tipo_beneficio']);
	switch ($_POST['beneficio']) {
		case 'Beca':
			$array_data['tipo']=1;
			break;
		case 'cedulacion':
			$array_data['tipo']=2;
			break;
		case 'uniforme':
			$array_data['tipo']=3;
			break;
		case 'tecnologia':
			$array_data['tipo']=4;
			break;
		case 'vacuna':
			$array_data['tipo']=5;
			break;
		case 'salud':
			$array_data['tipo']=6;
			break;
	}
	if (array_key_exists('N_tipo_beneficio',$array_data)) {
		$array['beneficio']='4';
		$array['descripcion']=$array_data['N_tipo_beneficio'];
		$Insert = Insert('categoria_beneficio',$array);
		if ($Insert) {
			unset($array_data['N_tipo_beneficio'],$array_data['beneficio']);
			$categoria_beneficio= SelectAll('max(id) as id','categoria_beneficio');
			$categoria_beneficio=$categoria_beneficio[0];
			$array_data['categoria_beneficio']=$categoria_beneficio['id'];
			if (Insert('beneficio',$array_data)) {
				$act_return = 1;
			}else{
				$act_return = 2;
			}
		}else{
			$act_return = 2;
		}
	}else{
		$insert =Insert('beneficio',$array_data);
		if ($insert) {
			$act_return = 1;
		}else{
			$act_return = 2;
		}
	}
}else{
	switch ($_POST['database']) {
	case 'usuario':
		$array_data["nombre"]=$_POST["nombre"];
		$array_data["tipo_documento"]=$_POST["tipo_documento"];
		$array_data["num_documento"]=$_POST["num_documento"];
		$array_data["direccion"]=$_POST["direccion"];
		$array_data["telefono"]=$_POST["telefono"];
		$array_data["email"]=$_POST["email"];
		$array_dataTable2["rol"]=$_POST["rol"];
		$array_dataTable2["nick"]=$_POST["nick"];
		if ($_POST["clave"] == $_POST["clave_2"]) {
		$array_dataTable2["clave"]=password_hash($_POST["clave"], PASSWORD_DEFAULT);
		$array_dataTable2["forgot_pass"]=$_POST["clave"];
		}else{
			$act_return = 2;
		}
		$array_dataTable2["condicion"]=1;
		if(Insert('persona',$array_data)){
		$id_persona = SelectWhere('id','persona',"num_documento='".$array_data['num_documento']."'");
			if(count($id_persona)>0){
				$array_dataTable2['persona']=$id_persona[0]['id'];
				$array_dataTable2['condicion']="1";
				if(Insert($_POST['database'],$array_dataTable2)){
					$act_return = 1;
				}else{
					$act_return = 2;
				}
			}
		}else{
			$act_return = 2;
		}
		break;
	case 'profesor':
		$array_data["nombre"]=$_POST["nombre"];
		$array_data["tipo_documento"]=$_POST["tipo_documento"];
		$array_data["num_documento"]=$_POST["num_documento"];
		$array_data["direccion"]=$_POST["direccion"];
		$array_data["telefono"]=$_POST["telefono"];
		$array_data["email"]=$_POST["email"];
		if(Insert('persona',$array_data)){
		$id_persona = SelectWhere('id','persona',"num_documento='".$array_data['num_documento']."'");
			if(count($id_persona)>0){
				$array_dataTable2['persona']=$id_persona[0]['id'];
				$array_dataTable2['aula']=$_POST["aula"];
				$array_dataTable2['condicion']="1";
				if(Insert($_POST['database'],$array_dataTable2)){
					$act_return = 1;
				}else{
					$act_return = 2;
				}
			}
		}else{
			$act_return = 2;
		}
		break;
	case 'incripcion':
		foreach ($_POST as $key => $value) {
			if (!empty($value) && $key <> 'database') {
				$array_data[$key]=$value;
			}
		}
		if (count($array_data) > 0 && array_key_exists('database', $_POST) && isset($array_data)) {
			if(Insert($_POST['database'],$array_data)){
				$data_update1['statud']=0;
				if(Update('pre_incripcion',$data_update1,"alumno='".$array_data['alumno']."'")){
					$update = UpdateAula('aula',"`disponibilidad`=disponibilidad - 1","id='".$array_data['aula']."'");
					if ($update) {
						$act_return = 1;
					}else{
						$act_return = 2;
					}
				}else{
					$act_return = 2;
				}
			}else{
				$act_return = 2;
			}
		}else{
			$act_return = 2;
		}
		break;
	case 'aula':
		$validar_registros=SelectWhere('*','aula',"grado='$_POST[grado]' AND seccion='$_POST[seccion]'");
		if (!empty($validar_registros)) {
			$act_return = 3;
		}else{
			foreach ($_POST as $key => $value) {
				if (!empty($value) && $key <> 'database') {
					$array_data[$key]=$value;
				}
			}
			if (count($array_data) > 0 && array_key_exists('database', $_POST) && isset($array_data)) {
				if(Insert($_POST['database'],$array_data)){
					$act_return = 1;
				}else{
					$act_return = 2;
				}
			}else{
				$act_return = 2;
			}
		}
		break;
	default:
		foreach ($_POST as $key => $value) {
			if (!empty($value) && $key <> 'database') {
				$array_data[$key]=$value;
			}
		}
		if (count($array_data) > 0 && array_key_exists('database', $_POST) && isset($array_data)) {
			if(Insert($_POST['database'],$array_data)){
				$act_return = 1;
			}else{
				$act_return = 2;
			}
		}else{
			$act_return = 2;
		}
		break;
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
	case '3':
		$return['titulo']= 'Error al procesar los datos';
		$return['error']= true;
		$return['descripcion']= 'Ya se encuentra una aula asignada con el mismo grado y seccion';
		break;
}
echo json_encode($return);
?>