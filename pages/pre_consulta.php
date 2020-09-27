 <?php include '../header.php'; ?>
	<div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Formulario de consulta</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Formulario de consulta</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulario de consulta</h4>
                        <form action="#">
                            <section>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">
                                            Cedula de identidad del alumno:
                                            <span class="danger">*</span>
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="number" class="form-control required" id="ci" name="ci">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info" onclick="search_ci($('#ci').val())">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="ResponData" class="row"></div>
                            </section>
        				</form>
    				</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function search_ci(ci) {
		   $.ajax({
		        type: "GET",
		        url: "<?php echo _BASE_URL_;?>scripts/search_pre_incripcion.php",
		        data: {
		            q: ci
		        },
		        success: function(response){
		        	 $('#ResponData').html('');
		            $('#ResponData').append(response);
		        }
		    });
		}
	</script>
  <?php include '../footer.php'; ?>