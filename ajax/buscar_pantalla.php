<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();


$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];


?>





<div class="table-responsive" id="tableListar_length">
  <table class="table table-striped b-t b-light" id="tableListar" style="margin: 10px 0 0 0;">
    <thead>
      <tr class="success">

        <th>Id</th>
        <th>Nombre</th>
        <th>Funcion</th>
        <th>Descripcion</th>
        
       
      </tr>
    </thead>
    <tbody>
      <?php








      $sql = "SELECT  * FROM menu ";
     
      $query = mysqli_query($mysqli, $sql);


      $count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM menu");
      $row1 = mysqli_fetch_array($count_query);

      $numrows = $row1['numrows'];


      if ($numrows > 0) {

        while ($row = mysqli_fetch_array($query)) {

          $id=$row['menu_id'];
          $usuario = strtoupper($row['pant_nombre']);
          $objeto = strtoupper($row['link']);
  
          $descrip = $row['descripcion'];
       
         // $fecha = $row['fecha'];
         // $fecha = date('d/m/Y', strtotime($fecha));
      ?>


          <tr>


          <td><?php echo $id; ?></td>
            <td><?php echo $usuario; ?></td>
            <td><?php echo $objeto; ?></td>
            
            <td><?php echo $descrip; ?></td>
            
            
          </tr>
        <?php

        }
      } else {

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