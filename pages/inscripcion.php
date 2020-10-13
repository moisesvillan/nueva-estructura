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
	                <h4 class="card-title">Data Export</h4>
	                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
	                <a href="#" class="btn btn-outline btn-primary text-white" data-toggle="modal" data-target="#modal_form" data-whatever="@fat" onclick="search_data('incripcion')">
	                	<span>
	                		<i class="ti-plus mdi-sm float-right" title="Nueva inscripcion"></i>
	                	</span>
	                </a>
	                <?php include '../modal/form_registro.php'; ?>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Alumno</th>
	                                <th>Aula</th>
	                                <th>Periodo escolar</th>
	                                <th>Accion</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Alumno</th>
	                                <th>Aula</th>
	                                <th>Periodo escolar</th>
	                                <th>Accion</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php 
	                        	$grados = SelectWhere(
                                	"`incripcion`.id,`periodo_escolar`.`titulo` as 'año escolar',`aula`.`aula`,`alumnos`.`nombres`,`alumnos`.`apellidos`",
                                	"`incripcion`,`alumnos`,`periodo_escolar`,`aula`",
                                	"`incripcion`.alumno=alumnos.id AND `incripcion`.año_escolar=`periodo_escolar`.id AND `incripcion`.aula=`aula`.id"
                                );
                                $i=0;
	                        	foreach ($grados as $key => $value):?>
		                        	<tr>
		                                <td><?= $i++?></td>
		                                <td><?= $grados["$key"]['nombres']." ".$grados["$key"]['apellidos'] ?></td>
		                                <td><?= $grados["$key"]['aula']?></td>
		                                <td><?= $grados["$key"]['año_escolar']?></td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="#" class="btn btn-outline btn-primary text-white">
	                                			<span><i class="ti-settings mdi-sm"></i></span>
		                                		</a>
		                                		<a href="#" class="btn btn-outline btn-secondary" onclick="delete_data(
			                                		{
			                                			'id':<?php echo $grados["$key"]['id']?>,
			                                			'database': 'incrpcion'
			                                		}
		                                		);">
		                                			<span><i class="ti-trash mdi-sm"></i></span>
		                                		</a>
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
        $(document).ready(function() {
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
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
<?php include '../footer.php'; ?>