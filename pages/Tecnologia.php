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
	                 <a href="#" class="btn btn-outline btn-primary text-white" data-toggle="modal" data-target="#asignacion_bienestar" data-whatever="@fat">
	                	<span>
	                		<i class="ti-plus mdi-sm float-right" title="Nuevo Beneficio"></i>
	                	</span>
	                </a>
	                <?php include '../modal/asignacion_bienestar.php'; ?>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                         <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Aula</th>
	                                <th>Alumno</th>
	                                <th>Tipo de Beneficio</th>
	                                <th>Accion</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Aula</th>
	                                <th>Alumno</th>
	                                <th>Tipo de Beneficio</th>
	                                <th>Accion</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php
	                        	$i=0;
                                $grados = SelectWhere(
                                	"beneficio.id, aula.aula, alumnos.nombres, alumnos.apellidos,categoria_beneficio.descripcion",
                                	"`beneficio`,`alumnos`,`aula`,`categoria_beneficio`",
                                	"`beneficio`.aula=aula.id AND beneficio.alumno= alumnos.id AND beneficio.tipo='4' AND beneficio.categoria_beneficio=categoria_beneficio.id");
                                foreach ($grados as $key => $value): 
                                ?>
                                    <tr>
                                    	<td><?php echo $i++ ?></td>
		                                <td><?php echo $grados["$key"]['aula']?></td>
		                                <td><?php echo $grados["$key"]['nombres']." ".$grados["$key"]['apellidos'] ?></td>
		                                <td><?php echo $grados["$key"]['descripcion'] ?></td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="#" class="btn btn-outline btn-primary text-white">
	                                			<span><i class="ti-settings mdi-sm"></i></span>
		                                		</a>
		                                		<a href="#" class="btn btn-outline btn-secondary" onclick="delete_data(
			                                		{
			                                			'id':<?php echo $grados["$key"]['id']?>,
			                                			'database': 'beneficios'
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
    function delete_data(array) {
    	$.ajax({
            type: "GET",
            url: "<?php echo _BASE_URL_;?>scripts/delete_data_form.php",
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
    function editar_data(argument) {
    	// body...
    }
    </script>
 <?php include '../footer.php'; ?>