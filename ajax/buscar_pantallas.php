
<?php

session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}

$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$actualizar=getPer('per_actualizacion',$rol,'9');  
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
  
             <th>Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            
             <th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
             
             <th>Descripcion Pantalla&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECT * FROM menu";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_pantallas");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
              
              
        while ($row=mysqli_fetch_array($query)){
            
            
            
            
            
            
            
            
            
            
       
            
			
$id=$row['menu_id'];
			              
						$nombre=$row['pant_nombre'];
						$tipo=$row['pant_descripcion'];
           
          ?>
   
             
              <tr>
              
            <td><?php echo $id ?></td>
                
                <td><?php echo $nombre;?></td>
                  <td><?php echo $tipo;?></td>
                <td>
                    
                         <?php
        if ($actualizar==1 || $idUsuario==1 ){?>
       
                                    
                  <a href="#" class='btn btn-primary' title='Editar cliente'  data-toggle="modal" data-target="#myModal2" onclick='obtener_datos("<?php echo $id;?>" , "<?php echo $nombre ?>", "<?php echo $tipo ?>")' ><i class="glyphicon glyphicon-edit"></i></a> 
                	
                  	
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
     