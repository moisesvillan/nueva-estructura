<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>Generar PDF con PHP</title>
        <style type="text/css">
        body {
            font-family: 'verdana' !important;
            color: #333;
        }
        #text{
            font-size: 12px;
        }
        #cabecera{
      
        }
        h2,h3{
            float:left;
        }
        #cabecera h2{
        
        }
        #cabecera img{
            width: 140px;
            
            
        }

        tr {
            border: solid 1px #000;
        }
        td {
            border: solid 1px #000;
        }
        </style>
    </head>
    <body>
<?php
include "../scripts/functions.php";

connect_mysqli();

$datos=SelectWhere(
    "alumnos.*,familiares.id as id_familiar ,familiares.*,aula.aula as nom_aula,grados.grado,secciones.seccion as nom_sec,periodo_escolar.titulo,incripcion.*",
    "alumnos,familiares,aula,periodo_escolar,incripcion,grados,secciones",
    "incripcion.alumno=alumnos.id AND incripcion.representante=familiares.id AND incripcion.año_escolar=periodo_escolar.id AND incripcion.aula=aula.id AND aula.grado=grados.id AND aula.seccion=secciones.id AND alumnos.id='".$_GET['estudiante']."'"
);
$datos=$datos[0];
?>
<div style="position: relative; margin-bottom: 20px;"  id="cabecera">
    <div style=" width: 10%;" class="dos">
        <img style="float: left;" src="<?= _BASE_URL_?>/scripts/pdf/logo.png" width="65">
    </div>

    <div style="width: 80%; position: absolute; left: 70px;" class="cinti">
        <h4 style="padding: 0px; margin: 0px; text-align: center; color: #333;">República Bolivariana de Venezuela</h4>
        <h4 style="padding: 0px; margin: 0px; text-align: center; color: #333;">Ministerio del poder popular para la educación</h4>
        <h4 style="padding: 0px; margin: 0px; text-align: center; color: #333;">U.E.N.B Claudio Feliciano</h4>
        <h6 style="text-align: center;"><p style="margin: 0px;">Caracas , Venezuela </p>Teléfono:(0212)433.62.12 (0424)105.24.51</h6>
    </div>
    
    <div style="border:solid 1px #ccc; position: absolute; right: 0px; width: 10%; height: 90px;" class="con-foto">
        <div style="text-align: center;" class="foto">
            <h6 style="margin-top: 40px; color:#333;">Foto Estudiante</h6>
        </div>
    </div>

    <div style="border:solid 1px #ccc; position: absolute; left:590px; width: 10%; height: 90px;" class="con-foto">
        <div style="text-align: center;" class="foto">
            <h6 style="margin-top: 40px; color:#333;">Foto Representante</h6>
        </div>
    </div>
</div>

<table style="width: auto;">
    <tr>
        <th style="color: #333;">
            Fecha de Inscripción
        </th> 
    </tr>
    <tr align="center">
        <td style="color: #333;"><?= date('d-m-Y', strtotime($datos['fecha_inscrip'])); ?></td>
    </tr>
</table><br>

<!--<img src="logo.png">-->
<table style=" border-collapse: collapse;">
    <tr>
        <td align="center" valign="middle" colspan="5" style="text-align: center; color: #333;"><h4>DATOS DEL ALUMNO:</h4></td>
    </tr>
    <tr align="center" style="">
        <td width="200" style="font-weight: bold; color:#333;" id="text">Cédula Escolar o Cédula de Identidad</td>
        <td width="150" style="font-weight: bold; color:#333;border-top: solid 1px;" id="text">Nombres</td>
        <td width="150" style="font-weight: bold; color:#333;border-top: solid 1px;" id="text">Apellidos</td>
        <td width="100" style="font-weight: bold; color:#333;border-top: solid 1px;" id="text">Fecha de Nacimiento</td>
        <td width="110" style="font-weight: bold; color:#333;border-top: solid 1px;" id="text">Lugar de Nacimiento</td>
    </tr>
    <tr align="center">
        <td style=" color:#333;" id="text"><?= $datos['nacionalidad']?><?= $_GET['estudiante']?></td>
        <td style=" color:#333;" id="text"><?= $datos['nombres']?></td>
        <td style=" color:#333;" id="text"><?= $datos['apellidos']?></td>
        <td style=" color:#333;" id="text"><?= date('d-m-Y', strtotime($datos['fecha'])); ?></td>
        <td style=" color:#333;" id="text"><?= $datos['Lnaciomiento']?></td>
    </tr>
    <tr align="center">
        <td width="50"  style=" font-weight: bold; color: #333;" id="text">Edad</td>
        <td width="50"  style=" font-weight: bold; color: #333;" id="text">Sexo</td>
        <td width="100"  style=" font-weight: bold; color: #333;" id="text">Correo</td>
        
        <td width="200" colspan="2" style=" font-weight: bold; color: #333; " id="text">Dirección</td>
        
    </tr>
    <tr align="center">
        <td width="50"  style=" color: #333; padding: 1.6px; " id="text"><?= $datos['edad']?></td>
        <td width="50" style=" color: #333; padding: 1.6px; " id="text">
            <?php if ($datos['sexo'] == 0) {
                echo "MASCULINO ";
            }elseif($datos['sexo'] == 1){
                echo "FEMENINO";
            }
            ?>
        </td>
        <td width="100"  style=" color: #333; padding: 1.6px;" id="text"><?= $datos['correo']?></td>
        
        <td width="200" colspan="2" style=" color: #333; padding: 1.6px;" id="text"><?= $datos['DHogar']?></td>
    </tr>
</table><br><br>
<table style="border: 0px; border-collapse: collapse;">
    <tr>
        <td align="center" valign="middle" colspan="4" style="text-align: center; color: #333"><h4>DATOS DE INSCRIPCIÓN:</h4></td>
    </tr>
    <tr align="center">
        <td width="200" style="font-weight: bold; color: #333;">Grado</td>
        <td width="150" style="font-weight: bold; color: #333;">Sección</td>
        <td width="200" style="font-weight: bold; color: #333;">Aula</td>
        <td width="170" style="font-weight: bold; color: #333;">Periodo Escolar</td>
      
    </tr>
    <tr align="center">
        <td style="color: #333;" id="text"><?= $datos['grado']?></td>
        <td style="color: #333;" id="text"><?= $datos['nom_sec']?></td>
        <td style="color: #333;" id="text"><?= $datos['nom_aula']?></td>
        <td style="color: #333;" id="text"><?= $datos['titulo']?></td>
      
    </tr>
</table><br><br>
<table style=" border-collapse: collapse;">
    <tr>
        <td align="center" valign="middle" colspan="5" style="text-align: center; color: #333;"><h4>DATOS DEL REPRESENTANTE:</h4></td>
    </tr>
    <tr align="center">
        <td width="100" style="font-weight: bold; color: #333; padding: 1.6px;">Cédula de Identidad</td>
        <td width="100" style="font-weight: bold; color: #333; padding: 1.6px;">Nombres</td>
        <td width="100" style="font-weight: bold; color: #333; padding: 1.6px;">Apellidos</td>
        <td width="100" style="font-weight: bold; color: #333; padding: 1.6px;">Ocupación</td>
        <td width="200" style="font-weight: bold; color: #333; padding: 1.6px;">Dirección del trabajo</td>
    </tr>
    <tr align="center">
        <td width="100"  id="text"><?= $datos['id_familiar']?></td>
        <td width="100"  id="text"><?= $datos['nombre']?></td>
        <td width="100"  id="text"><?= $datos['apellido']?></td>
        <td width="100"  id="text"><?= $datos['ocupacion']?></td>
        <td width="200"  id="text"><?= $datos['Dtrabajo']?></td>
    </tr>
    <tr align="center">
        <td width="100" style="font-weight: bold; color: #333;">Teléfono de trabajo</td>
        <td width="100" style="font-weight: bold; color: #333;">Dirección del hogar</td>
        <td width="100" style="font-weight: bold; color: #333;">Teléfono del hogar</td>
        <td width="100" style="font-weight: bold; color: #333;">Parestesco</td>
        <td width="10" style="font-weight: bold; color: #333;">Nacionalidad</td>
    </tr>
    <tr align="center">
        <td width="100" id="text"><?= $datos['Tlftrabajo']?></td>
        <td width="100" id="text"><?= $datos['DHogar']?></td>
        <td width="100" id="text"><?= $datos['TlfHogar']?></td>
        <td width="200" id="text">
            <?php if ($datos['Parestesco'] == 1) {
                echo "Madre";
            }elseif($datos['Parestesco'] == 2){
                echo "Padre";
            }elseif ($datos['Parestesco'] == 3) {
                echo "Familiar a cargo";
            }
            ?>
        </td>
        <td width="100" style="" id="text">
            <?php if (strval($datos['nacionalidad']) == "V") {
                echo "Venezolano";
            }else{
                echo "Extranjero";
            }
            ?>            
        </td>
    </tr>
</table>
</body>
</html>