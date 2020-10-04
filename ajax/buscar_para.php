
<?php

session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}

$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$actualizar=getPer('per_actualizacion',$rol,'10');  
//$eliminar=getPer('per_eliminacion',$rol,'10');



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
             <th>Nombre </th>
             <th>Valor</th>
         
              <th>Observacion</th>
              
             <th>Fecha atencion</th>
              
            <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECT * FROM siec_parametros";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_parametros");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
                $id_para=$row['par_id_parametros'];			               
						$nombre_para=$row['par_nombre'];
						$numero_para=$row['par_numero'];
                        $obser_para=$row['par_observacion'];
                        $text_para=$row['par_texto'];
				        $fecha_para=$row['par_fecha_creacion'];		            
                 $fecha_para= date('d/m/Y', strtotime($fecha_para));
			           
          ?>
   
             
              <tr>
                 <td><?php echo $id_para ?></td>            
                <td><?php echo $nombre_para;?></td>
                 <td><?php echo $numero_para;?></td>
                 
                  <td><?php echo $obser_para;?></td>
                 
                  <td><?php echo $fecha_para;?></td>
        
                <td>
                    
                
                 <?php
        if ($actualizar==1 || $idUsuario==1 ){?>
                                    
                 <a href="#" class='btn btn-default' title='Editar parametro'  data-toggle="modal" data-target="#myModal2" onclick="obtener_datos('<?php echo $row['par_id_parametros']?>','<?php echo $row['par_nombre']?>','<?php echo $row['par_numero']?>','<?php echo $row['par_texto']?>','<?php echo $row['par_observacion']?>');" ><i class="glyphicon glyphicon-edit"></i></a> 
                	
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
     
      </div>
      <script src="js1/jquery-1.11.1.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
	<script src="js1/bootstrap-datepicker.js"></script>
	<script src="js1/locales/bootstrap-datepicker.es.js"></script>
	<script src="js1/jquery.dataTables.min.js"></script>
    
        <script src="js1/dataTables.bootstrap.js"></script>

        <script src="js1/validator.js"></script>

    <script src="js1/global.js"></script>
     