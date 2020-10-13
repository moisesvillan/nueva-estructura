        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile" style="background: url(<?php echo _BASE_URL_?>assets/images/background/user-info.jpg) no-repeat;">
                    <div class="profile-img">
                        <?php if(!empty($_SESSION['avatar'])): ?>
                            <img src="<?php echo _BASE_URL_?>uploads/avatar/<?php echo $_SESSION['avatar'] ?>" alt="user" />
                        <?php else: ?>
                            <img src="<?php echo _BASE_URL_?>assets/images/users/1.jpg" alt="user" />
                        <?php endif; ?>
                    </div>
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['nombre'] ?></a>
                        <div class="dropdown-menu animated flipInY"> 
                            <!--<a href="profile.php" class="dropdown-item">
                                <i class="ti-user"></i> 
                                Ver Perfil
                            </a>
                            <div class="dropdown-divider"></div>-->
                            <a href="<?php echo _BASE_URL_?>scripts/logout.php" class="dropdown-item">
                                <i class="fa fa-power-off"></i> Salir
                            </a> 
                        </div>
                    </div>
                </div>
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
                                                <i class="<?php echo $sub[$j]['icon']?>" style="margin-left: -10px;"></i>
                                                <span style="margin-left: -3px;"><?php  echo $sub[$j]['modulo']; ?></span>
                                                
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
            </div>
            <div class="sidebar-footer">
                <a href="<?php echo _BASE_URL_?>pages/email-inbox.php" class="link" data-toggle="tooltip" title="Email">
                    <i class="mdi mdi-gmail"></i>
                </a>
                <a href="<?php echo _BASE_URL_?>scripts/logout.php" class="link" data-toggle="tooltip" title="Logout">
                    <i class="mdi mdi-power"></i>
                </a>
            </div>
        </aside>
        