<?php
include 'functions.php';

connect_mysqli();

$data=SelectWhere(
	'alumnos.*,grados.grado,familiares.*,periodo_escolar.titulo,datos_emergencia.*',
	"pre_incripcion, alumnos, grados, familiares, periodo_escolar,datos_emergencia",
	"pre_incripcion.alumno='".$_GET['q']."' AND pre_incripcion.representante=familiares.id AND pre_incripcion.grado=grados.id AND pre_incripcion.perido_escolar=periodo_escolar.id AND alumnos.id=datos_emergencia.id AND pre_incripcion.alumno=alumnos.id"
);
$titulo="";
if (count($data)>0) :
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
					$titulo="Dirección de Vivienda";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'TlfHogar':
					$titulo="Teléfono de Vivienda";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'plantelAnterior':
					$titulo="Plantel de Donde Proviene";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'religion':
					$titulo="Religión";
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
					$titulo="Grado a Optar";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nacionalidad':
					$titulo="Nacionalidad";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					if ($value == 1) {
						$value="Venezolano";
					}else{
						$value="Extranjero";
					}
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'Lnaciomiento':
					$titulo="Lugar de Nacimiento";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'fecha':
					$titulo="Fecha de Nacimiento";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'id':
					$titulo="Cédula Alumno";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nombres':
					$titulo="Nombre Alumno";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'apellidos':
					$titulo="Apellidos Alumno";
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
					$titulo="Dirección Empleo del Representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'Tlftrabajo':
					$titulo="Teléfono Empleo del Representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'ocupacion':
					$titulo="Ocupación del Representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'titulo':
					$titulo="Periodo Escolar";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'nombre':
					$titulo="Nombre del Representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
				case 'apellido':
					$titulo="Apellido del Representante";
					echo "<div class='col-md-4 form-group'>";
					echo "<h4>$titulo</h4>"."\n";
					echo "<input type='text' value='$value' class='form-control' disabled>"."\n";
					echo "</div>";
					break;
			endswitch;
		endforeach; ?>
	</div>
	<div class="text-center">
        <!--<a href="<?php echo _BASE_URL_;?>scripts/print_planilla.php?alumno=<?= $_GET['q']?>" class="btn btn-primary">
            <i class="fa fa-print"></i>
        </a>-->
    </div>
</div>
<?php else: ?>
<div class="col-md-12 text-center">
	<h2>El Número de Cédula no se Encuentra Registrada en la Base de Datos del Sistema </h2>
	<hr>
</div>
<?php endif; ?>