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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 
  <!-- <script src="../js/jquery.min.js"></script>
  <script src="../js/FileSaver.min.js"></script>
  <script src="../js/tableexport.min.js"></script> -->
   <!-- Librerias para generar reportes -->
<link rel="stylesheet" type="text/css" href="reportsLibrary\datatables.min.css">
<script type="text/javascript" src="reportsLibrary\datatables.min.js"></script>
<script type="text/javascript" src="reportsLibrary\pdfmake.min.js"></script>
<script type="text/javascript" src="reportsLibrary\vfs_fonts.js"></script>
<!-- Librerias para generar reportes -->

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
        <h3 class="display-4" style="text-align: center;color:#676767;margin:10px 0;">Reporte de Vehiculos</h3>
    </div>
</div>

<div class="dataTables_length" id="tableListar_length">
<table class="table table-striped b-t b-light" id="tableListar" style="margin: 10px 0 0 0;">
 
        <thead>
            <tr class="success">

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
      
      
    if (!empty($hasta) && !empty($desde)){
              $desde = "$desde 00:00:00";
              $hasta = "$hasta 23:59:59";
                $sql = "SELECT a.status,a.id_atencion,c.identidad ,a.fecha_visita ,a.id_cliente id_cliente,c.nom_cliente, c.ape_cliente 
                  from tbl_clientes c , tbl_atenciones a 
                  where a.id_cliente= c.id_cliente AND LEFT(a.fecha_visita,10)=CURDATE() and fecha_visita between '$desde' and '$hasta'
                  ORDER BY a.id_atencion ASC;";
             }else{
                $sql = "SELECT a.status,a.id_atencion,c.identidad ,a.fecha_visita ,a.id_cliente id_cliente,c.nom_cliente, c.ape_cliente from tbl_clientes c , tbl_atenciones a 
                  where a.id_cliente= c.id_cliente AND LEFT(a.fecha_visita,10)=CURDATE() ORDER BY a.id_atencion ASC ";
                }

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
            $finalizado = " ATENCION FINALIZADA";$label_class='label-danger';
                $status=$row['status'];
          $clie=$row['id_cliente'];      
              
         
         
          ?>


            <tr>

                <td><?php echo $item; ?></td>
                <td><?php echo $clave;?></td>
                <td><?php echo $nombre;?></td>



                <?php

//label label-success
switch ($status) {
    case 1:
                  ?> <td><span class="label label-warning"><?php echo $pendiente; ?></span> </td> <?php
        break;
    case 2:
                  ?> <td> <span class="label label-info"><?php echo  $atendido; ?></span></td> <?php
        break;
        
        
        
            case 3:
                  ?> <td> <span class="label label-danger"><?php echo  $ausente; ?></span></td> <?php
        break;
        
        case 4:
                  ?> <td> <span class="label label-success"><?php echo  $finalizado; ?></span></td> <?php
        break;
}
      
            
?>









                <td><?php echo $fecha;?></td>


                <td>


                    <?php 
            
            
           //   $historial=TieneHistorial($id_emp);  
           $historial=1;
            if ($historial!=1) {     ?>


                    <a href="histo_con.php?id=<?php echo $clie;?>" data-toggle="tooltip" class='btn btn-danger'
                        title='AGREGAR HISTORIAL'><i class="fa fa-cog"></i></a>

                    <?php
}
?>






 <?php 
            if ($status==2 ||$status==1) {     ?>
                    <a href="consulta.php?ate=<?php echo $id;?>&id=<?php echo $clie;?>" data-toggle="tooltip" title="ATENDER CONSULTA"
                        class='btn btn-default'><span class="fa fa-cog"></span></a>


                    <?php
}
?>


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