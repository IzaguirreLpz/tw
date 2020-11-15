<?php

include('../funcs/conexion.php');
include('../funcs/funcs.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//if para añadirle condiciones al select

//$cli=$_POST['cli'];
session_start();
 
$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
if (
      !empty($hasta) &&
      !empty($desde) 
    ){

  $con_fecha="and  ate_fecha_visita BETWEEN '$desde' AND '$hasta'";
    $tit_fecha=" de la fecha : $desde  hasta  $hasta";
    
   
}else{
    $con_fecha="";
    $tit_fecha="";
    
}

?>

   
    <!-- <link rel="stylesheet" href="../css/tableexport.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
 
  <!-- <script src="../js/jquery.min.js"></script>
  <script src="../js/FileSaver.min.js"></script>
  <script src="../js/tableexport.min.js"></script> -->


  <style>
  table ,tr td{
    border:1px solid white
  }
  tbody {
    display:block;
    height:450px;
    overflow:auto;
  }
  thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
  }
  thead {
    width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
  }
  .btn-toolbar {
     margin-left: 0px;
  }

    h1,h2,h3,h4,h5,h6{
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
  </style>

<div class="row">
    <div class="col">
        <h3 class="display-4" style="text-align: center;color:#676767">Reporte de Servicios <?php echo $tit_fecha; ?></h3>
    </div>
</div>
<div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">

          
        <thead>
   
      <tr class="success">
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio De Venta</th>
                <th>Precio Costo</th>
                <th>Proveedor</th>
                <th>Categoria</th>
                <th>Fecha Registro</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($hasta) && !empty($desde)){
              $sql = "SELECT * FROM bd_tw.products where tipo=1 and date_added between '$desde' and '$hasta' order by id_producto;";
                //$sql = "SELECT * FROM bd_tw.products where tipo=1 date_added between '$desde' and '$hasta' order by id_producto";
             }else{
                $sql = "SELECT * FROM bd_tw.products where tipo=1 order by id_producto;";
                }
      $query = mysqli_query($mysqli, $sql);
        $item=0;
if(mysqli_num_rows($query)>0){
  while($row = mysqli_fetch_array($query)){
    $product_id = $row['id_producto'];
                    $codigo = $row['codigo_producto'];
                    $nombre = $row['nombre_producto'];
                    $precio = $row['precio_producto'];
                    $precioCosto = $row['precio_costo'];
                    $proveedor = $row['proveedor'];
                    $categoria = $row['categorias'];
                    $fechaRegistro = $row['date_added'];
                    $fechaRegistro = date('d/m/Y', strtotime($fechaRegistro));
?>
        <tr>
                <td><?php echo $codigo ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $precio; ?></td>
                <td><?php echo $precioCosto; ?></td>
                <td><?php echo $proveedor; ?></td>
                <td><?php echo $categoria; ?></td>
                <td><?php echo $fechaRegistro; ?></td>
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
         $(document).ready(function() {
    $('table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
            </script>
      </div>