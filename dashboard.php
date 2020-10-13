<?php 
include 'header.php';
$totalInscrito= selectWhere('count(id)as total','incripcion',"año_escolar='".$periodo['0']['id']."'");
$totalPreInscrito= selectWhere('count(id) as total','pre_incripcion',"perido_escolar='".$periodo['0']['id']."'");
$totalActivo= selectWhere('count(id) as total','alumnos','statud="1"');
$totalInactivo= selectWhere('count(id) as total','alumnos','statud="0"');
?>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <img src="assets/img/incripcion.png" width="50">
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-light"><?= $totalInscrito['0']['total']?></h3>
                                <h5 class="text-muted m-b-0">inscrito</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-warning"><img src="assets/img/incripcion.png" width="50"></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht"><?= $totalPreInscrito['0']['total']?></h3>
                                <h5 class="text-muted m-b-0">pre-inscrito</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-primary"><img src="assets/img/alumno.png" width="40" style="padding: 5"></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht"><?= $totalActivo['0']['total']  ?></h3>
                                <h5 class="text-muted m-b-0">alumnos activos</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-danger"><img src="assets/img/alumno.png" width="40" style="padding: 5"></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht"><?= $totalInactivo['0']['total']  ?></h3>
                                <h5 class="text-muted m-b-0">alumnos inactivos</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>