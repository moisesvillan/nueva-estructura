<?php include 'header.php'?>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(./assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            	<span id="mensaje"></span>
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="index.html">
                    <h3 class="box-title m-b-20">Inicio de sesion</h3>
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
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Perdiste tu contraseña?</a> </div>
                    	</div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                        	<a href="#" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="btnLogin">Iniciar</a>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>No posees cuenta? <a href="register.php" class="text-info m-l-5"><b>Registrarme</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recuperar Contraseña</h3>
                            <p class="text-muted">Ingresa tu corre electronico registrado en el sistema y nosostros te enviaremos las intrucciones</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="correo" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                        	<a href="#" id="btnReset" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Resetiar</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        
    </section>
    <script>
    	$("#btnReset").click(function() {
    		let correo = $('#correo').val();
    		if (correo == "") {
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
                        $("#mensaje").html('<div class="alert alert-warning text-center text-warning w-100">'+response+'</div>');
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
                    $("#mensaje").html('<div class="alert alert-warning">Nigunos de los campos puede estar vacios</div>');
                },1000);
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                },2000);
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
<?php include 'footer.php'?>