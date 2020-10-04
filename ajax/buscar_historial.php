
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
 

	$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];


?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="table-responsive" id="tableListar_length">
      <table class="table table-striped b-t b-light" id="tableListar">
      <thead>
          <tr class="success">
            
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Correo</th>
            <th>Fecha Creacion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

		
  
			
			 
      $sql = "SELECT * FROM tbl_usuario inner join tbl_roles on tbl_usuario.id_rol = tbl_roles.id_rol order by id_usuario ASC";
			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM tbl_usuario");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
           $id_usuario=$row['id_usuario'];
			               $nombre=$row['nombre_usuario'];
						$usuario=$row['usuario'];
			            $id_rol=$row['id_rol'];
						$rol=$row['rol'];
				        $correo=$row['correo_electronico'];
			            $estado=$row['estado_usuario'];
			            $correo=$row['correo_electronico'];
                        $fecha=$row['fecha_creacion'];
                        $fecha= date('d/m/Y', strtotime($fecha));
          ?>
   
             
              <tr>
              
           
              <td><?php echo $nombre ?></td>
                <td><?php echo $usuario;?></td>
                <td><?php echo $rol;?></td>
                 <td><?php echo $estado;?></td>
                  <td><?php echo $correo;?></td>
                  <td><?php echo $fecha;?></td>
                <td>
              
               
                      <a href="reporte/re_prueba.php?id=<?php echo $id;?>"   data-toggle="tooltip" class='btn btn-danger' title='imprimir' ><i class="fa fa-print"></i></a> 
                    
                                    

            
			
                <script>
                    function reportePDF2(){
	var desde = $id;
	let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
width=0,height=0,left=-1000,top=-1000`;
	open('reporte/re_prueba.php?id='+id,'test', params);
}</script>
               
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
     