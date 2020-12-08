<?php include '../header.php'; ?>
<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Modulo para Inscribir y Modificar</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
	            <li class="breadcrumb-item active">Vista Inscripción</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Exportar Data</h4>
	                <div class="float-right">
					    <h4 class="text-right">Año escolar en curso: <b><?= $periodo['0']['titulo']?></b></h4>
					</div>
	                <h6 class="card-subtitle">Copiar, CSV, Excel, PDF o Imprimir</h6>
	                <a href="#" class="btn btn-outline btn-primary text-white" data-toggle="modal" data-target="#modal_form" data-whatever="@fat" onclick="search_data('incripcion')">
	                	<span>
	                		<i class="ti-plus mdi-sm float-right" title="Nueva Inscripción"></i>
	                	</span>
	                </a>

	                <?php include '../modal/form_registro.php'; ?>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Cedula</th>
	                                <th>Alumno</th>
	                                <th>Aula</th>
	                                <th>Estado</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Cedula</th>
	                                <th>Alumno</th>
	                                <th>Aula</th>
	                                <th>Estado</th>
	                                <th>Acción</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php 
	                        	$grados = SelectWhere(
                                	"`incripcion`.id,`incripcion`.statud,`periodo_escolar`.`titulo` as 'año escolar',`aula`.`aula`,`alumnos`.`nombres`,`alumnos`.`apellidos`,`alumnos`.`id` as 'cedula'",
                                	"`incripcion`,`alumnos`,`periodo_escolar`,`aula`",
                                	"`incripcion`.alumno=alumnos.id AND `incripcion`.año_escolar=`periodo_escolar`.id AND `incripcion`.aula=`aula`.id"
                                );
                                $i=0;
	                        	foreach ($grados as $key => $value):?>
		                        	<tr>
		                                <td><?= $i++?></td>
		                                <td><?= $grados["$key"]['cedula']?></td>
		                                <td><?= $grados["$key"]['nombres']." ".$grados["$key"]['apellidos'] ?></td>
		                                <td><?= $grados["$key"]['aula']?></td>
		                                <td>
		                                	<?php if ($grados["$key"]['statud'] == 1): ?>
		                                		<span class="badge badge-success">Activo</span>
		                                	<?php else: ?>
		                                		<span class="badge badge-warning">Inactivo</span>
		                                	<?php endif ?>
		                                		
		                                </td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="<?= _BASE_URL_?>pages/form_edit_inscripcion.php?id=<?= $grados["$key"]['id']?>" class="btn btn-outline btn-primary text-white">
	                                			<span><i class="mdi mdi-account-edit"></i></span>
		                                		</a>
		                                		<a href="#" class="btn btn-outline btn-secondary" onclick="">
		                                			<span><i class="mdi mdi-eye"></i></span>
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
    function delete_data(id,table){
    	$.ajax({
            type: "GET",
            url: "<?php echo _BASE_URL_;?>scripts/update_data_form.php",
            data: {
    			id: id,
    			database: table,
    			statud: '0'
    		},
            success: function(response){
            	var response = $.parseJSON(response);
            	swal(response.titulo, response.descripcion);
            	location.href ="<?php echo _BASE_URL_;?>pages/inscripcion.php";
            }
        });
    }	
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
    </script>
<?php include '../footer.php'; ?>