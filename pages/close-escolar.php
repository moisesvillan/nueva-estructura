 <?php include '../header.php'; ?>
 <div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Año escolar</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
	            <li class="breadcrumb-item active">Periodo escolar</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Titulo</th>
	                                <th>Fecha de Inicio</th>
	                                <th>Fecha de Finalizacion</th>
	                                <th>Estado</th>
	                                <th>Accion</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Titulo</th>
	                                <th>Fecha de Inicio</th>
	                                <th>Fecha de Finalizacion</th>
	                                <th>Estado</th>
	                                <th>Accion</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php 
	                        	$data = SelectAll('*','periodo_escolar'); 
	                        	$i=1;
	                        	foreach ($data as $value) :
	                        	?>
		                        	<tr>
		                                <td><?= $i++; ?></td>
		                                <td><?= $value['titulo']?></td>
		                                <td><?= $value['fecha_inicial']?></td>
		                                <td><?= $value['fecha_final']?></td>
		                                <td>
		                                	<?php
		                                		if ($value['statud'] == 1) {
		                                			echo '<span class="badge badge-success">Activo</span>';
		                                		}else{
		                                			echo '<span class="badge badge-danger">Finalizado</span>';
		                                		}
		                                	?>
		                                </td>
		                                <td>
		                                	<div class="btn-group">
		                                		<?php if($value['statud'] <> 1): ?>
			                                		<a href="#" class="btn btn-outline btn-primary disabled text-white" title="Cerrar periodo escolar">
			                                			<span><i class="ti-close mdi-sm"></i></span>
			                                		</a>
			                                		<a href="#" class="btn btn-outline btn-secondary disabled" title="Reporte">
			                                			<span><i class="ti-file mdi-sm"></i></span>
			                                		</a>
		                                		<?php else: ?>
		                                			<a href="#" class="btn btn-outline btn-primary text-white" title="Cerrar periodo escolar" onclick="update_data('<?= $value['id']?>','periodo_escolar')">
		                                			<span><i class="ti-close mdi-sm"></i></span>
			                                		</a>
			                                		<a href="Report-escolar.php?id=<?= $value['id']?>" class="btn btn-outline btn-secondary" title="Reporte">
			                                			<span><i class="ti-file mdi-sm"></i></span>
			                                		</a>
		                                		<?php endif; ?>
		                                	</div>
		                                </td>
		                            </tr>
	                        	<?php endforeach; ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</div>
</div>
 <!-- end - This is for export functionality only -->
    <script>
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "registros del _START_ al _END_",
        "sInfoEmpty":      "registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    });
     function update_data(id,database) {
    	$.ajax({
            type: "GET",
            url: "<?php echo _BASE_URL_;?>scripts/update_data_form.php",
            data: {
            	id:id,
            	database:database,
            	statud:'0'
            },
            beforeSend: function(objeto){
            	swal("Cargando!");
            },
            success: function(response){
            	var response = $.parseJSON(response);
            	swal(response.titulo, response.descripcion);
            	location.reload()
            }
    	});	
    }
    </script>
 <?php include '../footer.php'; ?>