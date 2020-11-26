 <?php include '../header.php';
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
  <style type="text/css">
    .ct-chart {
           position: relative;
       }
       .ct-legend {
           position: relative;
           z-index: 10;
           list-style: none;
           text-align: center;
       }
       .ct-legend li {
           position: relative;
           padding-left: 23px;
           margin-right: 10px;
           margin-bottom: 3px;
           cursor: pointer;
           display: inline-block;
       }
       .ct-legend li:before {
           width: 12px;
           height: 12px;
           position: absolute;
           left: 0;
           content: '';
           border: 3px solid transparent;
           border-radius: 2px;
       }
       .ct-legend li.inactive:before {
           background: transparent;
       }
       .ct-legend.ct-legend-inside {
           position: absolute;
           top: 0;
           right: 0;
           margin-top: 69px;
        margin-bottom: 1rem;
        margin-right: 50px;
       }
       .ct-legend.ct-legend-inside li{
           display: block;
           margin: 0;
           margin-top: 69px;
        margin-bottom: 1rem;
        margin-right: 50px;
       }
       .ct-legend .ct-series-0:before {
           background-color: #d70206;
           border-color: #d70206;
       }
       .ct-legend .ct-series-1:before {
           background-color: #f05b4f;
           border-color: #f05b4f;
       }
       .ct-legend .ct-series-2:before {
           background-color: #f4c63d;
           border-color: #f4c63d;
       }
       .ct-legend .ct-series-3:before {
           background-color: #d17905;
           border-color: #d17905;
       }
       .ct-legend .ct-series-4:before {
           background-color: #453d3f;
           border-color: #453d3f;
       }

       .ct-chart-line-multipleseries .ct-legend .ct-series-0:before {
          background-color: #d70206;
          border-color: #d70206;
       }

       .ct-chart-line-multipleseries .ct-legend .ct-series-1:before {
          background-color: #f4c63d;
          border-color: #f4c63d;
       }

       .ct-chart-line-multipleseries .ct-legend li.inactive:before {
          background: transparent;
        }

       .crazyPink li.ct-series-0:before {
          background-color: #C2185B;
          border-color: #C2185B;
       }

       .crazyPink li.ct-series-1:before {
          background-color: #E91E63;
          border-color: #E91E63;
       }

       .crazyPink li.ct-series-2:before {
          background-color: #F06292;
          border-color: #F06292;
       }
       .crazyPink li.inactive:before {
          background-color: transparent;
       }

       .crazyPink ~ svg .ct-series-a .ct-line, .crazyPink ~ svg .ct-series-a .ct-point {
          stroke: #C2185B;
       }

       .crazyPink ~ svg .ct-series-b .ct-line, .crazyPink ~ svg .ct-series-b .ct-point {
          stroke: #E91E63;
       }

       .crazyPink ~ svg .ct-series-c .ct-line, .crazyPink ~ svg .ct-series-c .ct-point {
          stroke: #F06292;
       }

       #any-div-anywhere{
           border: 1px solid #5b4421;
       }
</style>
    <div class="container-fluid">
        <div class="row page-titles">
           <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Reporte periodo escolar</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Reporte periodo escolar</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <img src="../assets/img/incripcion.png" width="50">
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
                            <div class="round round-lg align-self-center round-warning"><img src="../assets/img/incripcion.png" width="50"></div>
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
                            <div class="round round-lg align-self-center round-primary"><img src="../assets/img/alumno.png" width="40" style="padding: 5"></div>
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
                            <div class="round round-lg align-self-center round-danger"><img src="../assets/img/alumno.png" width="40" style="padding: 5"></div>
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
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Alumnos por sexo</h3>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div id="donut" class="ct-series-a ct-slice-donut" style="height: 250px;padding: 5px;"></div>
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
        $alumno_sexo = json_encode(selectWhere(
            "sexo, count(incripcion.id)total",
            "incripcion, alumnos",
            "incripcion.alumno = alumnos.id GROUP BY sexo"
        ));
    ?>
<script>
    var label_pie = new Array();
    var series_pie = new Array();
    var data_pie = $.parseJSON('<?= $alumno_sexo ?>');
    for (var i =0; i < data_pie.length;i++) {
        if (data_pie[i].sexo == 0) {
            label_pie.push("Varones");
        }else{
            label_pie.push("Hembras");
        }
        series_pie.push(parseInt(data_pie[i].total));
    }
    var pie =  new Chartist.Pie('#donut', {
        labels: label_pie,
        series: series_pie
    }, {
        donut: true,
        donutWidth: 60,
        donutSolid: true,
        startAngle: 270,
        showLabel: true,
        plugins: [
            Chartist.plugins.legend()
        ],
        labelInterpolationFnc: function(value, idx) {
            return series_pie[idx];
        }
    },'donut');

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

 <?php include '../footer.php'; ?>