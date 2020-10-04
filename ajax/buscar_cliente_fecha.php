
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';



?>
      
    <link rel="stylesheet" href="tableexport.min.css">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/FileSaver.min.js"></script>
  <script src="js/tableexport.min.js"></script>
      
        <div class="dataTables_length" id="tableListar_length">
      <table class="table" id="tableListar">
        <thead>
          <tr class="">
  
             <th>Id</th>
             <th>Clave</th>
             <th>Nombre </th>
             
              <th>Doctor</th>
             <th>Fecha atencion</th>
            
          </tr>
        </thead>
        <tbody id="emp_body">
          <?php
			
			
			//select *from siec_atenciones where ate_diagnostico not in (''); EXCEPCIONES EN SQL

  
			
			 $sql = "SELECT * FROM siec_atenciones inner join siec_empleados on siec_atenciones.ate_id_empleado= siec_empleados.emp_id_empleado inner join siec_usuarios on siec_atenciones.ate_id_usuario= siec_usuarios.usu_id_usuario  where status=2 order by ate_id_atencion ASC";  
             

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_atenciones  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
$id=$row['ate_id_atencion'];
			               $clave=$row['emp_clave_empleado'];
						$nombre=$row['emp_nombre'];
						$diagnostico=$row['ate_diagnostico'];
            $doctor=$row['usu_username'];
				        $fecha=$row['ate_fecha_visita'];
			            
                 $fecha= date('d/m/Y', strtotime($fecha));
          ?>
   
             
              <tr>
              
            <td><?php echo $id ?></td>
                <td><?php echo $clave;?></td>
                <td><?php echo $nombre;?></td>
                 
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
     
<script type="text/javascript">
  //$(document).ready(function(){
            ExportTable();
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
  //}
            
            </script>
            
            
            
            
            
            
            
            
            
            
      </div>
   
     