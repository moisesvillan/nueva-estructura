 <?php include '../header.php'; ?>
 		<div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Control de Usuarios</h3>
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active">Formulario de Registro de Profesor</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<form action="action" class="m-t-40" validate id="RegisterUser" method="POST">
	                		<div class="card-boy p-3 ">
	                			<h4 class="card-title">Datos Personales</h4>
                                <section>
                                	<div class="form-group">
                                		<label for="">Nombre: <span class="text-danger">*</span></label>
                                		<input class="form-control validate" type="text" required name="nombre" id="nombre">
                                	</div>
									<div class="form-group">
										<label for="">Tipo de Documento: <span class="text-danger">*</span></label>
										<select name="tipo_documento" id="tipo_documento" class="custom-select form-control validate" required   aria-required="true" aria-invalid="true">
											<option value="NULL">Seleccione una Opción</option>
											<option value="1">Venezolano</option>
											<option value="2">Extranjero</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Cédula de Identidad: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="number" required name="num_documento" id="num_documento">
									</div>
									<div class="form-group">
										<label for="">Dirección: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="text" required name="direccion" id="direccion">
									</div>
									<div class="form-group">
										<label for="">Teléfono: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="tlf" required name="telefono" id="telefono">
									</div>
									<div class="form-group">
										<label for="email">Correo: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="email" required name="email" id="email">
									</div>
                                </section>
                                <hr>
                                <section>
                                	
                                	<div class="form-group">
										<label for="">Aula Asignada: <span class="text-danger">*</span></label>
										<?php 
										$grado = SelectWhere(
											"aula.id,aula.aula, grados.grado, secciones.seccion",
											"`aula`,`grados`,`secciones`",
											"aula.grado=grados.id AND aula.seccion=secciones.id"
										);?>
										<select class="custom-select form-control validate "    aria-required="true" aria-invalid="true" name="aula" id="aula" required>
											<option value="NULL">Seleccione una Opción</option>
											<?php
											if(count($grado)>0):
	                                            foreach ($grado as $key => $value): 
	                                        ?>
	                                                <option value="<?php echo $value['id']?>">
	                                                	<?php echo $value['aula']." ".$value['grado']." - ".$value['seccion']?>
	                                                </option>
	                                            <?php endforeach; ?>
	                                        <?php endif; ?>
										</select>
									</div>
                                </section>
	                		</div>
	                		<div class="card-footer text-center">
	                			<div class="btn-group">
	                				<button type="submit" id="btnSubmit" class="btn btn-outline btn-primary btn-large text-white">
	                					<i class="fa fa-send"></i>
	                					 Enviar
		                			</button>
		                			<button type="reset" class="btn btn-outline btn-secondary btn-large">
		                				<i class="fa fa-arrow-left"></i>
		                				 Limpiar Datos
		                			</button>
		                			<button  type="" class="btn btn-outline-info btn-secondary btn-large">
		                				<i class="fa fa-arrow-left"></i>
		                				 <a href="javascript:history.back()"> Volver Atrás</a>
		                			</button>
	                			</div>
	                		</div>
	                	</form>
                	</div>
                </div>
            </div>
        </div>
    <script type="text/javascript">

    	$('#RegisterUser').submit(function(event) {
			event.preventDefault();
			var formData = new FormData(this);
			formData.append("database", "profesor");
			$.ajax({
                type: "POST",
                url: "<?php echo _BASE_URL_;?>scripts/insert_data_form.php",
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
                	location.href ="<?php echo _BASE_URL_;?>pages/list-prof.php";
                }
            });				
		});
    </script>
 <?php include '../footer.php'; ?>