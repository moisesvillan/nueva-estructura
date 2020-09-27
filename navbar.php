<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo _BASE_URL_?>dashboard.php">
                        <b>
                            <img src="<?php echo _BASE_URL_?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo _BASE_URL_?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                         <img src="<?php echo _BASE_URL_?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />    
                         <img src="<?php echo _BASE_URL_?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>           
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(!empty($_SESSION['avatar'])): ?>
                                    <img src="<?php echo _BASE_URL_?>uploads/avatar/<?php echo $_SESSION['avatar'] ?>" alt="user" class="profile-pic" />
                                <?php else: ?>
                                    <img src="<?php echo _BASE_URL_?>assets/images/users/1.jpg" alt="user" class="profile-pic" />
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <?php if(!empty($_SESSION['avatar'])): ?>
                                                    <img src="<?php echo _BASE_URL_?>uploads/avatar/<?php echo $_SESSION['avatar'] ?>" alt="user" class="profile-pic" />
                                                <?php else: ?>
                                                    <img src="<?php echo _BASE_URL_?>assets/images/users/1.jpg" alt="user" class="profile-pic" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['nombre'] ?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['email'] ?></p>
                                                <!--<a href="profile.php" class="btn btn-rounded btn-danger btn-sm">Ver Perfil</a>-->
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo _BASE_URL_?>scripts/logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        