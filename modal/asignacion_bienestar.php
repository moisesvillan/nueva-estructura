 <div class="modal fade" id="asignacion_bienestar" tabindex="-1" role="dialog" aria-labelledby="asignacion_bienestar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Asignacion de bienestar social</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary" id="Agregar_beneficio">Asignar</a>
            </div>
        </div>
    </div>
</div>
<script>
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
                    location.reload()
                    
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


