
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
$rol = $_SESSION['id_rol'];
$actualizar=getPer('per_actualizacion',$rol,'18');  
$eliminar=getPer('per_eliminacion',$rol,'18');
 $idUsuario = $_SESSION['id_usuario'];

?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="infop">
  
             <th>Codigo</th>
             <th>Nombre</th>
             <th>Clasificacion </th>
            
              <th>Unidad</th>
             <th>Presentacion</th>
            <th> Opciones </th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = " 
 SELECT inv_id_inventario ,inv_codigo,inv_nombre_producto,(SELECT cinv_nombre_clasificacion FROM siec_clasificacion_inventario WHERE cinv_id_clasificacion=inv_id_clasificacion) as nombre_cla,inv_id_um, inv_presentacion,cinv_id_clasificacion,um_nombre,um_id_um from siec_inventario 
inner join siec_uni_medida on siec_inventario.inv_id_um= siec_uni_medida.um_id_um 
inner join siec_clasificacion_inventario on siec_inventario.inv_id_clasificacion= siec_clasificacion_inventario.cinv_id_clasificacion order by inv_id_inventario ASC ";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_inventario  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			             $id=$row['inv_id_inventario'];
                        $cod=$row['inv_codigo'];
			           $nombre=$row['inv_nombre_producto'];
						$clasificacion=$row['nombre_cla'];
            
						$uni_nombre=$row['um_nombre'];
                        $presentacion=$row['inv_presentacion'];
            $id_uni=$row['um_id_um'];
            
            $cla_id=$row['cinv_id_clasificacion'];
          ?>
   
             
              <tr>
              
            <td><?php echo $cod; ?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $clasificacion;?></td>
                 <td><?php echo $uni_nombre;?></td>
                  
                  <td><?php echo $presentacion;?></td>
                <td>
                    
                
                    <?php  if ($actualizar==1 || $idUsuario==1 ){ ?>
                     <a href="#" class='btn btn-primary' title='Editar'  data-toggle="modal" data-target="#myModal2" onclick='obtener_datos("<?php echo $id;?>", "<?php echo $cod; ?>", "<?php echo $nombre; ?>","<?php echo $cla_id; ?>","<?php echo $id_uni; ?>","<?php echo $presentacion ?>")' ><i class="fa fa-pencil"></i></a> 
                    
                    
                     
                    
                   
                    <?php }
                    
                    /* , "<?php echo $cod ?>", "<?php echo $nombre ?>", "<?php echo $nombre_cla ?>","<?php echo $uni_nombre ?>","<?php echo $presentacion ?>"*/
                    ?>
       
             
               
               
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
     