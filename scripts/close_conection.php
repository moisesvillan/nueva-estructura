 <?php 
session_start();
ob_start();
   
error_reporting(0);
$varsesion = $_SESSION['persona'];
if($varsesion == null || $varsesion = ''){
    
    echo 'Usted no tiene autorizacion';
    die();
}
    sleep(2);
session_destroy();


header("location:../index.php");

 ?>