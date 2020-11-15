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
        <h3 class="display-4" style="text-align: center;color:#676767">Reporte de Proveedores <?php echo $tit_fecha; ?></h3>
    </div>
</div>
<div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">

          
        <thead>
   
      <tr class="success">
                <th>RTN</th>
                <th>Empresa</th>
                <th>Representante</th>
                <th>Telefonos </th>
                <th>correo</th>
                <th>Fecha De Registro</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($hasta) && !empty($desde)){
                $sql = "SELECT * FROM tbl_proveedores where fecha_registro between '$desde' and '$hasta'
                order by id_proveedor DESC;";
             }else{
                $sql = "SELECT * FROM tbl_proveedores order by id_proveedor DESC;";
                }
        //echo $cli;
        //echo $sql;
      $query = mysqli_query($mysqli, $sql);
        $item=0;
if(mysqli_num_rows($query)>0){
  while($row = mysqli_fetch_array($query)){
    /* $item = $item+1; */
        $hola=$row['id_proveedor'];
        $nom_empresa=$row['nom_empresa'];
        $representante=$row['representante'];
        $num_tel1=$row['num_tel1'];
        $num_tel2=$row['num_tel2'];
        $RTN=$row['RTN'];
        $cor_empresa=$row['cor_empresa'];
        $fecha=$row['fecha_registro'];
        $fecha= date('d/m/Y', strtotime($fecha));   
?>
        <tr>
                <td><?php echo $RTN?></td>
                <td><?php echo $nom_empresa?></td>
                <td><?php echo $representante;?></td>
                <td><?php echo $num_tel1." - ".$num_tel2;?></td> 
                <td><?php echo $cor_empresa;?></td>
                <td><?php echo $fecha;?></td>
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