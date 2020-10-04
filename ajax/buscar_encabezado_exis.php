
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';
session_start();
$clinica= $_SESSION['clinica'];
$user_id = $_SESSION['id_usuario'];
	$rol=$_SESSION['id_rol'];

?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>id</th>
             <th>Recibido</th>
             <th>clinica </th>
            <th>procedencia</th>
             <th>fecha recibido</th>
            <th>Registrado por</th>
              <th>Fecha registro</th>
              <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            
            
             if ($rol !=1){
         $clinica_b="where encx_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }
            
            
            
            
            
            
            
			 $sql = "SELECT * FROM siec_encabezado_existencias INNER JOIN siec_clinicas on siec_encabezado_existencias.encx_id_clinica = siec_clinicas.cli_id_clinica INNER join siec_usuarios on siec_encabezado_existencias.encx_id_usuario= siec_usuarios.usu_id_usuario $clinica_b order  by encx_id_enca_exist ASC";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_encabezado_existencias  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                        $id=$row['encx_id_enca_exist'];
			           $nombre_recibio=$row['usu_nombre_com'];
						$clinica=$row['cli_nombre'];
                        $procedencia=$row['encx_procedencia'];
                        $fecha_recibio=$row['encx_fecha_recibido'];
                        $usuario=$row['usu_nombre_com'];
                        $fecha_registro= $row['encx_fecha_registro'];
            $fecha_registro=date('d/m/Y', strtotime($fecha_registro));
          ?>
   
             
              <tr>
              
            <td><?php echo $id; ?></td>
                <td><?php echo $nombre_recibio;?></td>
                <td><?php echo $clinica;?></td>
                 <td><?php echo $procedencia;?></td>
                  
                  <td><?php echo $fecha_recibio;?></td>
                    <td><?php echo $usuario;?></td>
                <td><?php echo $fecha_registro;?></td>
                 
                <td>
                    
                
                      
                    <a href="reporte/reporte_entradas.php?id=<?php echo $id;?>"   data-toggle="tooltip" class='btn btn-danger' title='imprimir' ><i class="fa fa-print"></i></a> 

                   
                    
               	
            
						
               
               
             
               
               
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
     