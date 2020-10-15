 <?php include '../header.php'; ?>
<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Table Data table</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
	            <li class="breadcrumb-item active">Table Data table</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Formulario de edicion</h4>
					<?php 
					$data=SelectWhere(
					'alumnos.*,grados.grado,familiares.id as Cedula,familiares.nombre,familiares.apellido,familiares.ocupacion,familiares.Dtrabajo,familiares.Tlftrabajo,familiares.DHogar,familiares.TlfHogar,familiares.Parestesco,periodo_escolar.titulo,datos_emergencia.enfermedad,datos_emergencia.detalle_enfermedad,datos_emergencia.terapia,datos_emergencia.detalle_terapia,datos_emergencia.alergia,datos_emergencia.detalle_alergia,datos_emergencia.tlfemerg,datos_emergencia.vacunas,datos_emergencia.detalle_vacunas',
					"pre_incripcion, alumnos, grados, familiares, periodo_escolar,datos_emergencia",
					"pre_incripcion.id='".$_GET['id']."' AND pre_incripcion.representante=familiares.id AND pre_incripcion.grado=grados.id AND pre_incripcion.alumno=alumnos.id AND pre_incripcion.perido_escolar=periodo_escolar.id AND alumnos.id=datos_emergencia.id"
					);
					$titulo="";
					?>
					<div class="col-md-12">
						<form id="data_form" action="#">
							<div class="row">
								<?php foreach ($data[0] as $key => $value):
									switch ($key):
										case 'edad':
											$titulo="Edad";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'sexo':
											$titulo="Sexo";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											$element = "<select '".$key."' name='".$key."' class='custom-select form-control required'>>";
												if ($value == 1) {
													$element .="<option value='$value' selected>Femenino</option>";
													$element .="<option value='$value'>Masculino</option>";
												}else{
													$element .="<option value='$value' selected>Masculino</option>";
													$element .="<option value='$value'>Femenino</option>";
												}
											$element .= "</select>";
											echo $element;
											echo "</div>";
											break;
										case 'DHogar':
											$titulo="Direccion de viviendad";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'TlfHogar':
											$titulo="Telefono de viviendad";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'plantelAnterior':
											$titulo="Plantel de donde proviene";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'religion':
											$titulo="Religion";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'correo':
											$titulo="Correo";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'grado':
											$titulo="Grado a optar";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											$element = "<select '".$key."' name='".$key."' class='custom-select form-control required'>";
											$grados = SelectAll('*','grados');
											foreach ($grados as $grado) {
												if ($grado['id'] == $value) {
													$element .="<option value='".$grado['id']."' selected>".$grado['grado']."</option>";
												}else{
													$element .="<option value='".$grado['id']."'>".$grado['grado']."</option>";
												}
											}
											$element .= "</select>";
											echo $element;
											echo "</div>";
											break;
										case 'nacionalidad':
											$titulo="Nacionalidad";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											$element = "<select '".$key."' name='".$key."' class='custom-select form-control required'>";
											if ($value == 1) {
													$element .="<option value='1' selected>Venezolano</option>";
													$element .="<option value='0'>Extranjero</option>";
												}else{
													$element .="<option value='0' selected>Extranjero</option>";
													$element .="<option value='1'>Venezolano</option>";
												}
											$element .="</select>";
											echo $element;
											echo "</div>";
											break;
										case 'Lnaciomiento':
											$titulo="Lugar de nacimiento";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'fecha':
											$titulo="Fecha de nacimiento";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='date' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'id':
											$titulo="Cedula alumno";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required' style=' pointer-events: none;'>"."\n";
											echo "</div>";
											break;
										case 'nombres':
											$titulo="Nombre alumno";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'apellidos':
											$titulo="Apellidos alumno";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'detalle_terapia':
											$titulo="Terapia";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'detalle_alergia':
											$titulo="Alergia";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'detalle_enfermedad':
											$titulo="Enfermedad";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'detalle_vacunas':
											$titulo="Vacunas";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'Dtrabajo':
											$titulo="Direccion empleo del representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'Tlftrabajo':
											$titulo="Telefono empleo del representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'ocupacion':
											$titulo="ocupacion del representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'titulo':
											$titulo="Periodo escolar";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required' disabled>"."\n";
											echo "</div>";
											break;
										case 'nombre':
											$titulo="Nombre del representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'apellido':
											$titulo="Apellido del representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'Parestesco':
											$titulo="Parestesco";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											$element = '<select id="'.$key.'" name="'.$key.'" class="custom-select form-control required">';
												if($value == 1){
													$element .='<option value="1" selected>madre</option>';
													$element .='<option value="2" >padre</option>';
													$element .='<option value="2">padre</option>';
												}elseif($value == 2){
													$element .='<option value="2" selected>padre</option>';
													$element .='<option value="1">madre</option>';
													$element .='<option value="3">familiar a cargo</option>';
												}elseif($value == 3){
													$element .='<option value="3" selected>familiar a cargo</option>';
													$element .='<option value="1" >madre</option>';
													$element .='<option value="2" >padre</option>';
												}
											$element .= '</select>';
											echo $element;
											echo "</div>";
											break;
										case 'Cedula':
											$titulo="Cedula Representate";
											echo "<div class='col-md-12'><hr></div>";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='number' id='$key' name='$key' value='$value' class='form-control required' style=' pointer-events: none;'>";
											echo $element;
											echo '</div>';
											break;
										case 'nacionalida':
											$titulo="Nacionalida";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<select class='custom-select form-control required' '$key' name='$key'>";
												if($value==1){
													$element .="<option value='1' selected>Venezolano</option>";
                                            		$element .="<option value='0'>Extranjero</option>";
												}else{
													$element .="<option value='1'>Venezolano</option>";
		                                            $element .="<option value='0' selected>Extranjero</option>";
												}
                                            $element .="</select>";
											echo $element;
											echo '</div>';
											break;
										case 'lnacimiento':
											$titulo="Lugar de nacimiento";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='text' id='$key' name='$key' class='form-control required'>";
											echo $element;
											echo '</div>';
											break;
										case 'fechanac':
											$titulo="Fecha de nacimiento";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='date' class='form-control required' id='$key' name='$key'>";
											echo $element;
											echo '</div>';
											break;
										case 'Correo':
											$titulo="Correo";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='text' id='$key' name='$key' class='form-control required'>";
											echo $element;
											echo '</div>';
											break;
									endswitch;
								endforeach; ?>
							</div>
							<div>

								<input type="text" hidden id="database" name="database" value="pre_incripcion">
								<input type="text" hidden id="pre_id" name="pre_id" value="<?= $_GET['id']?>">
								<button type="submit" class="btn btn-primary">Actualizar</button>
							</div>
						</form>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
 <!-- end - This is for export functionality only -->
    <script>
	$('#data_form').submit(function(event) {
			event.preventDefault();
			var formData = new FormData(this);
			$.ajax({
	            type: "POST",
	            url: "<?php echo _BASE_URL_;?>scripts/update_data_form.php",
	            data: formData,
	            cache:false,
			    contentType: false,
			    processData: false,
	            beforeSend: function(objeto){
	            	swal("Cargando!");
	            },
	            success: function(response){
	            	console.log(response);
	            	//var response = $.parseJSON(response);
	            	//swal(response.titulo, response.descripcion);
	            	//location.reload()
	            }
	        });	
		});
    </script>
 <?php include '../footer.php'; ?>