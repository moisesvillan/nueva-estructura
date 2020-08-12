<?php 
session_start();
include 'scripts/functions.php';
if(!$_SESSION['autch']):

    header("location: "._BASE_URL_."index.php");
endif;

connect_mysqli();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>Sistema de inscripcion</title>
    <link href="<?php echo _BASE_URL_?>assets/plugins/wizard/steps.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo _BASE_URL_?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
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
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <?php include 'navbar.php';?>
        <?php include 'sidebar.php';?>
        <div class="page-wrapper">


