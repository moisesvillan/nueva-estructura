<?php include "header.php" ?>
<section id="wrapper">
        <div class="login-register" style="background-image:url(./assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <span id="mensaje"></span>
                <form class="form-horizontal form-material" id="loginform" action="#">
                    <h3 class="box-title m-b-20">Registro</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="user" name="user" type="text" required="" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" id="correo" name="correo" type="text" required="" placeholder="Correo">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" id="pass" name="pass" type="password" required="" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="pass_conf" name="pass_conf" type="password" required="" placeholder="Confirme la contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-success p-t-0 p-l-10">
                                <input id="checkbox-signup" type="checkbox" id="terms" name="terms">
                                <label for="checkbox-signup"> Estoy de acuerdo con todo los <a href="#">Terminos</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <a href="#" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="btnSend">Registrarme</a>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Ya posee un cuenta ? <a href="login.php" class="text-info m-l-5"><b>Ingresar</b></a></p>
                        </div>
                    </div>
                </form>
                
            </div>
          </div>
        </div>
        
    </section>
<script>
    $("#btnSend").click(function() {
        let terms = $('#terms').val();
        let user = $('#user').val();
        let correo = $('#correo').val();
        let pass = $('#pass').val();
        let pass_conf = $('#pass_conf').val();
        console.log(terms);
        if (terms) {
            if ((user == '' || user == undefined ) && 
                (correo == '' || correo == undefined ) && (pass == '' || pass == undefined ) && 
                (pass_conf == '' || pass_conf == undefined )
            ) {
                setTimeout(function() {
                    $("#mensaje").html('<div class="alert alert-warning">Nigunos de los campos puede estar vacios</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                },2000);
            }else{
                $.ajax({
                    type: "POST",
                    url: "scripts/reset.php",
                    data:{correo: correo},
                    beforeSend: function(objeto){
                      setTimeout(function() {
                        $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
                            },1000);
                              setTimeout(function() {
                                $("#mensaje").fadeOut(1500);
                              },2000);
                    },
                    success: function(response){
                      if (response == 1) {
                        document.location = "login.php";
                      }else{
                        setTimeout(function() {
                          $("#mensaje").html('<div class="alert alert-warning text-center text-warning w-100">'+response+'</div>');
                        },1000);
                        setTimeout(function() {
                            $("#mensaje").fadeOut(1500);
                        },2000);
                      }
                    }
                });
            }
        }else{
            setTimeout(function() {
                $("#mensaje").html('<div class="alert alert-warning">Debe aceptar los terminos y condiciones</div>');
            },1000);
            setTimeout(function() {
                $("#mensaje").fadeOut(1500);
            },2000);
        }
    });
</script>
<?php include "footer.php" ?>