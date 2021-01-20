 <?php 
 include '../header.php';
 $data = DescribeTable($_GET['database']);
 $dataedit = SelectWhere(
 	"persona.*,profesor.*",
 	'profesor, persona',
 	"profesor.persona=persona.id AND profesor.persona='".$_GET['id']."'");
 $dataedit=$dataedit[0];
 ?>
 		<div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Control de Usuarios </h3>
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
                                		<input class="form-control validate" type="text" required name="nombre" id="nombre" value="<?= $dataedit['nombre']?>">
                                	</div>
									<div class="form-group">
										<label for="">Tipo de Documento: <span class="text-danger">*</span></label>
										<select name="tipo_documento" id="tipo_documento" class="custom-select form-control validate" required   aria-required="true" aria-invalid="true">
											<?php if ($dataedit['tipo_documento'] == 1): ?>
												<option value="0" selected>Venezolano</option>
												<option value="1">Extranjero</option>
											<?php else: ?>
												<option value="1" selected>Extranjero</option>
												<option value="0">Venezolano</option>
											<?php endif ?>
											
											
										</select>
									</div>
									<div class="form-group">
										<label for="">Cédula de Identidad: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="number" required name="num_documento" id="num_documento" value="<?= $dataedit['num_documento']?>">
									</div>
									<div class="form-group">
										<label for="">Dirección: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="text" required name="direccion" id="direccion" value="<?= $dataedit['direccion']?>">
									</div>
									<div class="form-group">
										<label for="">Teléfono: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="tlf" required name="telefono" id="telefono" value="<?= $dataedit['telefono']?>">
									</div>
									<div class="form-group">
										<label for="email">Correo: <span class="text-danger">*</span></label>
										<input class="form-control validate" type="email" required name="email" id="email" value="<?= $dataedit['email']?>">
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
											<?php
											if(count($grado)>0):
	                                            foreach ($grado as $key => $value): 
	                                        ?>
	                                        	<?php if ($dataedit['aula']== $value['id']): ?>
	                                        		<option value="<?php echo $value['id']?>" selected>
	                                                	<?php echo $value['aula']." ".$value['grado']." - ".$value['seccion']?>
	                                                </option>
	                                        	<?php else: ?>
	                                        		<option value="<?php echo $value['id']?>">
	                                                	<?php echo $value['aula']." ".$value['grado']." - ".$value['seccion']?>
	                                                </option>
	                                        	<?php endif ?>
	                                                
	                                            <?php endforeach; ?>
	                                        <?php endif; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="">Condición: <span class="text-danger">*</span></label>
										<select class="custom-select form-control validate "    aria-required="true" aria-invalid="true" name="condicion" id="condicion" required>
											<?php if ($dataedit['condicion'] == 1): ?>
												<option value="1" selected>Activo</option>
												<option value="0">Inactivo</option>
											<?php else: ?>
												<option value="0"selected>Inactivo</option>
												<option value="1">Activo</option>
											<?php endif ?>
										</select>
									</div>
									<input type="text" id="id" name="id" value="<?= $dataedit['id']?>" hidden>
									<input type="text" id="persona" name="persona" value="<?= $dataedit['persona']?>" hidden>
                                </section>
	                		</div>
	                		<div class="card-footer text-center">
	                			<div class="btn-group">
	                				<button type="submit" id="btnSubmit" class="btn btn-outline btn-primary btn-large text-white">
	                					<i class="fa fa-check-circle-o"></i>
	                					 Enviar
		                			</button>
		                			<button type="reset" class="btn btn-outline btn-secondary btn-large">
		                				<i class="fa fa-times"></i>
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
                	location.href ="<?php echo _BASE_URL_;?>pages/list-prof.php";
                }
            });				
		});
    </script>
 <?php include '../footer.php'; ?>