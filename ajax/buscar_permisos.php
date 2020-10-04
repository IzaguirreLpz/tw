
<?php
session_start();

require '../funcs/conexion.php';
require '../funcs/funcs.php';
$rol = $_SESSION['id_rol'];
 $idUsuario = $_SESSION['id_usuario'];
$eliminar=getPer('per_eliminacion',$rol,'7');
$actualizar=getPer('per_actualizacion',$rol,'7'); 

?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
           
             
           
         
              <th>ID</th>
              <th>Rol</th>
             <th>Pantalla</th>
           
              <th> Insertar</th>
            <th>Actualizar</th>
              <th>  Eliminar</th>
              <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECT * FROM siec_permisos 
inner join menu on menu_id= per_id_pantalla
inner join siec_roles on rol_id_rol= per_id_rol";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_permisos  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                           $id=$row['per_id_permiso'];
			               $id_pantalla=$row['pant_nombre'];
             $rol=$row['rol_nombre'];
						$consulta=$row['per_consulta'];
						$insercion=$row['per_insercion'];
                        $actualizacion= $row['per_actualizacion'];
                            $eliminacion=$row['per_eliminacion'];
                                $fecha=$row['per_fecha_creacion'];
                                $fecha_modifi=$row['per_fecha_modificacion'];
                                 $mod_usuario=$row['per_usu_modi'];                      
				     
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
             $text_estado="Pendiente";$label_class='label-warning';
            
						
          ?>
   
             
              <tr>
              
            <td><?php echo $id; ?></td>
                  <td><?php echo $rol; ?></td>
                    <td><?php echo $id_pantalla;?></td>
              <td> <?php
                  switch($insercion){
                        
                        case 0:
                        ?>
                        
                        <span class="fa fa-times"></span>
                        
                        <?php
                           break;
                      case 1:
                          ?>
                        <span class="fa fa-check"></span>
                        
                        <?php
                           break;
                        }      
                        
                        
                        ?>
                        </td>
                    <td>
                        <?php
                  switch($actualizacion){
                        
                        case 0:
                        ?>
                        
                        <span class="fa fa-times"></span>
                        
                        <?php
                           break;
                      case 1:
                          ?>
                        <span class="fa fa-check"></span>
                        
                        <?php
                           break;
                        }      
                        
                        
                        ?>
                        
                       
                  
                  </td>
                
                   <td>
                   <?php
                  switch($eliminacion){
                        
                        case 0:
                        ?>
                        
                        <span class="fa fa-times"></span>
                        
                        <?php
                           break;
                      case 1:
                          ?>
                        <span class="fa fa-check"></span>
                        
                        <?php
                           break;
                        }      
                        
                        
                        ?>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  </td>
              
              
                  
                <td>
                    
        
                  <!-- <a href="#" class='btn btn-danger' title='eliminar cliente'  data-toggle="modal" data-target="#myModal4" onclick='obtener_id("<?php echo $item;?>")' ><i class="glyphicon glyphicon-remove"></i></a>     -->
                    
                                      
                   
     <?php 
    if ($idUsuario==1 || $actualizar==1){
                    ?>   
                    
              <a href="#" class='btn btn-default' title='Editar Permiso'  data-toggle="modal" data-target="#myModal2" onclick='capturar("<?php echo $row['per_id_permiso'];?>","<?php echo $row['per_consulta'];?>","<?php echo $row['per_insercion'];?>","<?php echo $row['per_actualizacion'];?>","<?php echo $row['per_eliminacion'];?>","<?php echo $rol; $id_pantalla; ?>" )' ><i class="fa fa-pencil"></i></a>
                                 <?php }?> 	
                  
                    
                  <?php 
    if ($idUsuario==1 || $eliminar==1){
                    ?>   
              
              <a href="#" class='btn btn-danger' title='Editar producto' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target="#myModal3"><i class="fa fa-times"></i></a> 
    
						
               
                <?php }?>
             
               
               
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
     