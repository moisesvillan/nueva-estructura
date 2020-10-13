<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal_form">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<div class="modal-header">
        		<h4 class="modal-title" id="exampleModalLabel1">Nuevo registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	</div>
        	<form id="data_form" action="#">
				<div class="modal-body" id="content"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Agregar</button>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
	$('#data_form').submit(function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
            type: "POST",
            url: "<?php echo _BASE_URL_;?>scripts/insert_data_form.php",
            data: formData,
            cache:false,
		    contentType: false,
		    processData: false,
            beforeSend: function(objeto){
            	swal("Cargando!");
            },
            success: function(response){
            	var response = $.parseJSON(response);
            	swal(response.titulo, response.descripcion);
            }
        });	
	});
	function search_data(table) {
		$.ajax({
                url: '../scripts/search_data_form.php',
                type: 'GET',
                data: { q: table},
                beforeSend: function(response){
                    $('#content').html("<h2>Cargando...</h2>");
                },
                success: function(response){
                	$("#content").html('');
                	$("#content").append(response);
                }
        });
	};
</script>