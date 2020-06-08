<?php 

include 'abre_conexion.php';



$cedula = $_POST["cedula"];
$primer_apell = $_POST["primer_apell"];
$segund_apell = $_POST["segund_apell"];
$primer_nom = $_POST["primer_nom"];
$segun_nom = $_POST["segun_nom"];
$sexo = $_POST["sexo"];
$fecha_nacim =$_POST["fecha_nacim"];
$lugar_nacim = $_POST["lugar_nacim"];
$email= $_POST["email"];



$sql = "INSERT INTO $table_usuarios (cedula, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, sexo, fecha_de_nacimiento, lugar_de_nacimiento, email) VALUES ('$cedula','$primer_apell','$segund_apell','$primer_nom','$segun_nom','$sexo','$fecha_nacim','$lugar_nacim','$email')";

$result = mysqli_query($conexion,$sql);

if ($result) {
	echo "Datos Guardados Exitosamente";
	 echo "<BR>";
    echo "<a href='formulario.php'>Volver al Formulario</a>";


}
else{

	echo "ERROR EN LOS DATOS SUMINISTRADOS";
	 echo "<BR>";
    echo "<a href='formulario.php'>Volver al Formulario</a>";
}

//include 'cerrar_conexion.php';
// echo "Se ingreso los datos";


 ?>
