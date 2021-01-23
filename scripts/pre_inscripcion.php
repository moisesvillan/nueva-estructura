<?php

include 'functions.php';

connect_mysqli();
$data = SelectWhere('*','familiares',"id='".$_POST['ci']."'");
$act_return = 0;
if (count($data)<=0) {
	$arrayDataFamiliar['id']=$_POST['ci'];
	$arrayDataFamiliar['ocupacion']=$_POST['ocupacion'];
	$arrayDataFamiliar['Dtrabajo']=$_POST['Dtrabajo'];
	$arrayDataFamiliar['Tlftrabajo']=$_POST['Tlftrabajo'];
	$arrayDataFamiliar['DHogar']=$_POST['DHogar'];
	$arrayDataFamiliar['nombre']=ucfirst($_POST['nombrePre']);
	$arrayDataFamiliar['apellido']=ucfirst($_POST['apellidoPre']);          
	$arrayDataFamiliar['TlfHogar']=$_POST['TlfHogar'];
	$arrayDataFamiliar['Parestesco']=$_POST['Parestesco'];
	$arrayDataFamiliar['nacionalidad']=$_POST['nacionalidad'];
	$insert =Insert('familiares',$arrayDataFamiliar);
	if($insert){
		$act_return = 1;
	}else{
		$act_return = 0;
	}
}else{
	$act_return = 1;
}
if($act_return==1){
	$act_return = 0;
	$arrayDataAlummno['id'] = $_POST['cedula'];
	$arrayDataAlummno['nombres'] = ucfirst($_POST['nombre']);
	$arrayDataAlummno['apellidos'] = ucfirst($_POST['apellido']);
	$arrayDataAlummno['nacionalidad'] = $_POST['nacionalida'];
	$arrayDataAlummno['Lnaciomiento'] = $_POST['lnacimiento'];
	$arrayDataAlummno['fecha'] = $_POST['fechanac'];
	$arrayDataAlummno['edad'] = $_POST['edad'];
	$arrayDataAlummno['sexo'] = $_POST['sexo'];
	$arrayDataAlummno['plantelAnterior'] = $_POST['plantelanterior'];
	$arrayDataAlummno['religion'] = $_POST['religion'];
	$arrayDataAlummno['correo'] = $_POST['Correo'];
	$insert =Insert('alumnos',$arrayDataAlummno);
	if($insert){
		$arrayDataEmergencia['id'] = $_POST['cedula'];
		if (isset($_POST['enf_radio']) AND isset($_POST['enfermedad'])) {
			$arrayDataEmergencia['enfermedad'] = '1';
			$arrayDataEmergencia['detalle_enfermedad'] = $_POST['enfermedad'];
		}else{
			$arrayDataEmergencia['enfermedad'] = '0';
			$arrayDataEmergencia['detalle_enfermedad'] = 'No posee Ninguna Enfermedad';
		}
		if (isset($_POST['tera_radio']) AND isset($_POST['terapia'])) {
			$arrayDataEmergencia['terapia'] = '1';
			$arrayDataEmergencia['detalle_terapia'] = $_POST['terapia'];
		}else{
			$arrayDataEmergencia['terapia'] = '0';
			$arrayDataEmergencia['detalle_terapia'] = 'No asiste a ninguna terapia';
		}
		if (isset($_POST['aler_radio']) AND isset($_POST['alergico'])) {
			$arrayDataEmergencia['alergia'] = '1';
			$arrayDataEmergencia['detalle_alergia'] = $_POST['alergico'];
		}else{
			$arrayDataEmergencia['alergia'] = '0';
			$arrayDataEmergencia['detalle_alergia'] = 'No posee ninguna alergia';
		}

		$arrayDataEmergencia['tlfemerg'] = $_POST['telemerg'];
		if (isset($_POST['vacu_radio']) AND $_POST['vacu_radio'] =='no') {
			$dataVacuna=SelectAll("*","vacunas");
			$VacunasJson="[";
			$i=0;
			foreach ($dataVacuna as $value) {
				$nombre= str_replace(' ', '_', $value['nombre']);
				if (isset($_POST['vacuna_'.$nombre])) {
					$VacunasJson.="{";
					$VacunasJson.="id=".$value['id'].",";
					$VacunasJson.="vacuna='".$value['nombre']."'";
					$VacunasJson.="},";
					$i++;
				}
			}
			$VacunasJson.="]";
			$arrayDataEmergencia['vacunas'] = '0';
			$arrayDataEmergencia['detalle_vacunas'] = $VacunasJson;
		}else{
			$arrayDataEmergencia['vacunas'] = '1';
			$arrayDataEmergencia['detalle_vacunas'] ='Posee todas las vacunas registradas';
		}
		$insertDataEmergencia=Insert('datos_emergencia',$arrayDataEmergencia);
		if($insertDataEmergencia){
			$act_return = 0;
			$array['fecha']= date("Y-m-d");
			$array['alumno']= $_POST['cedula'];
			$array['grado']= $_POST['grado'];
			$array['representante']= $_POST['ci'];
			$array['statud']= 1;
			$periodo =SelectWhere('*','periodo_escolar','statud=1');
			$array['perido_escolar']= $periodo[0]['id'];
			$insert=Insert('pre_incripcion',$array);
			if($insert){
				$act_return = 1;
			}else{
				$act_return = 0;
			}
		}else{
			$act_return = 0;
		}
	}else{
		$act_return = 0;
	}
}
switch ($act_return) {
	case '1':
		$return['titulo']= 'Formulario enviado con exito';
		$return['error']= false;
		$return['descripcion']= 'los datos ingresados fueron guardados con exito';
		break;
	case '0':
		$return['titulo']= 'Error al procesar los datos';
		$return['error']= true;
		$return['descripcion']= 'Error en los datos ingresados';
		break;
}
echo json_encode($return);
?>