<?php include 'header.php'; ?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/claudio_inicio.png);">        
            <div class="login_c">
            
               
             <!-- ============================================================== -->
                <form class="form-horizontal form-material" id="loginform" action="scripts/validation.php" method="POST" >
                   
                    <h2 class="box-title m-b-20">Inicio de Sesión</h2>
                    <div class="form-group ">
                     <!-- ============================================================== -->  
                       
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="persona" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Usuario"> </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="contra" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Contraseña"> </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="in_in" type="submit">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
    
           
          </div>
        </div>
        
    </section>
<?php include 'footer.php'; ?>