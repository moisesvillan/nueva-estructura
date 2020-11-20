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
	                <a href="#" class="btn btn-outline btn-primary text-white" data-toggle="modal" data-target="#modal_form" data-whatever="@fat" onclick="search_data('aula')">
	                	<span>
	                		<i class="ti-plus mdi-sm float-right" title="Nuevo aula"></i>
	                	</span>
	                </a>
	                <?php include '../modal/form_registro.php'; ?>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Aula</th>
	                                <th>Grado</th>
	                                <th>Sección</th>
	                                <th>Cupos Disponible</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>Aula</th>
	                                <th>Grado</th>
	                                <th>Sección</th>
	                                <th>Cupos Disponible</th>
	                                <th>Acción</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php
	                        	$periodo =SelectWhere('*','periodo_escolar','statud=1');
                                $grados = SelectWhere(
                                	"aula.id,aula.
aula,aula.disponibilidad,grados.grado,secciones.seccion",
                                	"`aula`,`grados`,`secciones`",
                                	"`aula`.grado=`grados`.id AND `aula`.seccion=`secciones`.id AND
                                	`aula`.statud='1' AND `aula`.año_escolar='".$periodo[0]['id']."'"
                                );
                                foreach ($grados as $key => $value): 
                                ?>
                                    <tr>
		                                <td><?php echo $grados["$key"]['aula']?></td>
		                                <td><?php echo $grados["$key"]['grado']?></td>
		                                <td><?php echo $grados["$key"]['seccion']?></td>
		                                <td><?php echo $grados["$key"]['disponibilidad']?></td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="<?php echo _BASE_URL_?>pages/form_edit_data.php?id=<?php echo $value['id']?>&database=aula" class="btn btn-outline btn-primary text-white">
	                                			<span><i class="ti-settings mdi-sm"></i></span>
		                                		</a>
		                                		<a href="#" class="btn btn-outline btn-secondary" onclick="delete_data(
			                                		{
			                                			'id':<?php echo $grados["$key"]['id']?>,
			                                			'database': 'aula'
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