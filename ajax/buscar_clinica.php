
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
  
             <th>Id</th>
             <th>Clinica</th>
             
             
              <th>Direccion</th>
               <th>Teléfono</th>
                <th>Region</th>
              <th>Fecha</th>
               
            <th>Opciones </th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECT re_id_region ,re_nombre ,cli_id_clinica, cli_nombre, cli_telefono, cli_fecha_registro, cli_direccion, cli_region
from siec_clinicas, siec_region
WHERE cli_region= re_id_region;";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_clinicas  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
$id_clinica=$row['cli_id_clinica'];
			            $nombre=$row['cli_nombre'];
						$lug=$row['cli_direccion'];
						$telefono=$row['cli_telefono'];
                        $region=$row['re_nombre'];
                        $fecha=$row['cli_fecha_registro'];
				        
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
            
            
            
   $id_region=$row['re_id_region'];
          ?>
             
              <tr>
              
            <td><?php echo $id_clinica; ?></td>
               
                <td><?php echo $nombre;?></td>
                 <td><?php echo $lug;?></td>
                  <td><?php echo $telefono;?></td>
                  <td><?php echo $region; ?></td>
                  <td><?php echo $fecha;?></td>
              
                    
              <td>
                   
                    
                                    
                  <a href="#" class='btn btn-primary' title='Editar cliente'  data-toggle="modal" data-target="#myModal2" onclick='add_datos("<?php echo $id_clinica;?>" , "<?php echo $nombre; ?>", "<?php echo $lug; ?>","<?php echo $telefono; ?>","<?php echo $id_region ?>")' ><i class="glyphicon glyphicon-edit"></i></a> 
                	
                  	
             
						
               
               
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
     