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
$conteo= selectWhere(
    'count(incripcion.id) as total,
SUM(CASE WHEN incripcion.statud = 1 THEN 1 ELSE 0 END)as totalActivo,
SUM(CASE WHEN incripcion.statud = 0 THEN 1 ELSE 0 END)as totalInactivo',
    'alumnos,incripcion',
    "alumnos.statud='1' AND alumnos.id=incripcion.alumno AND año_escolar='".$periodo['0']['id']."'"
);
$conteo=$conteo[0];
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
                                <h3 class="m-b-0 font-lgiht"><?= $conteo['totalActivo'];  ?></h3>
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
                                <h3 class="m-b-0 font-lgiht"><?= $conteo['totalInactivo'];  ?></h3>
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
                        <div id="alumno" style="height: 500px;padding: 10px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Alumnos por sexo</h3>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div id="donut" style="height: 250px;padding: 5px;"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php 
        $incripcion = json_encode(selectWhere(
            "concat(grados.grado,' ',secciones.seccion) aula,
            aula.disponibilidad,
SUM(CASE WHEN incripcion.statud = 1 THEN 1 ELSE 0 END)as Activos,
SUM(CASE WHEN incripcion.statud = 0 THEN 1 ELSE 0 END)as Inactivos",
            "incripcion, alumnos,grados, secciones, aula",
            "incripcion.alumno=alumnos.id AND incripcion.aula=aula.id AND aula.grado=grados.id AND aula.seccion=secciones.id GROUP BY grados.id"
        ));
  
        $categori = json_encode(selectWhere(
            "concat(grados.grado,' ',secciones.seccion) aula,
SUM(CASE WHEN alumnos.sexo = 1 THEN 1 ELSE 0 END)as Femenino,
SUM(CASE WHEN alumnos.sexo = 0 THEN 1 ELSE 0 END)as Masculino",
            "incripcion, alumnos,grados, secciones, aula",
            "incripcion.alumno=alumnos.id AND incripcion.aula=aula.id AND aula.grado=grados.id AND aula.seccion=secciones.id GROUP BY grados.id"
        ));
    ?>
<script>
  var data_categoria =<?= $categori?>;
  var categoria= new Array();
  var feme= new Array();
  var mascu= new Array();
  for (var i =0; i < data_categoria.length; i++) {
    categoria.push(data_categoria[i].aula);
    feme.push(data_categoria[i].Femenino);
    mascu.push(data_categoria[i].Masculino);
  }
  var options = {
          series: [{
          name: 'Femenina',
          data: feme
        }, {
          name: 'Masculino',
          data: mascu
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
        },
        colors: ['#FF4560','#008FFB'],
        plotOptions: {
          bar: {
            horizontal: true,
          },
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: categoria,
          labels: {
            formatter: function (val) {
              return val
            }
          }
        },
        yaxis: {
          title: {
            text: undefined
          },
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        },
        fill: {
          opacity: 1
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40
        }
        };

        var chart = new ApexCharts(document.querySelector("#donut"), options);
        chart.render();
</script>
<script>
  var data_categoria =<?= $incripcion?>;
  var aula= new Array();
  var act= new Array();
  var inac= new Array();
  var disp= new Array();
  for (var i =0; i < data_categoria.length; i++) {
    aula.push(data_categoria[i].aula);
    act.push(data_categoria[i].Activos);
    inac.push(data_categoria[i].Inactivos);
    disp.push(data_categoria[i].disponibilidad);
  }
      
        var options = {
          series: [{
          name: 'Alumnos Activos',
          data: act
        }, {
          name: 'Alumnos Inactivos',
          data: inac
        }, {
          name: 'Cupos disponibilidad',
          data: disp
        }],
        colors: ['#284DEE','#FC1E1E','#9B65F5'],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          stackType: '100%'
        },
        plotOptions: {
          bar: {
            horizontal: true,
          },
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: aula,
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        },
        fill: {
          opacity: 1
        
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40
        }
        };

        var chart = new ApexCharts(document.querySelector("#alumno"), options);
        chart.render();
</script>

<?php include 'footer.php'; ?>