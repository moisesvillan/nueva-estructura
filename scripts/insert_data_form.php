<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$array_dataTable2= array();
$return= array();
$act_return=0;
if ($_POST['database']=='usuario') {
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
		$array_dataTable2["forgot-pass"]=$_POST["clave"];
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

}elseif($_POST['database']=='profesor'){
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