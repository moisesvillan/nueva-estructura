 <div class="modal fade" id="asignacion_bienestar" tabindex="-1" role="dialog" aria-labelledby="asignacion_bienestar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Asignacion de bienestar social</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_asignacion" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Aula:</label>
                        <select name="aula" id="aula" class="form-control custom-select">
                            <option value="null" selected>Seleccione una opcion</option>
                            <?php 
                            $aula = SelectAll('*','aula'); 
                            if(count($aula)>0): ?>
                                <?php foreach ($aula as $value):?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['aula'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Alumnos:</label>
                        <select name="alumno" id="alumno" class="form-control custom-select disabled" disabled>
                            <option value="null" selected>Seleccione un beneficiario</option>
                        </select>
                    </div>
                    <div style="display: none;" id="tecnologia">
                        <label for="recipient-name" class="control-label">Tipo de beneficio:</label>
                        <div class="from-group input-group mb-3" >
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="agg"><i class="mdi mdi-plus-circle mdi-large"></i></button>
                            </div>
                            <select name="categoria_beneficio" id="categoria_beneficio" class="form-control custom-select">
                                <option value="null" selected>Seleccione un beneficio</option>
                                <?php 
                                $tecnologia = SelectWhere('*','categoria_beneficio',"beneficio='4'"); 
                                if(count($tecnologia)>0): ?>
                                    <?php foreach ($tecnologia as $value):?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="result" style="display: none;">
                            <div class="from-group">
                                <input type="text" id="N_tipo_beneficio" name="N_tipo_beneficio" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_registro">Asignar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
         var beneficio = "<?php echo strtolower($_SERVER['REQUEST_URI'])?>";
        beneficio = beneficio.split('/');
        beneficio = beneficio[3];
        beneficio = beneficio.slice(0,-4);
        if (beneficio == 'tecnologia') {
            $("#tecnologia").removeAttr('style');
        }
    });
    $('#btn_registro').click(function(event) {
        var beneficio = "<?php echo strtolower($_SERVER['REQUEST_URI'])?>";
        beneficio = beneficio.split('/');
        beneficio = beneficio[3];
        beneficio = beneficio.slice(0,-4);
        var formData = new FormData($("#form_asignacion")[0]);
        formData.append('beneficio',beneficio);
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
                document.location.reload();
            }
        }); 
    });
    $('#agg').click(function(event) {
        $("#result").removeAttr('style');
    });

    $('#agg').dblclick(function(event) {
        $("#result").attr('style', 'display: none;');
    });
    $('#Agregar_beneficio').click(function(event) {
        var beneficio = "<?php echo strtolower($_SERVER['REQUEST_URI'])?>";
        beneficio = beneficio.split('/');
        beneficio = beneficio[3];
        beneficio = beneficio.slice(0,-4);
        var array_data= Array();
        array_data['aula'] = $('#aula').val();
        array_data['alumno'] = $('#alumno').val();
        array_data['database'] = beneficio;
        $.ajax({
                url: '../scripts/insert_data_form.php',
                type: 'POST',
                data: array_data,
                beforeSend: function(response){
                    $('#alumno')[0].options.remove(0);
                    $('#alumno').append('<option value="null" >Cargando...</option>');
                },
                success: function(response){
                    var response = $.parseJSON(response);
                    $('#alumno')[0].options.remove(0);
                    if(response['error']){
                        $('#alumno').append('<option value="'+response['id']+'" >'+response['Nombre']+'</option>');
                    }else{
                        for (var i = 0; i < response.length; i++) {
                            $('#alumno').append('<option value="'+response['i']['id']+'" >'+response['i']['Nombre']+'</option>');
                        }
                        
                    }
                    document.location.reload();
                    
                    
                }
            });
    });
    $('#aula').change(function(event) {
        if($('#aula').val() == 'null'){
            $('#alumno').addClass('disabled')
            $('#alumno').attr('disabled', '');
        }else{
            $('#alumno').removeClass('disabled');
            $('#alumno').removeAttr('disabled');
            $.ajax({
                url: '../scripts/search.php',
                type: 'GET',
                data: {q: $('#aula').val()},
                beforeSend: function(response){
                    var alumno = $('#alumno')[0];
                    $('#alumno').children('option:not(:first)').remove();
                },
                success: function(response){
                    var alumno = $('#alumno')[0];
                    var response = $.parseJSON(response);
                    $('#alumno').children('option:not(:first)').remove();
                    if(response['error']){
                        $('#alumno').append('<option value="'+response.id+'" >'+response.Nombre+'</option>');
                    }else{
                        for (var i = 0; i < response.length; i++) {
                            $('#alumno').append('<option value="'+response[i]['id']+'" >'+response[i]['Nombre']+'</option>');
                        }
                        
                    }
                    
                }
            });
            
        }
    });
    
</script>


