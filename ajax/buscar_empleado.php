
<?php


session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}

$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$actualizar=getPer('per_actualizacion',$rol,'11');  
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
             <th>clave</th>
              <th>documento</th>
             <th>nombre </th>

              <th>sexo</th>             
              <th>unidad admin</th>
              <th>teléfono</th>

              <th>region</th>
              <th>status</th>
              <th>opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

  
			
			 $sql = "SELECt * from siec_empleados inner join siec_region on emp_id_region=re_id_region order by emp_id_empleado DESC ";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_empleados ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                            $id_emple= $row['emp_id_empleado'];
			               $clave=$row['emp_clave_empleado'];
                        $documento= $row['emp_documento'];
						$nombre=$row['emp_nombre'];
                        $nacimiento=$row['emp_fecha_nacimiento'];
                        $sexo=$row['emp_sexo'];
						$unidad=$row['emp_id_uniadmin'];
                        $telefono=$row['emp_telefono'];
            $direccion=$row['emp_direccion'];
            $region=$row['re_nombre'];
             $reid=$row['emp_id_region'];
			$estado_civil=$row['emp_estado_civil'];	        
			            
                // $nacimiento= date('d/m/Y', strtotime($nacimiento));
                $status=$row['emp_status_cla'];
            $tipo=$row['emp_tip_documento'];
            
            $telcasa=$row['emp_tel_casa'];
          ?>
   <input type="hidden" value="<?php echo $tipo;?>" id="tipo<?php echo $id_emple;?>">
             
              <tr>
   <td><?php echo $id_emple; ?></td>
            <td><?php echo $clave; ?></td>
                <td><?php echo $documento;?></td>
                <td><?php echo $nombre;?></td>
               
                  <td><?php echo $sexo;?></td>
                  <td><?php echo $unidad;?></td>
                  <td><?php echo $telefono;?></td>
     
                  <td><?php echo $region?></td>
           
                  
                     <?php
$pendiente="PERMANENTE";$label_class='label-info';
            $atendido="TEMPORAL";$label_class='label-warning';

switch ($status) {
    case 0:
                  ?> <td><span class="label label-default"><?php echo $pendiente; ?></span> </td> <?php
        break;
    case 1:
                  ?> <td> <span class="label label-info"><?php echo  $atendido; ?></span></td> <?php
        break;
        
        

}
?>
                  
                  
                  
                <td>
                    
    <?php
        if ($actualizar==1 || $idUsuario==1 ){?>
                                    
                    
                        <a href="#" class='btn btn-default' title='Editar cliente'  data-toggle="modal" data-target="#myModal2" onclick='obtener_datos("<?php echo $id_emple;?>","<?php echo $clave;?>", "<?php echo $status;?>", "<?php echo $documento;?>","<?php echo $nombre;?>","<?php echo $tipo;?>","<?php echo $telefono;?>","<?php echo $sexo;?>","<?php echo $nacimiento; ?>","<?php echo $estado_civil; ?>","<?php echo $unidad; ?>","<?php echo $direccion; ?>" ,"<?php echo $telcasa ?>" ,"<?php echo $reid ?>")' ><i class="glyphicon glyphicon-edit"></i></a>
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
     