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
					'alumnos.*,aula.aula,familiares.id as Cedula,familiares.nombre,familiares.apellido,familiares.ocupacion,familiares.Dtrabajo,familiares.Tlftrabajo,familiares.DHogar,familiares.TlfHogar,familiares.Parestesco, familiares.nacionalidad as "n_representante",periodo_escolar.titulo,datos_emergencia.enfermedad,datos_emergencia.detalle_enfermedad,datos_emergencia.terapia,datos_emergencia.detalle_terapia,datos_emergencia.alergia,datos_emergencia.detalle_alergia,datos_emergencia.tlfemerg,datos_emergencia.vacunas,datos_emergencia.detalle_vacunas',
					"incripcion, alumnos, aula, familiares, periodo_escolar,datos_emergencia",
					"incripcion.id='".$_GET['id']."' AND incripcion.representante=familiares.id AND incripcion.aula=aula.id AND incripcion.alumno=alumnos.id AND incripcion.año_escolar=periodo_escolar.id AND alumnos.id=datos_emergencia.id"
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
											$titulo="Dirección de Vivienda";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'TlfHogar':
											$titulo="Teléfono de Vivienda";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'plantelAnterior':
											$titulo="Plantel de donde Proviene";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'religion':
											$titulo="Religión";
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
										case 'aula':
											$titulo="Aula Asignada";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											$element = "<select '".$key."' name='".$key."' class='custom-select form-control required'>";
											$grados = SelectWhere(
												'aula.id , aula.aula, grados.grado, secciones.seccion',
												'aula,grados,secciones',
												'aula.grado=grados.id AND aula.seccion=secciones.id'
											);
											foreach ($grados as $grado) {
												if ($grado['id'] == $value) {
													$text= $grado['aula']." ".$grado['grado']." - ".$grado['seccion'];
													$element .="<option value='".$grado['id']."' selected>$text</option>";
												}else{
													$element .="<option value='".$grado['id']."'>".$grado['aula']."</option>";
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
											$titulo="Lugar de Nacimiento";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'fecha':
											$titulo="Fecha de Nacimiento";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='date' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'id':
											$titulo="Cédula Alumno";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required' style=' pointer-events: none;'>"."\n";
											echo "</div>";
											break;
										case 'nombres':
											$titulo="Nombre Alumno";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'apellidos':
											$titulo="Apellidos Alumno";
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
											$titulo="Dirección Empleo del Representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'Tlftrabajo':
											$titulo="Teléfono Empleo del Representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'ocupacion':
											$titulo="Ocupación del Representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'titulo':
											$titulo="Periodo Escolar";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required' disabled>"."\n";
											echo "</div>";
											break;
										case 'nombre':
											$titulo="Nombre del Representante";
											echo "<div class='col-md-4 form-group'>";
											echo "<h4>$titulo</h4>"."\n";
											echo "<input id='".$key."' name='".$key."' type='text' value='$value' class='form-control required'>"."\n";
											echo "</div>";
											break;
										case 'apellido':
											$titulo="Apellido del Representante";
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
													$element .='<option value="1" selected>Madre</option>';
													$element .='<option value="2" >Padre</option>';
													$element .='<option value="2">Familiar a Cargo</option>';
												}elseif($value == 2){
													$element .='<option value="2" selected>padre</option>';
													$element .='<option value="1">Madre</option>';
													$element .='<option value="3">Familiar a Cargo</option>';
												}elseif($value == 3){
													$element .='<option value="3" selected>Familiar a Cargo</option>';
													$element .='<option value="1" >Madre</option>';
													$element .='<option value="2" >Padre</option>';
												}
											$element .= '</select>';
											echo $element;
											echo "</div>";
											break;
										case 'Cedula':
											$titulo="Cédula Representate";
											echo "<div class='col-md-12'><hr></div>";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='number' id='$key' name='$key' value='$value' class='form-control required' style=' pointer-events: none;'>";
											echo $element;
											echo '</div>';
											break;
										case 'nacionalida':
											$titulo="Nacionalidad";
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
											$titulo="Lugar de Nacimiento";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = "<input type='text' id='$key' name='$key' class='form-control required'>";
											echo $element;
											echo '</div>';
											break;
										case 'fechanac':
											$titulo="Fecha de Nacimiento";
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
										case 'n_representante':
											$titulo="Nacionalidad";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = '<select id="'.$key.'" name="'.$key.'" class="custom-select form-control required">';
												if($value == 'V'){
													$element .='<option value="V" selected>Venezolano</option>';
													$element .='<option value="E" >Extranjero</option>';
												}elseif($value == 'E'){
													$element .='<option value="E" selected>Extranjero</option>';
													$element .='<option value="V">Venezolano</option>';
												}
											$element .= '</select>';
											echo $element;
											echo '</div>';
											break;
										case 'statud':
											$titulo="Estado";
											echo '<div class="col-md-4 form-group">';
											echo "<h4>$titulo</h4>";
											$element = '<select id="'.$key.'" name="'.$key.'" class="custom-select form-control required">';
												if($value == 1){
													$element .='<option value="1" selected>Activo</option>';
													$element .='<option value="0" >Extranjero</option>';
												}elseif($value == 0){
													$element .='<option value="0" selected>Inactivo</option>';
													$element .='<option value="1">Activo</option>';
												}
											$element .= '</select>';
											echo $element;
											echo '</div>';
											break;
									endswitch;
								endforeach; ?>
							</div>							
							<div>

								<input type="text" hidden id="database" name="database" value="incripcion">
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
	            	var response = $.parseJSON(response);
	            	swal(response.titulo, response.descripcion);
	            	location.href ="<?php echo _BASE_URL_;?>pages/inscripcion.php";
	            }
	        });	
		});
    </script>
 <?php include '../footer.php'; ?>