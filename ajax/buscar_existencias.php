
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
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>ID</th>
             <th>Producto</th>
             <th>Cantidad</th>
              <th>Clinica</th>
       
              <th>Fecha Registro</th>
   
          </tr>
        </thead>
        <tbody>
          <?php
            
            			
			if ($rol !=1){
         $clinica_b="and encx_id_clinica =$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }
            
            
			 $sql = " SELECT * FROM siec_existencias_detalle, siec_encabezado_existencias, siec_inventario, siec_clinicas WHERE exi_id_inventario = inv_id_inventario AND encx_id_enca_exist = exi_id_enca_exist AND encx_id_clinica = cli_id_clinica  $clinica_b";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_existencias_detalle  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                        $id=$row['exi_id_exist_detalle'];
			           $nombre_producto=$row['inv_nombre_producto'];
                        $cantidad=$row['exi_cantidad'];
 
						$clinica=$row['cli_nombre'];                     
                        $procedencia=$row['encx_procedencia'];               
                        $fecha_registro= $row['encx_fecha_registro'];
            $fecha_registro=date('d/m/Y', strtotime($fecha_registro));
          ?>
   
             
              <tr>
              
            <td><?php echo $id; ?></td>
                <td><?php echo $nombre_producto;?></td>
                <td><?php echo $cantidad;?></td>
                              
                  <td><?php echo $clinica;?></td>
                    
                <td><?php echo $fecha_registro;?></td>
                 
               
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
     