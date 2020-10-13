<?php
include 'functions.php';

connect_mysqli();
$data = DescribeTable($_GET['q']);
?>
	<input type="text" hidden id="database" name="database" value="<?= $_GET['q']?>">
	<?php foreach ($data as $key => $value):?>
		<?php if ($value['Field'] <> "id"):?>
			<div class="form-group">
				<label for="<?= $value['Field'] ?>" class="control-label"><?= $value['Field'] ?></label>
				<?php
					$type = explode("(",$value['Type']);
					switch ($type[0]):
						case 'date':
							echo '<input type="'.$value['Type'].'" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							break;
						case 'varchar':
							echo '<input type="text" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							break;
						case 'bigint':
							echo '<input type="number" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							break;
						case 'int':
							$element = '<select class="custom-select form-control" id="'.$value['Field'].'"  name="'.$value['Field'].'" aria-required="true" aria-invalid="true">';
							$element .='<option value="null">Seleccione una opcion</option>';
							if ($value['Field'] == 'aula') {
								$dataOption=SelectWhere('grados.grado, secciones.seccion,aula.aula,aula.id','aula,grados,secciones',"aula.grado=grados.id AND aula.seccion=secciones.id");
								foreach ($dataOption as $key => $aula) {
									$element .='<option value="'.$aula['id'].'">'.$aula['aula']." ".$aula['grado'].' - '.$aula['seccion'].'</option>';
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'seccion') {
								$dataOption=SelectAll('*','secciones');
								foreach ($dataOption as $key => $periodo) {
									if ($periodo['statud'] == 1) {
										$element .='<option value="'.$periodo['id'].'">'.$periodo['seccion'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'grado') {
								$dataOption=SelectAll('*','grados');
								foreach ($dataOption as $key => $periodo) {
									if ($periodo['statud'] == 1) {
										$element .='<option value="'.$periodo['id'].'">'.$periodo['grado'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'año_escolar') {
								$dataOption=SelectAll('*','periodo_escolar');
								foreach ($dataOption as $key => $periodo) {
									if ($periodo['statud'] == 1) {
										$element .='<option value="'.$periodo['id'].'">'.$periodo['titulo'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}else {
								echo '<input type="number" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							}
							
							break;
						case 'tinyint':
							$element = '<select class="custom-select form-control" id="'.$value['Field'].'"  name="'.$value['Field'].'" aria-required="true" aria-invalid="true">';
							$element .='<option value="null">Seleccione una opcion</option>';
							if ($value['Field'] == 'sexo') {
								$element .='<option value="1">M</option>';
								$element .='<option value="0">F</option>';
							}elseif ($value['Field'] == 'statud') {
								$element .='<option value="1">Activo</option>';
								$element .='<option value="0">Inactivo</option>';
							}else{
								$element .='<option value="1">Si</option>';
								$element .='<option value="0">No</option>';
							}
							$element .='</select>';
							echo $element;
							break;
						case 'text':
							echo '<input type="'.$value['Type'].'" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							break;
					endswitch;
				?>
	    	</div>
	    <?php endif; ?>
	<?php endforeach; ?>