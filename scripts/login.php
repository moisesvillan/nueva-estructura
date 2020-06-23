<?php  

include 'functions.php';

connect_mysqli();

if(isset($_POST['user']) && isset($_POST['pass'])){
	$response = SelectWhere("nick, rol, persona, clave, avatar, persona.nombre, persona.email",'usuario, persona',"nick ='".$_POST['user']."' OR persona.email ='".$_POST['user']."' AND usuario.persona=persona.id");
    $response= $response[0];
	if (password_verify($_POST['pass'], $response["clave"])) {
		session_start();
    	$_SESSION['user'] = $response['nick'];
        $_SESSION['type'] = $response['rol'];
        $_SESSION['id'] = $response['persona'];
        $_SESSION['nombre'] = $response['nombre'];
        $_SESSION['email'] = $response['email'];
        $_SESSION['autch'] = TRUE;
        $_SESSION['avatar'] = $response['avatar'];

        $datos=array('accion' => "el usuario ".$response['nick']." a iniciado session el dia ".date('Y-m-d h:i:s'),'type_his' => $response['rol']);
        $inicio = Insert('historico',$datos);

        if (empty($inicio)) {
            echo 1;
        }else{
            echo $inicio;
        }
	}else{
    	echo "error contraseña";
	}
	close_mysqli();
}
?>