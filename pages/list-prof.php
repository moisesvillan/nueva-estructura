 <?php include '../header.php'; ?>
<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Control de Usuarios</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="javascript:void(0)">Lista de Profesor</a></li>
	            <li class="breadcrumb-item active">Table Data table</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	               
	                <h6 class="card-subtitle">Exportar Información, Copiar, CSV, Excel, PDF e Imprimir</h6>
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Nombre</th>
	                                <th>Aula</th>
	                                <th>Teléfono</th>
	                                <th>Estado</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                             <tr>
	                                <th>Nombre</th>
	                                <th>Aula</th>
	                                <th>Teléfono</th>
	                                <th>Estado</th>
	                                <th>Acción</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	<?php
                                $grados = SelectWhere(
                                	"profesor.persona,profesor.condicion,persona.nombre,persona.telefono,aula.aula",
                                	"`profesor`,`aula`,`persona`",
                                	"`profesor`.aula=`aula`.id AND `profesor`.persona=`persona`.id");
                                foreach ($grados as $key => $value): 
                                ?>
		                        	<tr>
		                                <td><?= $grados["$key"]["nombre"]; ?></td>
		                                <td><?= $grados["$key"]["aula"]; ?></td>
		                                <td><?= $grados["$key"]["telefono"]; ?></td>
		                                <td>
		                                	<?php if ($grados["$key"]['condicion'] == 1): ?>
		                                		<span class="badge badge-success">Activo</span>
		                                	<?php else: ?>
		                                		<span class="badge badge-warning">Inactivo</span>
		                                	<?php endif ?>
		                                </td>
		                                <td> 
		                                	<div class="btn-group">
	                                			<a href="<?php echo _BASE_URL_?>pages/form_edit_prof.php?id=<?php echo $grados["$key"]["persona"]?>&database=profesor" class="btn btn-outline btn-primary text-white">
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