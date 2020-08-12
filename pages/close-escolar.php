 <?php include '../header.php'; ?>
 <div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Periodo escolar</h3>
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
		                                			<a href="#" class="btn btn-outline btn-primary text-white" title="Cerrar periodo escolar" onclick="update_data(
			                                				{
																'id':'<?= $value['id']?>',
			                                					'database':'periodo_escolar',
			                                					'statud':'0'
			                                				}
		                                				)">
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
    $(document).ready(function() {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
     function update_data(array) {
    	$.ajax({
            type: "GET",
            url: "<?php echo _BASE_URL_;?>scripts/update_data_form.php",
            data: array,
            beforeSend: function(objeto){
            	swal("Cargando!");
            },
            success: function(response){
            	var response = $.parseJSON(response);
            	swal(response.titulo, response.descripcion);
            }
    	});	
    }
    </script>
 <?php include '../footer.php'; ?>