
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
  
       
             <th>clave</th>
             <th>nombre </th>
            <th>Medico</th>
              <th>Nombre Medicamento</th>
             <th>Cantidad Entregada</th>              
              <th>Fecha Entregado</th>
            <th> gestionarAcciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "select siec_empleados.emp_clave_empleado,emp_nombre , usu_nombre_com ,inv_nombre_producto ,ent_cantidad ,ent_fecha_entrega 
from siec_empleados,siec_usuarios,siec_inventario,siec_medicamentos_entregados,siec_atenciones where inv_id_inventario=ent_id_inventario and ent_id_atencion=ate_id_atencion AND ate_id_empleado= siec_empleados.emp_id_empleado AND ate_id_usuario= usu_id_usuario";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_medicamentos_entregados  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                        
        
            $clave=$row['emp_clave_empleado'];
            $nom_emp=$row['emp_nombre'];
            $user=$row['usu_nombre_com'];
            $produ=$row['inv_nombre_producto'];
            $canti=$row['ent_cantidad'];       
			$fecha_entrega=$row['ent_fecha_entrega'];
		   $fecha_entrega=date('d/m/Y', strtotime($fecha_entrega));	   
     
          ?>
   
             
              <tr>
              
            
                  <td><?php echo $clave; ?></td>
                <td><?php echo $nom_emp;?></td>
                  <td><?php echo $user;?></td>
                  <td><?php echo $produ;?></td>
                <td><?php echo $canti;?></td>
                  <td><?php echo $fecha_entrega;?></td>
                
                <td>
                    
                
                   <a href="#" class='btn btn-danger' title='eliminar cliente'  data-toggle="modal" data-target="#myModal4" onclick='obtener_id("<?php echo $item;?>")' ><i class="glyphicon glyphicon-remove"></i></a>     
                    
                   
                    
                                    
                  <a href="#" class='btn btn-primary' title='Editar cliente'  data-toggle="modal" data-target="#myModal2" onclick='obtener_datos("<?php echo $id;?>" , "<?php echo $nom ?>", "<?php echo $apellido ?>", "<?php echo $cel ?>","<?php echo $tel ?>","<?php echo $correo ?>","<?php echo $direccion ?>","<?php echo $membresia ?>")' ><i class="glyphicon glyphicon-edit"></i></a> 
                	
                  	
             
             <a href="lista_mas.php?user_id=<?php echo $item;?>" data-toggle="tooltip" title="buscar mascotas"  class='btn btn-warning'><span class="glyphicon glyphicon-list"></span></a>      	
            
						
               
               
             
               
               
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
     