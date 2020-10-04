<?php

include('../funcs/conexion.php');
include('../funcs/funcs.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$paciente =$_POST['paciente'];
$doctor =$_POST['doctor'];
$enfermedad =$_POST['enfermedad'];
//if para añadirle condiciones al select

$cli=$_POST['cli'];
session_start();
 
$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$clinica= $_SESSION['clinica'];

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



if((!empty($doctor))){
	$con_doctor="and  ate_id_usuario= $doctor";
    $nom_doctor=getUSUARIO('usu_nombre_com','usu_id_usuario',$doctor);
    $tit_doc="Doctor: $nom_doctor";
    
    
}else{
    
    $con_doctor="";
    $tit_doc="";
}





if((!empty($enfermedad))){
	$con_enf="and ate_padece = '$enfermedad'";
    
    $tit_enf=" Enfermedad : $enfermedad";
    
    
}else{
    
    $con_enf="";
    $tit_enf="";
}





if((!empty($cli))){
	$con_cli="and 	ate_id_clinica = $cli";
    $nom_cli=getCualquiera('cli_nombre','siec_clinicas','cli_id_clinica',$cli);
    $tit_cli="Clinica: $nom_cli";
    
    
}else{
    
    $con_cli="";
    $tit_cli="";
}


 if ($rol !=1 and $idUsuario!=1){
         $clinica_b="and 	ate_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
          
                 
     }






if((!empty($paciente))){
$con_empleado = "and ate_id_empleado=$paciente";
$nombre_emp = getEMP('emp_nombre','emp_id_empleado',$paciente);
$tit_emp=" paciente : $nombre_emp";
    
    
    
    
}else{
    
    $con_empleado="";
    $tit_emp="";
}


?>

   
    <link rel="stylesheet" href="tableexport.min.css">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/FileSaver.min.js"></script>
  <script src="js/tableexport.min.js"></script>







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
  </style>





<div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">

          
        <thead>
            
            <tr>
            <th><b> Reporte de Atenciones <?php echo $tit_emp; ?> <?php echo $tit_fecha; ?> <?php echo $tit_doc; ?><?php echo $tit_enf; ?></b>
          </th>
            
            </tr>
            
   
      <tr class="success">
            

             <th>Id</th>
             <th>Clave</th>
             <th>Nombre </th>
            <th>Diagnostico</th>
              <th>Doctor</th>
             <th>Fecha atencion</th>
           
          </tr>
        </thead>
        <tbody>
            <?php
 $sql = "SELECT * FROM siec_atenciones inner join siec_empleados on siec_atenciones.ate_id_empleado= siec_empleados.emp_id_empleado inner join siec_usuarios on siec_atenciones.ate_id_usuario= siec_usuarios.usu_id_usuario  where status=2  $con_doctor $con_empleado $con_fecha $con_enf $clinica_b $con_cli order by ate_id_atencion ASC";          
	//echo $cli;
//echo $sql;
	$query = mysqli_query($mysqli, $sql);
             $item=0;
if(mysqli_num_rows($query)>0){
	while($row = mysqli_fetch_array($query)){
		$item = $item+1;
		
		             		
$id=$row['ate_id_atencion'];
			               $clave=$row['emp_clave_empleado'];
						$nombre=$row['emp_nombre'];
						$diagnostico=$row['ate_diagnostico'];
            $doctor=$row['usu_nombre_com'];
				        $fecha=$row['ate_fecha_visita'];
			            $diagnostico=$row['ate_padece'];
                 $fecha= date('d/m/Y', strtotime($fecha));
		
?>
		    <tr>
              
            <td><?php echo $item ?></td>
                <td><?php echo $clave;?></td>
                <td><?php echo $nombre;?></td>
                 <td><?php echo $diagnostico; ?></td>
                  <td><?php echo $doctor;?></td>
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
          //  ExportTable();
            function ExportTable(){
			$("table").tableExport({
				headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
				footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
				formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
				fileName: "id",                    // (id, String), filename for the downloaded file
				bootstrap: true,                   // (Boolean), style buttons using bootstrap
				position: "well" ,                // (top, bottom), position of the caption element relative to table
				ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file
				ignoreCols: null,                 // (Number, Number[]), column indices to exclude from the exported file
				ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
			});
		}
            
            </script>
      </div>
  
     