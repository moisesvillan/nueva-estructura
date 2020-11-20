<?php include 'scripts/functions.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>Sistema Claudio Feliciano</title>
    <link href="<?php echo _BASE_URL_?>assets/plugins/wizard/steps.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="<?php echo _BASE_URL_?>assets/plugins/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(./assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            	<span id="mensaje"></span>
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="index.html">
                    <h3 class="box-title m-b-20">Inicio de Sesión</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="user" required placeholder="Usuario"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="pass" required placeholder="Contraseña"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> ¿Perdiste tu contraseña?</a> </div>
                    	</div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                        	<a href="#" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="btnLogin">Iniciar</a>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recuperar Contraseña</h3>
                            <p class="text-muted">Ingresa tu correo electronico registrado en el sistema y espera a las Instrucciones del Administrador del Sistema.</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="correo" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                        	<a href="#" id="btnReset" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Restablecer</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        
    </section>
    <script>



    	$("#btnReset").on('click',function() {
    		let correo = $('#correo').val();
    		if (correo == "") {
    			setTimeout(function() {
                    $("#mensaje").html('<div class="alert alert-warning">Nigun Campo puede estar vacío</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                },2000);
                 location.reload();
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
                    	console.log(response);
                      if (response == 1) {
                        document.location = "index.php";
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
    	});
        $("#btnLogin").click(function(){
            let user = $('#user').val();
            let pass = $('#pass').val();
            if(user == "" || pass == ""){
                setTimeout(function() {
                    $("#mensaje").html('<div class="alert alert-warning">Nigun Campo puede estar vacío</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(2000);
                },4000);
                location.reload();

            }else{
            	$.ajax({
                    type: "POST",
                    url: "scripts/login.php",
                    data:{user: user,pass: pass},
                    beforeSend: function(objeto){
                      setTimeout(function() {
                        $("#mensaje").html('<div class="alert alert-success text-center text-success w-100">Cargando......</div>');
        			        },1000);
        				      setTimeout(function() {
        				        $("#mensaje").fadeOut(1500);
        				      },2000);
                    },
                    success: function(response){
                    	console.log(response);
                      if (response == 1) {
                        document.location = "dashboard.php";
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
        });
        
    </script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/waves.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/sidebarmenu.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/custom.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
