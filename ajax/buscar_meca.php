
<?php

	$paciente="";
require '../funcs/conexion.php';
require '../funcs/funcs.php';
session_start();
$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];

//$clinica= $_SESSION['clinica'];


?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
   
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">


        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>N°</th>
             <th>Id</th>
             <th>Nombre </th>
              <th>Estado</th>
             <th>Fecha atencion</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
		
			 $sql = "SELECT a.status,a.id_atencion,c.identidad ,a.fecha_visita ,c.id_cliente,c.nom_cliente, c.ape_cliente from tbl_clientes c , tbl_atenciones a where a.id_cliente= c.id_cliente AND LEFT(a.fecha_visita,10)=CURDATE() ORDER BY a.id_atencion ASC";

			$query = mysqli_query($mysqli, $sql);
     $item=0;
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM tbl_atenciones  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			$item = $item+1;
            
$id=$row['id_atencion'];
			               $clave=$row['identidad'];
						$nombre=$row['nom_cliente'];
						$id_emp=$row['ape_cliente'];

				        $fecha=$row['fecha_visita'];
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
             $pendiente="PENDIENTE";$label_class='label-warning';
            $atendido="ATENDIDO";$label_class='label-success';
                  $ausente="AUSENTE";$label_class='label-danger';
                $status=$row['status'];
			    $emple=['id_cliente'];      
           
         
         
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
                    
                    
   <?php 
            
            
           //   $historial=TieneHistorial($id_emp);  
           $historial=1;
            if ($historial!=1) {     ?>
                    
                
                    <a href="histo_con.php?id=<?php echo $id_emp;?>"   data-toggle="tooltip" class='btn btn-danger' title='AGREGAR HISTORIAL' ><i class="fa fa-stethoscope"></i></a> 

                     <?php
}
?>
     
                    
                   
                    
               
           
             
             <a href="consulta.php?user_id=<?php echo $id;?>" data-toggle="tooltip" title="ATENDER CONSULTA"  class='btn btn-default'><span class="fa fa-user-md"></span></a>  
                    
  
            
			
                    
                    
                    
                    
                    
                    
                 
  
          

                    <a href="editar_factura.php?id_factura=<?php echo $id;?>"   data-toggle="tooltip" class='btn btn-default' title='EDITAR RECETA' ><i class="fa fa-cart-plus"></i></a> 

 
                
                     <a href="editar_consulta.php?user_id=<?php echo $id;?>" data-toggle="tooltip" title="EDITAR  CONSULTA"  class='btn btn-default'><span class="fa fa-list-alt"></span></a>
          


            
               
               
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
     