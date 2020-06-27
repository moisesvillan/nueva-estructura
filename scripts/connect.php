<?php 

include 'config.php';

$conn=null;
function connect_mysqli()
{
	global $conn;

	$conn= mysqli_connect(HOST,USER,PASS,DATABASE) ;

	if (mysqli_connect_errno()) {
	    printf("Conexión fallida: %s\n", mysqli_connect_error());
	    exit();
	}

	return $conn;
}

function close_mysqli()
{
	global $conn;

	mysqli_close($conn);
}

 ?>