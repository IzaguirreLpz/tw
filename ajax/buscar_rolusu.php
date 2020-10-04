
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';



?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
           
             
           
         
            
             <th>Usuario</th>
            <th> Nombre </th>
              <th> Rol</th>
            <th>Fecha</th>
              
              <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECT * from siec_roles_usuario inner JOIN siec_roles on rus_id_rol = rol_id_rol
inner join siec_usuarios on usu_id_usuario= rus_id_usuario";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_roles_usuario  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                           
						$usuario=$row['usu_username'];
						$nombre=$row['usu_nombre_com'];
                        
                                $fecha=$row['rus_fecha'];
                             $rol=$row['rol_nombre'];
				     
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
             
						
          ?>
   
             
              <tr>
              
            <td><?php echo $usuario; ?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $rol;?></td>
                    <td><?php echo $fecha;?></td>
           
              
              
                  
                <td>
                    
                
                   <a href="#" class='btn btn-danger' title='eliminar cliente'  data-toggle="modal" data-target="#myModal4" onclick='obtener_id("<?php echo $item;?>")' ><i class="glyphicon glyphicon-remove"></i></a>     
                    
                   
                    
                                    
                <!---<a href="#" class='btn btn-primary' title='Editar cliente'  data-toggle="modal" data-target="#myModal2" onclick='obtener_datos("<?php echo $id;?>" , "<?php echo $nom ?>", "<?php echo $apellido ?>", "<?php echo $cel ?>","<?php echo $tel ?>","<?php echo $correo ?>","<?php echo $direccion ?>","<?php echo $membresia ?>")' ><i class="glyphicon glyphicon-edit"></i></a> -->
                	
                  	
             
             <a href="consulta.php?user_id=<?php echo $id;?>" data-toggle="tooltip" title="buscar mascotas"  class='btn btn-warning'><span class="glyphicon glyphicon-list"></span></a>      	
            
						
               
               
             
               
               
                </td>
              </tr>
          <?php
            
           }
          }else{ 
          
          ?>
          <tr>
            <td colspan="4">No se encontraron resultados</td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
     
      </div>
      <script src="js1/jquery-1.11.1.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
	<script src="js1/bootstrap-datepicker.js"></script>
	<script src="js1/locales/bootstrap-datepicker.es.js"></script>
	<script src="js1/jquery.dataTables.min.js"></script>
    
        <script src="js1/dataTables.bootstrap.js"></script>

        <script src="js1/validator.js"></script>

    <script src="js1/global.js"></script>
     