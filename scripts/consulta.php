<?php 
	include 'raiz.php';

    ?>  
     <!-------------- Areá de Notificaciones panel superior --------------------->
    
     <div class="container">
     <div class="row">
     
    <!--------------------------- Consulta sql --------------------------------->   
        <h2 class="center-align">Listado </h2>
           
     </div>
     </div>  
           
           <div class="row">
               <div class="col m12">
                 <table id="datatable" class="highlight ">
                      <tr>
        <th class="black-text center-align blue lighten-3 ">Cedula</th>
		<th class="black-text center-align blue lighten-3">Primer Apellido</th>
		<th class="black-text center-align blue lighten-3">Segundo Apellido</th>
		<th class="black-text center-align blue lighten-3">Primer Nombre</th>
		<th class="black-text center-align blue lighten-3">Segundo Nombre</th>
		<th class="black-text center-align blue lighten-3">Sexo</th>
		<th class="black-text center-align blue lighten-3">Fecha de Nacimiento</th>
		<th class="black-text center-align blue lighten-3">Lugar de Nacimiento</th>
        <th class="black-text center-align blue lighten-3">Correo Electronico</th>
                          
                      </tr>
                      
                   <?php 
	include 'sql-consultas.php';

    ?>  
                  </table>
               </div>
           </div>
           
           
                   <?php 
	include 'pie.php';

    ?> 
    
   

       
 