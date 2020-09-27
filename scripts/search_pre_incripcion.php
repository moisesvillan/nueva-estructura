<?php
include 'functions.php';

connect_mysqli();

$data=SelectWhere(
	'alumnos.*,grados.grado,familiares.*,periodo_escolar.titulo,datos_emergencia.*',
	"pre_incripcion, alumnos, grados, familiares, periodo_escolar,datos_emergencia",
	"pre_incripcion.alumno='".$_GET['q']."' AND pre_incripcion.representante=familiares.id AND pre_incripcion.grado=grados.id AND pre_incripcion.perido_escolar=periodo_escolar.id AND alumnos.id=datos_emergencia.id"
);
$titulo="";
?>
<div class="col-md-12">
	<div class="row">
		<?php 
		foreach ($data[0] as $key => $value):
			switch ($key):
				case 'edad':
					$titulo="Edad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'sexo':
					$titulo="Sexo";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					if ($value == 1) {
						$value="Femenino";
					}else{
						$value="Masculino";
					}
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'DHogar':
					$titulo="Direccion de viviendad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'TlfHogar':
					$titulo="Telefono de viviendad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'plantelAnterior':
					$titulo="Plantel de donde proviene";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'religion':
					$titulo="Religion";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'correo':
					$titulo="Correo";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'grado':
					$titulo="Grado a optar";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nacionalidad':
					$titulo="Nacionalidad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'Lnaciomiento':
					$titulo="Lugar de nacimiento";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'fecha':
					$titulo="Fecha de nacimiento";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'id':
					$titulo="Cedula alumno";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nombres':
					$titulo="Nombre alumno";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'apellidos':
					$titulo="Apellidos alumno";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'detalle_terapia':
					$titulo="Terapia";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'detalle_alergia':
					$titulo="Alergia";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'detalle_enfermedad':
					$titulo="Enfermedad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'detalle_vacunas':
					$titulo="Vacunas";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'Dtrabajo':
					$titulo="Direccion empleo del representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'Tlftrabajo':
					$titulo="Telefono empleo del representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'ocupacion':
					$titulo="ocupacion del representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'titulo':
					$titulo="Periodo escolar";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nombre':
					$titulo="Nombre del representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'apellido':
					$titulo="Apellido del representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
			endswitch;
		endforeach; ?>
	</div>
</div>
