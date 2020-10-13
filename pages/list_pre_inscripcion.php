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
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Fecha</th>
	                                <th>Alumno</th>
	                                <th>Grado</th>
	                                <th>Representante</th>
	                                <th>Statud</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Fecha</th>
	                                <th>Alumno</th>
	                                <th>Grado</th>
	                                <th>Representante</th>
	                                <th>Statud</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php 
	                        	$data=SelectWhere(
	                        		'pre_incripcion.id,
	                        		pre_incripcion.statud,
	                        		pre_incripcion.fecha,
	                        		alumnos.nombres,
	                        		alumnos.apellidos,
	                        		grados.grado,
	                        		familiares.nombre as reprsentante_nombre,
	                        		familiares.apellido as reprsentante_apellido',
	                        		'pre_incripcion,
	                        		alumnos,
	                        		grados,
	                        		familiares,
	                        		periodo_escolar',
	                        		"pre_incripcion.alumno=alumnos.id AND
	                        		pre_incripcion.representante=familiares.id AND
	                        		pre_incripcion.grado=grados.id AND
	                        		pre_incripcion.perido_escolar=periodo_escolar.id AND pre_incripcion.perido_escolar='".$periodo['0']['id']."'");
	                        	foreach ($data as $value):
	                        	?>
		                        	<tr>
		                                <td><?php echo $value['id']?></td>
		                                <td><?php echo $value['fecha']?></td>
		                                <td><?php echo $value['nombres']." ".$value['apellidos']?></td>
		                                <td><?php echo $value['grado']?></td>
		                                <td><?php echo $value['reprsentante_nombre']." ".$value['reprsentante_apellido']?></td>
		                                <td><?php echo $value['statud']?></td>
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