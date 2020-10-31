<?php
include 'functions.php';

connect_mysqli();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$data = SelectWhere(
	'alumnos.nombres, alumnos.apellidos,aula.aula',
	'incripcion,alumnos,aula',
	"representante='".$_GET['q']."' AND incripcion.año_escolar='".$periodo['0']['id']."' AND incripcion.aula = aula.id and incripcion.alumno=alumnos.id
	"
);
if (count($data)>0) {
	foreach ($data as $key => $value):
?>
<div class="col-md-6">
	    <div class="form-group">
	        <label for="nambebro1">Nombre :
	            <span class="danger">*</span>
	        </label>
	        <input type="text" class="form-control" id="nambebro1" name="nambebro1" disabled value="<?php echo $value['nombres'].' '.$value['apellidos']?>">
	    </div>
	    <div class="form-group">
	        <label for="gradobro1">Grado :
	            <span class="danger">*</span>
	        </label>
	        <input type="text" class="form-control" id="gradobro1" name="gradobro1" disabled value="<?php echo $value['aula']?>">
	    </div>
	</div>
	<div class="col-md-12 divider">
		<hr>
	</div>
<?php
	endforeach; 
}else{?>
	<div class="col-sm-12 col-md-12 divider text-center mt-4">
		<h2>El alumno no posee familiares en el plantel</h2>
		<hr>
	</div>
<?php	 } ?>

	



