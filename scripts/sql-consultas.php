  <?php
    
    include 'open_conection.php';
    
	 $sql_consul = "select * from $table_usuarios";
                    //echo $sql_consul; traza de consulta
	$registros = mysqli_query($conexion, $sql_consul);


while($reg=mysqli_fetch_array($registros)){
	
	?>
                   
<tr class="black-text  ">
		<td><?php echo $reg['cedula']; ?></td>
		<td><?php echo $reg['primer_apellido']; ?></td>
		<td><?php echo $reg['segundo_apellido']; ?></td>
		<td><?php echo $reg['primer_nombre']; ?></td>
		<td><?php echo $reg['segundo_nombre']; ?></td>
		<td><?php echo $reg['sexo']; ?></td>
		<td><?php echo $reg['fecha_de_nacimiento']; ?></td>
		<td><?php echo $reg['lugar_de_nacimiento']; ?></td>
		<td><?php echo $reg['email']; ?></td>
		
</tr>     

 
  <?php 
	}

    ?>            