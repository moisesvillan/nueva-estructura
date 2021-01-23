<?php
include 'functions.php';

connect_mysqli();
if (!empty($_POST)) {
	$data=SelectWhere($_POST['campos'],$_POST['tablas'],$_POST['where']);
	foreach ($data as $key => $value) {
		if ($key <> 'id') {
			switch ($key) {
				case 'tipo_documento':
					$element="<select name='$value' id='$value' class='custom-select form-control'>";
					if ($value==1) {
						$element.="<option value='1' selected>Extrajero</option>";
						$element.="<option value='0'>Venezolano</option>";
					}else{
						$element.="<option value='1'>Extrajero</option>";
						$element.="<option value='0' selected>Venezolano</option>";
					}
					$element.="</select>";
					break;
				case 'rol':
					$element="<select name='$value' id='$value' class='custom-select form-control'>";
						$data_select=SelectAll('*','rol');
						foreach ($data_select as $key => $value) {
							$element.="<option value='$value[rol]'>$value[nombre]</option>";
						}
					$element.="</select>";
					break;
				case 'clave':
					$element="<input type='password' name='$key' id='$key' value='$value'>";
					break;
				case 'condicion':
					$element="<select name='$key' id='$key' class='custom-select form-control'>";
					if ($value==1) {
						$element.="<option value='1' selected>Activo</option>";
						$element.="<option value='0'>Inactivo</option>";
					}else{
						$element.="<option value='1'>Activo</option>";
						$element.="<option value='0' selected>Inactivo</option>";
					}
					$element.="</select>";
					break;
				default:
					# code...
					break;
			}
			echo $element;
		}
	}
}

?>