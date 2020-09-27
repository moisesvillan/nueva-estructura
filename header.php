<?php 
session_start();
include 'scripts/functions.php';
if(!$_SESSION['autch']):
    header("location: "._BASE_URL_."index.php");
endif;

connect_mysqli();
$periodo =SelectWhere('*','periodo_escolar','statud=1');
$serve=explode('/', $_SERVER['SCRIPT_NAME']);
$JsonServe= json_encode($serve);
if (count($periodo)>0) {
   $fechaFinal=$periodo[0]["fecha_final"];
   $fechaActual=date('Y-m-d');
   if ($fechaActual >= $fechaFinal) {
        Update('periodo_escolar',array('statud'=>'0'),'id=\''.$periodo[0]['id'].'\'');
?>
        <script type="text/javascript">
            var url =<?= $JsonServe ?>;
            console.log(url);
            if (url.length<=3) {
                document.location="<?php echo _BASE_URL_?>"+url[2];
            }else{
                document.location="<?php echo _BASE_URL_?>"+url[2]+"/"+url[3];
            }
        </script>
<?php
   }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _BASE_URL_?>assets/images/favicon.png">
    <title>Sistema de inscripcion</title>
    <link href="<?php echo _BASE_URL_?>assets/plugins/wizard/steps.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo _BASE_URL_?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="<?php echo _BASE_URL_?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/wizard/jquery.validate.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/jquery-ui.js"></script>
</head>
<body>
    <?php
    if (count($periodo)<=0) {
        if ($serve['3']<>'new-escolar.php') {
    ?>
            <script type="text/javascript">
                swal('Advertencia!', 'No hay año escolar aperturado por favor verificar');
                document.location="<?php echo _BASE_URL_?>pages/new-escolar.php";
            </script>
    <?php
        }
    }?>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <?php include 'navbar.php';?>
        <?php include 'sidebar.php';?>
        <div class="page-wrapper">


