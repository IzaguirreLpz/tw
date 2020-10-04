<?php
session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}

$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$actualizar=getPer('per_actualizacion',$rol,'6');  
$eliminar=getPer('per_eliminacion',$rol,'6');
    

?>
     <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css1/dataTables.bootstrap.css" rel="stylesheet">

  
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
            <th>Id</th>
              <th>Clave</th>
            
            <th>Usuario</th>
            <th>Rol</th>
              <th>Estado</th>
             <th>Fecha Creacion</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			 $sql = "SELECT * FROM siec_usuarios, siec_roles  where usu_id_rol = rol_id_rol order by usu_id_usuario ASC";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_usuarios  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
			               $id_usuario=$row['usu_id_usuario'];
			               $clave=$row['usu_clave_empleado'];
						$usuario=$row['usu_username'];
			            $nombre_com=$row['usu_nombre_com'];
			$estado=$row['estado_usuario'];
            $rol=$row['rol_nombre'];
            $id_rol=$row['rol_id_rol'];
                        $fecha=$row['user_fecha_creacion'];
                        $fecha= date('d/m/Y', strtotime($fecha));
          ?>
              <tr>
                 <td><?php echo $id_usuario;?></td>
                <td><?php echo $clave; ?></td>
                    <td><?php echo $usuario;?></td>
       
                <td><?php echo $rol; ?></td>
            
                
       
                  
                  
        
                     <?php
$pendiente="ACTIVO";$label_class='label-info';
            $atendido="INACTIVO";$label_class='label-warning';
            $nuevo="NUEVO";$label_class='label-warning';
            
               $superuser="SUPERUSER";$label_class='label-warning';
         
            
            
switch ($estado) {
    case "ACTIVO":
                  ?> <td><span class="label label-info"><?php echo $pendiente; ?></span> </td> <?php
        break;
    case "INACTIVO":
                  ?> <td> <span class="label label-default"><?php echo  $atendido; ?></span></td> <?php
        break;
        
         case "NUEVO":
                  ?> <td> <span class="label label-success"><?php echo  $nuevo; ?></span></td> <?php
        break;
         case "SUPERUSER":
                  ?> <td> <span class="label label-danger"><?php echo  $superuser; ?></span></td> <?php
        break;


}
?>             
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <td><?php echo $fecha;?></td>
                <td>
              
                 <?php
        if ($actualizar==1 || $idUsuario==1 ){?>
                  
                  	<a href="#" class='btn btn-default' title='Editar usuario'  data-toggle="modal" data-target="#myModal2" onclick='datos("<?php echo $id_usuario;?>","<?php echo $clave;?>","<?php echo $nombre_com;?>","<?php echo $usuario ?>","<?php echo $estado;?>","<?php echo $id_rol;?>")'  ><i class="glyphicon glyphicon-edit"></i></a> 
                  
         
               <?php } ?>
                    
                    
                        <?php
        if ($actualizar==1 || $idUsuario==1 ){?>
                  
             <a href="#" class='btn btn-warning' title='Editar producto' onclick="obtener_datos('<?php echo $id_usuario;?>');" data-toggle="modal" data-target="#myModal3"><i class="fa fa-key"></i></a> 
         
               <?php } ?>
                    
                    
                    
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
    

    <script src="js1/jquery-1.11.1.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
	<script src="js1/bootstrap-datepicker.js"></script>
	<script src="js1/locales/bootstrap-datepicker.es.js"></script>
	<script src="js1/jquery.dataTables.min.js"></script>
    <script src="js1/dataTables.bootstrap.js"></script>
    <script src="js1/validator.js"></script>
    <script src="js1/global.js"></script>