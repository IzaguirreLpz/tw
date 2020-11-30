
<?php

session_start();
require '../funcs/conexion.php';
require '../funcs/funcs.php';

if(($_SESSION['id_usuario'])){
  $idUsuario = $_SESSION['id_usuario'];
  $rol = $_SESSION['id_rol'];
//$eliminar=getPer('per_eliminacion',$rol,'3');
//$actualizar=getPer('per_actualizacion',$rol,'3');
 $idUsuario = $_SESSION['id_usuario'];
    $rol = $_SESSION['id_rol'];
  
$eliminar=getPer('per_eliminacion',$rol,'12');
$actualizar=getPer('per_actualizacion',$rol,'12');

}else{
	header ("Location: index.php");
}


?>
  <div class="table-responsive" id="tableListar_length">
  <table class="table table-striped b-t b-light" id="tableListar" style="margin: 10px 0 0 0;">
    <thead>
      <tr class="success">
            <th>Marca</th>
            <th>Modelo</th>
            <th>Cliente</th>
            <th>Color</th>
            <th>Placa</th>
            <th>Fecha Ingreso</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php

			 $sql = "SELECT v.id_vehiculo,v.marca,v.modelo,c.nom_cliente, c.ape_cliente , v.color, v.placa, v.fecha_registro
                FROM bd_tw.tbl_vehiculos v, tbl_clientes c where v.cliente_id=c.id_cliente and v.fecha_registro
                order by id_vehiculo ASC";

			$query = mysqli_query($mysqli, $sql);

			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM tbl_vehiculos");
		  $row1= mysqli_fetch_array($count_query);

			$numrows = $row1['numrows'];
        if ($numrows>0){
        while ($row=mysqli_fetch_array($query)){
            $item=$row['id_vehiculo'];
            $marca=$row['marca'];
            $modelo=$row['modelo'];
            $clienteNom=$row['nom_cliente'];
            $clienteApe=$row['ape_cliente'];
            $color=$row['color'];
            $placa=$row['placa'];
            $fecha=$row['fecha_registro'];
            $fecha= date('d/m/Y', strtotime($fecha));
          ?>
              <tr>
                <td><?php echo $marca ?></td>
                <td><?php echo $modelo;?></td>
                <td><?php echo $clienteNom." ".$clienteApe;?></td>
                <td><?php echo $color;?></td>
                <td><?php echo $placa;?></td>
                <td><?php echo $fecha;?></td>
              
               
               <td>  
               <?php  if ($actualizar==1 || $idUsuario==1 ){?>
              <a href="add_vehiculo.php?id=<?php echo $item?> " class='btn btn-default' ui-toggle-class=""><i class="fa fa-pencil text-success text-dark"></i></a>
              <?php } ?>
                    <?php  if ($eliminar==1 || $idUsuario==1 ){?>
              <a href="#" class='btn btn-default' title='Eliminar usuario'  data-toggle="modal" data-target="#myModal4" onclick='obtener_id("<?php echo $item;?>")' ><i class="glyphicon glyphicon-remove"></i></a>
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
     <script>
     </script>
      </div>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/locales/bootstrap-datepicker.es.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap.js"></script>
      <script src="js/global.js"></script>