 <?php include '../header.php'; ?>
<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Tabla de Datos</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0)">Listado de Pre-Inscripción</a></li>
	            <li class="breadcrumb-item active">Datos</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Exportar Datos</h4>
	                <h6 class="card-subtitle">Exportar , Copiar, CSV, Excel, PDF e Imprimir</h6>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Fecha Pre-Inscripción</th>
	                                <th>Cédula</th>
	                                <th>Alumno</th>
	                                <th>Grado a Optar</th>
	                                <th>Representante</th>
	                                <th>Estatus</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Fecha Pre-Inscripción</th>
	                                <th>Cédula</th>
	                                <th>Alumno</th>
	                                <th>Grado a Optar</th>
	                                <th>Representante</th>
	                                <th>Estatus</th>
	                                <th>Acción</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php 
	                        	$data=SelectWhere(
	                        		'pre_incripcion.id,
	                        		pre_incripcion.statud,
	                        		pre_incripcion.fecha,
	                        		alumnos.id as cedula,
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
	                        		pre_incripcion.statud='1' AND
	                        		pre_incripcion.perido_escolar=periodo_escolar.id AND pre_incripcion.perido_escolar='".$periodo['0']['id']."'");
	                        	foreach ($data as $value):
	                        	?>
		                        	<tr>
		                                <td><?php echo $value['id']?></td>
		                                <td><?php echo date_format(date_create($value['fecha']),"d/m/Y");?></td>
		                                <td><?php echo $value['cedula']?></td>
		                                <td><?php echo $value['nombres']." ".$value['apellidos']?></td>
		                                <td><?php echo $value['grado']?></td>
		                                <td><?php echo $value['reprsentante_nombre']." ".$value['reprsentante_apellido']?></td>
		                                <td>
		                                	<?php if($value['statud']== 1): ?>
		                                		<span class="badge badge-warning">Por Inscribir</span>
		                                	<?php endif; ?>
		                                <td> 
		                                	<div class="btn-group">
		                                			<a href="<?php echo _BASE_URL_?>pages/form_edit_pre_inscripcion.php?id=<?php echo $value['id']?>" class="btn btn-outline btn-primary text-white">
		                                				<span>
		                                					<i class="ti-settings mdi-sm"></i>
		                                				</span>
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
        "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
    </script>
 <?php include '../footer.php'; ?>