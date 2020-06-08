<?php 

 
session_start();
ob_start();
include 'open_conection.php';
sleep(3);

$conexion = mysqli_connect("$servidor","$user", "$password", "$bd");

error_reporting(0);
$persona = $_POST['persona'];

$contra = $_POST['contra'];


error_reporting(0);

$_SESSION['persona'] = $persona;


if($persona == "" || $contra == ""){
    
   header("location:./index.php");
         
}

$consulta = "SELECT * FROM $table_inicio WHERE usuario = '$persona' AND clave = '$contra' ";

 $resultado=mysqli_query($conexion,$consulta);


 $filas=mysqli_num_rows($resultado);
 if ($filas>0) {
 header("location:../dashboard/index.php");
 }
 else{

echo'<script type="text/javascript">
    alert("Usuario o Contaseña Incorrecta.. ");
    </script>';
         
     echo '<script>
setTimeout(function(){ 
window.location="./index.php"
},0);
</script>';
     
     
 }

$varsesion = $_SESSION['persona'];
if($varsesion == null || $varsesion = ''){
    
   // echo 'Usted no tiene autorizacion';
 header("location:./index.php");
    die();
}




