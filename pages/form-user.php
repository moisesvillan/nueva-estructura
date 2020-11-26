 <?php include '../header.php'; ?>
 		<div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Formulario de registro de usuario</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Formulario de registro de usuario</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<form action="#" class="m-t-40" validate id="RegisterUser" method="POST">
	                		<div class="card-boy p-3 ">
	                			<h4 class="card-title">Datos de personales</h4>
                                <section>
                                	<div class="form-group">
                                		<label for="">Nombre: <span class="text-danger">*</span></label>
                                		<input class="form-control validate" type="text" required name="nombre" id="nombre">
                                	</div>
									<div class="form-group">
										<label for="">Tipo de documento: <span class="text-danger">*</span></label>
										<select name="tipo_documento" id="tipo_documento" class="custom-select form-control validate" required   aria-required="true" aria-invalid="true">
											<option value="NULL">Selecciones una opcion</option>
											<option value="1">Venezolano</option>
											<option value="2">Extranjero</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Numero de documento: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="number" required name=" num_documento" id="num_documento">
									</div>
									<div class="form-group">
										<label for="">Direccion: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="text" required name="direccion" id="direccion">
									</div>
									<div class="form-group">
										<label for="">Telefono: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="tlf" required name="telefono" id="telefono">
									</div>
									<div class="form-group">
										<label for="email">Correo: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="email" required name="email" id="email">
									</div>
                                </section>
                                <hr>
                                <section>
                                	<h4 class="card-title">Datos de usuario</h4>
                                	<div class="form-group">
										<label for="">Rol de usuario: <span class="text-danger">*</span></label>
										<select class="custom-select form-control validate "    aria-required="true" aria-invalid="true" name="rol" id="rol" required>
											<option value="NULL">Selecciones una opcion</option>
											 <?php
                                            $rol = SelectAll("*","`rol`");
                                            for ($i=0; $i < count($rol); $i++) : 
                                            ?>
                                                <option value="<?php echo $rol[$i]['rol']?>">
                                                	<?php echo $rol[$i]['nombre']?>
                                                </option>
                                            <?php endfor; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="">Usuario: <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="nick" id="nick" required>
									</div>	
									<div class="form-group">
										<label for="">Clave: <span class="text-danger">*</span></label>
										<input class="form-control" type="password" name="clave" id="clave" required>
									</div>
									<div class="form-group">
										<label for="">Confirmacion de clave: <span class="text-danger">*</span></label>
										<input class="form-control" type="password" name="clave_2" id="clave_2" required>
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
		                				 Reiniciar
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
			formData.append("database", "usuario");
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
                	document.location ="<?php echo _BASE_URL_;?>pages/list-user.php";
                }
            });				
		});
    </script>
 <?php include '../footer.php'; ?>