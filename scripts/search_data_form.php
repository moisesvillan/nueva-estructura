<?php
include 'functions.php';

connect_mysqli();
$data = DescribeTable($_GET['q']);
?>
	<input type="text" hidden id="database" name="database" value="<?= $_GET['q']?>">
	<?php foreach ($data as $key => $value):?>
		<?php if ($value['Field'] <> "id" && $value['Field'] <> "permiso"):?>
			<div class="form-group">
				<label for="<?= $value['Field'] ?>" class="control-label">

					<?php if($value['Field'] == "statud"){
						echo "Estado";
					}else{
						echo ucfirst(str_replace("_"," ",$value['Field']));	
					}
					?>
				</label>
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
							$element = "<div class='ui-widget'>";
							  $element .= '<input type="number" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control">';
							$element .= "</div>";
				?>
				<script>
    				$( "#alumno" ).change(function(event) {
    					var ci =$("#alumno").val();
				         $.ajax({
				         	async: false,
				            url: "<?php echo _BASE_URL_;?>scripts/search_data.php",
				            type: "GET",
				            data: {
				                ci: ci
				            },
				            success: function(response){
				            	console.log(response);
				            	var response = $.parseJSON(response);
				                var aula = $("#aula");
				                for (var i = 0; i < response.length; i++) {
				                	document.getElementById("representante").value = response[i].id_representante;
				                	aula.append("<option value='"+response[i].id_aula+"''>"+response[i].aula+"</option>");
				                }
				                
				            }
				        });
				    });
				</script>	
				<?php
							echo $element;
							break;
						case 'int':
							$element = '<select class="custom-select form-control" id="'.$value['Field'].'"  name="'.$value['Field'].'" aria-required="true" aria-invalid="true">';
							$element .='<option value="null">Seleccione una opcion</option>';
							if ($value['Field'] == 'aula') {
								if ($_GET['q']<>'incripcion') {
									$dataOption=SelectWhere('grados.grado, secciones.seccion,aula.aula,aula.id','aula,grados,secciones',"aula.grado=grados.id AND aula.seccion=secciones.id");
									foreach ($dataOption as $key => $aula) {
										$element .='<option value="'.$aula['id'].'">'.$aula['aula']." ".$aula['grado'].' - '.$aula['seccion'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'usuario') {
								$dataOption=SelectWhere('persona, nick, condicion','usuario',"rol<>1");
								foreach ($dataOption as $key => $periodo) {
									if ($periodo['condicion'] == 1) {
										$element .='<option value="'.$periodo['persona'].'">'.$periodo['nick'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'ruta') {
								$dataOption=SelectWhere('ruta, modulo','ruta',"Padre=0");
								foreach ($dataOption as $key => $periodo) {
									$element .='<option value="'.$periodo['ruta'].'">'.$periodo['modulo'].'</option>';
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
								$dataOption=SelectWhere('*','periodo_escolar',"statud=1");
								foreach ($dataOption as $key => $periodo) {
									if ($periodo['statud'] == 1) {
										$element .='<option value="'.$periodo['id'].'" selected>'.$periodo['titulo'].'</option>';
									}
								}
								$element .='</select>';
								echo $element;
							}elseif($value['Field'] == 'representante'){
								echo '<input type="number" id="'.$value['Field'].'" name="'.$value['Field'].'" class="form-control" style="pointer-events: none;">';
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