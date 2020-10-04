
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
$rol = $_SESSION['id_rol'];
 $idUsuario = $_SESSION['id_usuario'];
$actualizar=getPer('per_actualizacion',$rol,'14');  
$eliminar=getPer('per_eliminacion',$rol,'14');
$clinica= $_SESSION['clinica'];

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
             <th>clave</th>
             <th>nombre </th>
            <th>Medico</th>
            <th>Estado Entrega</th>      
              <th>Fecha</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
					
			if ($rol !=1){
         $clinica_b="where inc_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }

  

			
			 $sql = "select re_id_receta , emp_nombre, emp_clave_empleado , re_status, emp_id_empleado , re_fecha, ate_id_usuario,(select usu_nombre_com from siec_usuarios where usu_id_usuario=ate_id_usuario)as doctor ,re_fecha from siec_empleados, siec_atenciones, siec_receta , siec_usuarios where emp_id_empleado = ate_id_empleado AND ate_id_atencion = re_id_atencion and ate_id_usuario= usu_id_usuario AND LEFT(re_fecha,10)=CURDATE() AND re_id_receta in (SELECT distinct ent_id_receta from siec_medicamentos_entregados) order by re_id_receta ASC";

			$query = mysqli_query($mysqli, $sql);
     
			$item=0;
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_medicamentos_entregados  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
            
            $item=$item+1;
			$emp=$row['emp_id_empleado'];
                        
                $id=$row['re_id_receta'];
            $clave=$row['emp_clave_empleado'];
            $nom_emp=$row['emp_nombre'];
            $user=$row['doctor'];
            $status=$row['re_status'];
          
			$fecha_entrega=$row['re_fecha'];
		   $fecha_entrega=date('d/m/Y', strtotime($fecha_entrega));	   
            
            
            
             $pendiente="PENDIENTE";$label_class='label-warning';
            $atendido="ENTREGADO";$label_class='label-success';
     
          ?>
   
             
              <tr>
              
            <td><?php echo $item; ?></td>
                  <td><?php echo $clave; ?></td>
                <td><?php echo $nom_emp;?></td>
                  <td><?php echo $user;?></td>
                 <?php


switch ($status) {
    case 1:
                  ?> <td><span class="label label-warning"><?php echo $pendiente; ?></span> </td> <?php
        break;
    case 2:
                  ?> <td> <span class="label label-success"><?php echo  $atendido; ?></span></td> <?php
        break;
        
        
       
}
?>
                  <td><?php echo $fecha_entrega;?></td>
                
                <td>
                    
                
                   
                    
                                    
  	<?php if ($status !=2 and $status !=""){ 
    if ($actualizar==1 || $idUsuario==1 ){
                    ?>
                    
                    
                    
                    
                    
            <a href="medicamentos_personal.php?id_rece=<?php echo $id;?>&emp=<?php echo $emp; ?>" class='btn btn-default' title='Editar producto'    ><i class="glyphicon glyphicon-edit"></i></a> 
             
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
     