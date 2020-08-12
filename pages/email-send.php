 <?php include '../header.php'; ?>
 <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Correo</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Correo</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-4 col-md-4">
                        <?php include '../layout/correo-sidabar.php' ?>
                    </div>
                    <div class="col-xlg-10 col-lg-8 col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Nuevo Mensaje</h3>
                             <form aaction="action" validate id="form-correo" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <input class="form-control" id="para" name="para" placeholder="To:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="asunto" name="asunto" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea class="textarea_editor form-control" rows="15" id="mensaje" name="mensaje" placeholder="Enter text ..."></textarea>
                            </div>
                            <h4><i class="ti-link"></i> Adjunto</h4>
                            <div class="fallback dropzone">
                                <input name="file" type="file" multiple id="adjunto" name="adjunto" />
                            </div>
                            <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o" ></i> Enviar</button>
                            <button class="btn btn-inverse m-t-20"><i class="fa fa-times"></i> Descartar</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    $('#form-correo').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        console.log(formData[0]);
        console.log(formData.values);
        /*$.ajax({
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
            });*/           
    });
    
</script>
 <?php include '../footer.php'; ?>