<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(<?php echo _BASE_URL_?>assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo _BASE_URL_?>uploads/avatar/<?php echo $_SESSION['avatar'] ?>" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['nombre'] ?></a>
                        <div class="dropdown-menu animated flipInY"> 
                            <a href="profile.php" class="dropdown-item">
                                <i class="ti-user"></i> 
                                Ver Perfil
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ti-email"></i> 
                                Inbox
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ti-settings"></i> 
                                Configuracion
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo _BASE_URL_?>scripts/logout.php" class="dropdown-item">
                                <i class="fa fa-power-off"></i> Salir
                            </a> 
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <?php
                if($_SESSION['type'] == 1){
                    $data = SelectWhere(
                        "icon, modulo, Padre, url, ruta",
                        "`ruta`",
                        "Padre='0'"
                    );
                }else{
                    $data = SelectWhere(
                        "icon, modulo, Padre, url, ruta",
                        "`ruta`,`permisos`",
                        "permisos.persona = '".$_SESSION['id']."' AND permisos.ruta=ruta.ruta"
                    );
                }
                
                $Padre = null;
                ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php 
                        for ($i=0; $i < count($data); $i++) : ?>
                            <li>
                            <?php if($data[$i]['Padre'] == 0):?>
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="<?php echo $data[$i]['icon']?>"></i>
                                    <span class="hide-menu"><?php echo $data[$i]['modulo']?></span>
                                </a>
                                <?php  
                                    $Padre = $data[$i]['ruta']; 
                                    $sub = SelectWhere("icon, modulo, Padre, url","`ruta`","Padre='".$Padre."'");
                                ?>
                                <ul aria-expanded="false" class="collapse">
                                    <?php for ($j=0; $j < count($sub); $j++):?>
                                        <li>
                                            <a href="<?php echo _BASE_URL_?>pages/<?php  echo $sub[$j]['url']; ?>">
                                                <i class="<?php echo $sub[$j]['icon']?>"></i>
                                                <?php  echo $sub[$j]['modulo']; ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </li>
                            <?php endif;?>
                        <?php endfor;?>
                        <li class="nav-devider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="<?php echo _BASE_URL_?>scripts/logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        