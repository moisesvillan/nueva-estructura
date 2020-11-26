 <?php 
 include '../header.php'; 
 $periodo =SelectWhere('*','periodo_escolar','statud=1');
 if (count($periodo)>0) { ?>
 	<script type="text/javascript">
 		swal('Advertencia!', 'Ya hay un año escolar aperturado por favor verificar');
 	</script>
 <?php }else{ ?>
 <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Formulario de registro de periodo escolar</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Formulario de registro de periodo escolar</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<form action="action" class="m-t-40" validate id="RegisterAnoEscolar" method="POST">
	                		<div class="card-boy p-3 ">
                                <section>
                                	<div class="form-group">
                                		<label for="">Titulo: <span class="text-danger">*</span></label>
                                		<input class="form-control validate" type="text" name="titulo" id="titulo">
                                		<input class="form-control validate" type="text" hidden name="database" id="database" value="periodo_escolar">
                                	</div>
									<div class="form-group">
										<label for="">Fecha de inicio: <span class="text-danger">*</span></label>
										<input type="date" class="form-control required" id="fecha_inicial" name="fecha_inicial">
									</div>
									<div class="form-group">
										<label for="">Fecha de finalizacion: <span class="text-danger">*</span></label>
										<input type="date" class="form-control required" id="fecha_final" name="fecha_final">
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
        	$('#RegisterAnoEscolar').submit(function(event) {
					event.preventDefault();
					var formData = new FormData(this);
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
		                    	document.location ="<?php echo _BASE_URL_;?>pages/close-escolar.php";
		                    }
	                	});				
			});
    	</script>
 <?php } include '../footer.php'; ?>