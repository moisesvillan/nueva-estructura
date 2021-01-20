 <?php include '../header.php'; ?>
 <div class="row text-center p-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<div class="float-right m-3">
            		<div class="btn-group">
            			<a href="#" data-toggle="modal" data-target="#add-new-event" class="btn btn-danger">
                            <i class="ti-plus"></i> Categoria
                        </a>
            		</div>
            	</div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN MODAL -->
<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Agregar Horario</strong></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Crear Evento</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Category -->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Agregar</strong> a Categoría </h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Nombre de La Categoría</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="nombre" id="nombre" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="class" id="class">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                                <option value="inverse">Inverse</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal" id="registro_cat">Guardar</button>
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    
	$('#registro_cat').click(function(event) {
        var array_data= Array();
        array_data['nombre'] = $('#nombre').val();
        array_data['class'] = $('#class').val();
        array_data['database'] = 'categoria';
        $.ajax({
            url: '../scripts/insert_data_form.php',
            type: 'POST',
            data: array_data,
            beforeSend: function(response){
                swal('Cargando....');
            },
            success: function(response){
                var response = $.parseJSON(response);
                swal(response.titulo, response.descripcion);
            }
        });
	});

    

    
</script>
 <?php include '../footer.php'; ?>