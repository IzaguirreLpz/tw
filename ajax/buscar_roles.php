<?php

session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(($_SESSION['id_usuario'])){
 $idUsuario = $_SESSION['id_usuario'];
    $rol = $_SESSION['id_rol'];

	$eliminar=getPer('per_eliminacion',$rol,'7');
	$actualizar=getPer('per_actualizacion',$rol,'7');

	
	
}else{
	header ("Location: index.php");
}


?>
<div class="table-responsive" id="tableListar_length">
    <table class="table table-striped b-t b-light" id="tableListar" style="margin: 10px 0 0 0;">
        <thead>
            <tr class="success">
                <th>Id Rol</th>
                <th>Rol Nombre</th>
                <th>Rol Descripcion</th>
                <th>Fecha Creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			 $sql = "SELECT * FROM bd_tw.roles;";
     
			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) 'numrows' FROM bd_tw.roles;");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
		            $idRol=$row['rol_id_rol'];
		            $rolNombre=$row['rol_nombre'];
    				$rolDescripcion=$row['rol_descripcion'];
    			    $fecha=$row['rol_fecha_creacion'];
                    $fecha= date('d/m/Y', strtotime($fecha));
          ?>
            <tr>

                <td><?php echo $idRol ?></td>
                <td><?php echo $rolNombre;?></td>
                <td><?php echo $rolDescripcion;?></td>
                <td><?php echo $fecha;?></td>
                <td>
                    <?php  if ($actualizar==1 || $idUsuario==1 ){?>
                    <a href="add_rol.php?us=<?php echo $idRol?> " class='btn btn-default' ui-toggle-class=""><i
                            class="fa fa-pencil text-success text-dark"></i></a>
                    <?php } ?>
                    <?php  if ($eliminar==1 || $idUsuario==1 ){?>
                    <a href="#" class='btn btn-default' title='Eliminar usuario' data-toggle="modal"
                        data-target="#myModal4" onclick='obtener_id("<?php echo $idRol;?>")'><i
                            class="glyphicon glyphicon-remove"></i></a>
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
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.es.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script src="js/global.js"></script>