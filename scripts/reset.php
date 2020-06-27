<?php  

include 'functions.php';

if(isset($_POST['user'])){
	$response = SelectWhere("*",'usuario',"name_user ='".$_POST['user']."' OR name_user ='".$_POST['user']."'");
	$response=$response[0];
	if ($response > 0) {

        $new_pass = random_bytes(10);
        $array['pass']= $new_pass;
        $update = Update('usuario',$array,"name_user ='".$_POST['user']."' OR name_user ='".$_POST['user']."'");
    	
        $datos=array('accion' => "el usuario ".$response['name_user']." a reseteado su contraseña por motivos de olvido el dia ".date('Y-m-d h:i:s'),'type_his' => $response['type_user']);
        $inicio = Insert('historico',$datos);
        if (empty($inicio)) {
            echo 1;
        }else{
            echo $inicio;
        }
	}else{
    	echo "Correo no registrado";
	}
    close_mysqli();
}
?>