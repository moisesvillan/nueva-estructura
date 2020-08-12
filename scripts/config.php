<?php

define('HOST','localhost');
define('USER','root');
define('PASS','23124156');
define('DATABASE','sistema');
date_default_timezone_set('America/Caracas');
define('_BASE_URL_', 'http://' . $_SERVER['HTTP_HOST'] . '/nueva-estructura/');
define('_BASE_FOLDER_', $_SERVER['DOCUMENT_ROOT'].'/nueva-estructura/');
define('_BASE_FOLDER_UPLOADS', $_SERVER['DOCUMENT_ROOT'].'/nueva-estructura/uploads');


// configuracion del manejador de archivo
define('ALLOW_DELETE',true); // Establezca en falso para deshabilitar el botón Eliminar y eliminar la solicitud POST.
define('ALLOW_UPLOAD',true); // Establecer en verdadero para permitir cargar archivos
define('ALLOW_CREATE_FOLDER',true); // Establecer en falso para deshabilitar la creación de carpetas
define('ALLOW_DIRECT_LINK',true); // Establecer en falso para permitir solo descargas y no enlaces directos
define('ALLOW_SHOW_FOLDERS',true); // Establecer en falso para ocultar todos los subdirectorios

define('DISALLOWED_EXTENSIONS',['php','js','html']);  // debe ser una matriz. Extensiones no permitidas para cargar
define('HIDDEN_EXTENSIONS',['php','js','html']); // debe ser una matriz de extensiones de archivo en minúsculas. Extensiones ocultas en el índice del directorio
define('PASSWORD',''); // Establezca la contraseña para acceder al administrador de archivos ... (opcional)
// debe estar en UTF-8 o `basename` no funciona
setlocale(LC_ALL,'en_US.UTF-8');

//api consulta de cedula
define('Api_cedula','https://cuado.co:444/api/v1');
define('Api_id','426');
define('Api_token','cceb5e15f041f0ff58f22a37bb2983db');
?>