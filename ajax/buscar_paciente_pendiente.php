
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$clinica= $_SESSION['clinica'];
//                                                                                                                                                                                                                                                                           echo $clinica;
$actualizar=getPer('per_actualizacion',$rol,'20');  
$eliminar=getPer('per_eliminacion',$rol,'20');



?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>N°</th>
             <th>Clave</th>
             <th>Nombre </th>
           
         
              <th>Estado</th>
             <th>Fecha Atencion</th>
            <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			 if ($rol !=1){
         $clinica_b="and ate_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }

  
			
			 $sql = "SELECT * FROM siec_atenciones inner join siec_empleados on siec_atenciones.ate_id_empleado= siec_empleados.emp_id_empleado inner join siec_usuarios on siec_atenciones.ate_id_usuario= siec_usuarios.usu_id_usuario WHERE LEFT(ate_fecha_visita,10)=CURDATE() $clinica_b order by ate_id_atencion ASC";

			$query = mysqli_query($mysqli, $sql);
     $item=0;
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_atenciones");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			$item = $item+1;	
$id=$row['ate_id_atencion'];
			               $clave=$row['emp_clave_empleado'];
						$nombre=$row['emp_nombre'];
						

				        $fecha=$row['ate_fecha_visita'];
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
$status=$row['status'];
            $clinica = $row['ate_id_clinica'];
			            
			
               $pendiente="PENDIENTE";$label_class='label-warning';
            $atendido="ATENDIDO";$label_class='label-success';
      $ausente="AUSENTE";$label_class='label-danger';
            
            

            ?>

              <tr>
  <td><?php echo $item; ?></td>
                <td><?php echo $clave;?></td>
                <td><?php echo $nombre;?></td>
 
                  	
                  
                  <?php 
                     
            switch ($status) {
    case 1:
                  ?> <td><span class="label label-warning"><?php echo $pendiente; ?></span> </td> <?php
        break;
    case 2:
                  ?> <td> <span class="label label-success"><?php echo  $atendido; ?></span></td> <?php
        break;
    case 3:
                  ?> <td> <span class="label label-danger"><?php echo  $ausente; ?></span></td> <?php
        break;
}
          ?>
                  
                  
                  
                  
                  <td><?php echo $fecha;?></td>
                  
                  
                <td>
                    
                
                  
                    
                   
                    
                                    
               
                    
                	
                  	<?php if ($status !=2){
                    
                     if ($eliminar==1 || $idUsuario==1){
                    
                    ?>
            <a href="#" class='btn btn-default' title='Editar producto' onclick="obtener_datos('<?php echo $id;?>','<?php echo $status; ?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
             
               <?php } }?>
               
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
     