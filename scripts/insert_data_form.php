<?php
include 'functions.php';

connect_mysqli();
$array_data= array();
$array_dataTable2= array();
$return= array();
$act_return=0;

if ($_POST['database']=='profesor' || $_POST['database']=='usuario') {
	foreach ($_POST as $key => $value) {
		if($key <> 'database'){
			if (!empty($value) && $key <> 'aula') {
				if($value == NULL){
					$array_data[$key]=NULL;
				}else{
					$array_data[$key]=$value;
				}
				
			}else{
				if($value == NULL){
					$array_dataTable2[$key]=NULL;
				}else{
					$array_dataTable2[$key]=$value;
				}
				
			}
		}
	}
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