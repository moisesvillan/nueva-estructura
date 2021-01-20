 <?php include '../header.php'; ?>
<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Tabla de Datos</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0)">Admisión</a></li>
	            <li class="breadcrumb-item active">Grados</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	            	<a href="#" class="btn btn-outline btn-primary text-white" data-toggle="modal" data-target="#modal_form" data-whatever="@fat" onclick="search_data('grados')">
	                	<span>
	                		Agregar Grado &nbsp
	                		<i class="ti-plus mdi-sm float-right" title="Nuevo grado"></i>
	                	</span>
	                </a></br></br>
	                <h4 class="card-title">Exportar Datos</h4>
	                <h6 class="card-subtitle">Exportar , Copiar, CSV, Excel, PDF e Imprimir</h6>

	                <?php include '../modal/form_registro.php'; ?>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

	                    	
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Grado</th>
	                                <th>Estatus</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>#</th>
	                                <th>Grado</th>
	                                <th>Estatus</th>
	                                <th>Acción</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php
                                $grados = SelectAll("*","`grados`");
                                foreach ($grados as $key => $value): 
                                ?>
                                    <tr>
		                                <td><?php echo $grados["$key"]['id']?></td>
		                                <td><?php echo $grados["$key"]['grado']?></td>
		                                <td>
		                                	<?php 
		                                	if($grados["$key"]['statud'] == 1):
		                                		?>
		                                		<span class="badge badge-success">Activo</span>
		                                		<?php
		                                	else:
		                                		?>
		                                		<span class="badge badge-danger">Inactivo</span>
		                                		<?php
		                                	endif;
		                                	?>
		                                </td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="<?php echo _BASE_URL_?>pages/form_edit_data.php?id=<?php echo $value['id']?>&database=grados" class="btn btn-outline btn-primary text-white">
	                                			<span><i class="ti-settings mdi-sm"></i></span>
		                                		</a>
		                                		<!--<a href="#" class="btn btn-outline btn-secondary" onclick="delete_data(
			                                		{
			                                			'id':<?php echo $grados["$key"]['id']?>,
			                                			'database': 'grados'
			                                		}
		                                		);">
		                                			<span><i class="ti-trash mdi-sm"></i></span>
		                                		</a>-->
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
    </script>
 <?php include '../footer.php'; ?>