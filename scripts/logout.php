<?php  

include "functions.php";


session_destroy();

close_mysqli();

header('location:../index.php');

?>