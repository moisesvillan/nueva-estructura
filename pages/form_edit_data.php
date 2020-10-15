 <?php 
 include '../header.php'; 
 $data = DescribeTable($_GET['database']);
 $dataedit = SelectWhere("*",$_GET['database'],"id='".$_GET['id']."'");
 
 ?>
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
	                <form id="data_form" action="#">
	                	<input type="text" hidden id="database" name="database" value="<?= $_GET['database']?>">
	                	<input type="text" hidden id="id" name="id" value="<?= $_GET['id']?>">
	                	<?php
	                		foreach ($dataedit[0] as $key => $value):?>
	                			<?php if ($key <> "id"):?>
	                				<div class="form-group">
	                					<label for="<?= $key ?>" class="control-label">
											<?php 
												if($key == 'año_escolar'){
													echo "Periodo Escolar";
												}elseif($key == 'statud'){
													echo "Estado";
												}else{
													echo ucfirst($key);
												} 
											?>
										</label>
									<?php if ($key == 'statud'): ?>
										<select name="<?= $key?>" id="<?= $key?>" class="custom-select form-control">
											<?php if($value == 1): ?>
												<option value="1" selected>Activo</option>
												<option value="0">Inactivo</option>
											<?php else: ?>
												<option value="0" selected>Inactivo</option>
												<option value="1">Activo</option>
											<?php endif; ?>
										</select>
									<?php elseif($key == 'grado'): ?>
										<?php $data= SelectAll("*","grados"); ?>
										<select name="<?= $key?>" id="<?= $key?>" class="custom-select form-control">
											<?php foreach ($data as $key => $dataV):?>
												<?php if ($value == $dataV['id']):?>
													<option value="<?= $dataV['id']?>" selected ><?= $dataV['grado']?></option>
												<?php else: ?>
													<option value="<?= $dataV['id']?>"><?= $dataV['grado']?></option>
												<?php endif; ?>
												
											<?php endforeach; ?>
										</select>
									<?php elseif($key == 'seccion'): ?>
										<?php $data= SelectAll("*","secciones"); ?>
										<select name="<?= $key?>" id="<?= $key?>" class="custom-select form-control">
											<?php foreach ($data as $key => $dataV):?>
												<?php if ($value == $dataV['id']):?>
													<option value="<?= $dataV['id']?>" selected ><?= $dataV['seccion']?></option>
												<?php else: ?>
													<option value="<?= $dataV['id']?>"><?= $dataV['seccion']?></option>
												<?php endif; ?>
												
											<?php endforeach; ?>
										</select>
									<?php elseif($key == 'año_escolar'): ?>
										<?php $data= SelectWhere("*","periodo_escolar", "statud='1'"); ?>
										<select name="<?= $key?>" id="<?= $key?>" class="custom-select form-control" style=' pointer-events: none;'>
											<?php foreach ($data as $key => $dataV):?>
												<?php if ($value == $dataV['id']):?>
													<option value="<?= $dataV['id']?>" selected ><?= $dataV['titulo']?></option>
												<?php else: ?>
													<option value="<?= $dataV['id']?>"><?= $dataV['titulo']?></option>
												<?php endif; ?>
												
											<?php endforeach; ?>
										</select>
									<?php else:?>
										<input type="text" id="<?= $key?>" name="<?= $key?>" class="form-control" value="<?= $value?>">
									<?php endif; ?>
									</div>
								<?php endif; ?>
						<?php endforeach; ?>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Editar</button>
						</div>
	                </form>
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
	            	location.reload()
	            }
	        });	
		});
    </script>
 <?php include '../footer.php'; ?>