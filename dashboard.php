<?php 
include 'header.php';
$totalInscrito= selectWhere(
    'count(id)as total',
    'incripcion',
    "año_escolar='".$periodo['0']['id']."'"
);
$totalPreInscrito= selectWhere(
    'count(id) as total',
    'pre_incripcion',
    "perido_escolar='".$periodo['0']['id']."' AND statud=1"
);
$totalActivo= selectWhere(
    'count(alumnos.id) as total',
    'alumnos,incripcion',
    "alumnos.statud='1' AND alumnos.id=incripcion.alumno AND año_escolar='".$periodo['0']['id']."'"
);
$totalInactivo= selectWhere(
    'count(alumnos.id) as total',
    'alumnos,incripcion',
    "alumnos.statud='0' AND alumnos.id=incripcion.alumno AND (año_escolar='".$periodo['0']['id']."' OR año_escolar<>'".$periodo['0']['id']."')"
);
?>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Principal</h3>
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
                                <h5 class="text-muted m-b-0">Alumnos Inscritos</h5>
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
                                <h5 class="text-muted m-b-0">En Espera por Inscribir</h5>
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
                                <h5 class="text-muted m-b-0">Alumnos Activos</h5>
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
                                <h5 class="text-muted m-b-0">Alumnos Inactivos</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Alumnos por grados</h3>
                    </div>
                    <div class="card-body" style="padding: 10px">
                        <div class="ct-chart" style="height: 500px;padding: 10px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $incripcion = json_encode(selectWhere(
            "grados.grado, COUNT(incripcion.id) total",
            "incripcion, aula, grados",
            "incripcion.aula = aula.id AND aula.grado = grados.id GROUP BY grado ORDER BY grados.grado"
        ));
    ?>
<script>
    var label = new Array();
    var series = new Array();
    var data = $.parseJSON('<?= $incripcion?>');
    for (var i =0; i < data.length;i++) {
        label.push(data[i].grado);
        series.push(parseInt(data[i].total));
    }
     var chart2 = new Chartist.Bar('.ct-chart', {
        labels: label,
        series: [series]
    }, {
        axisX: {
            position: 'end',
            showGrid: false
        },
        axisY: {
            position: 'start',
            offset: 30
        },
        plugins: [
            Chartist.plugins.tooltip()
        ]
    });
    
    window.onpopstate = function (e) { window.history.forward(1); }

    </script>

<?php include 'footer.php'; ?>