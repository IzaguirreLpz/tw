
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
 
$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$clinica= $_SESSION['clinica'];
	

?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
            
            <!----- Botones fecha -------->
            <div style="display:none">
            <form>
				<center>
			
				  <input type="date" id="bd-desde"  />
                    <input type="date" id="bd-hasta"  /><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Generar Reporte</a>
				</center>
			</form>
            
            </div>
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>Cod</th>
             <th>Producto</th>
             <th>Cantidad</th>
              <th>Vence</th>
             <th>Empleado</th>
              <th>Operacion</th>
              <th>Clinica</th>
             <th>Justificacion</th>
              <th>Fecha Registro </th>
             
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

			 if ($rol !=1 and $idUsuario!=1){
         $clinica_b="and pro_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
          
                 
     }

  
			
			 $sql = "SELECT inv_codigo, inv_nombre_producto,pro_justificacion, pro_cantidad,pro_vence, 	pro_id_clinica,emp_nombre,operacion,fecha_reg from siec_inventario , siec_pro_operaciones,siec_empleados where pro_id_inventario = inv_id_inventario AND id_empleado = emp_id_empleado $clinica_b ";
            //echo $sql;
			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_incapacidades  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                $id=$row['inv_codigo'];
			    $producto=$row['inv_nombre_producto'];
                 $cantidad=$row['pro_cantidad'];
               $vence=$row['pro_vence'];
						$empleado=$row['emp_nombre'];
         $justificacion=$row['pro_justificacion'];
              $operacion=$row['operacion'];
				    
            $fecha_inicio=$row['fecha_reg'];
			         
                 $fecha_inicio= date('d/m/Y', strtotime($fecha_inicio));
          
         //   $hoy=date("d/m/Y");
            
           
            
           // $id_vence =$row['inc_id_usuario'];
            //$user_id = $_SESSION['user_session'];
            $nom_clinica = getCualquiera('cli_nombre','siec_clinicas','cli_id_clinica',$clinica);
            
          ?>
   
             
              <tr>
              
            <td><?php echo $id ?></td>
                <td><?php echo $producto;?></td>
                <td><?php echo $cantidad;?></td>
               
                  <td><?php echo $vence;?></td>
                    <td><?php echo $empleado;?></td>
                    <td><?php echo $operacion;?></td>
                  <td> <?php echo $nom_clinica; ?></td>
                    <td><?php echo $justificacion; ?></td>
                  <td><?php echo $fecha_inicio;?></td>
      
           
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
     









