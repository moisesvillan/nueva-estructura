<?php 

session_start();
ob_start();
error_reporting(0);


//include'inactividad.php';

$varsesion = $_SESSION['persona'];
if($varsesion == null || $varsesion = ''){
    
  //  echo 'Usted no tiene autorizacion';
    header("location:../index.html");
    die();
    
    }

?>
