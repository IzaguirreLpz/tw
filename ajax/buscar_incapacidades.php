
<?php


require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();
 

	$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
$clinica= $_SESSION['clinica'];

?>
       <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css1/estilos.css" rel="stylesheet">

        
  
     
      
        <div class="dataTables_length" id="tableListar_length">
            
            <!----- Botones fecha -------->
            <div style="display:none">
            <form>
				<center>
			
				  <input type="date" id="bd-desde"  />
                    <input type="date" id="bd-hasta"  /><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Generar Reporte</a>
				</center>
			</form>
            
            </div>
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>No</th>
             <th>Clave</th>
             <th>Nombre</th>
              <th>Médico</th>
             <th>Diagnóstico</th>
              <th>Tipo</th>
              <th>Clínica Externa</th>
              <th>Médico Externo</th>
             <th>Fecha Inicio </th>
              <th>Fecha Fin </th>
              <th>Total</th>
            <th style="width=10%">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
				
			if ($rol !=1){
         $clinica_b="where inc_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }

  
			
			 $sql = "SELECT * FROM siec_incapacidades inner join siec_empleados on  emp_id_empleado = inc_id_empleado
inner join siec_usuarios on siec_incapacidades.inc_id_usuario= siec_usuarios.usu_id_usuario inner join siec_mot_incapacidad on siec_incapacidades.inc_id_motivo= siec_mot_incapacidad.mot_id_motivo inner join siec_tip_incapacidad on siec_incapacidades.inc_tid_incapacidad= siec_tip_incapacidad.tip_id_incapacidad $clinica_b order by inc_id_incapacidad ASC
 ";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_incapacidades  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                $id=$row['inc_id_incapacidad'];
			    $clave=$row['emp_clave_empleado'];
                 $nom_emp=$row['emp_nombre'];
               $doctor=$row['usu_nombre_com'];
						$diagnostico=$row['inc_diagnostico'];
         
              $tipo_inca=$row['tip_nombre'];
				        $cli_ext=$row['inc_clinica_externa'];
            $mediex=$row['inc_medico_externo'];
            
                
            $fecha_inicio=$row['inc_fecha_inicio'];
			            $fecha_fin=$row['inc_fecha_inicio'];
                 $fecha_inicio= date('d/m/Y', strtotime($fecha_inicio));
            $fecha_fin=date('d/m/Y', strtotime($fecha_fin));
            $cant=$row['inc_dias_incapacidad'];
            
            
            $fecha =$row['inc_fecha_creacion'];
             $fecha=date('d/m/Y', strtotime($fecha));
            $hoy=date("d/m/Y");
            
           
            
            $id_doctor =$row['inc_id_usuario'];
            $user_id = $_SESSION['id_usuario'];
            
            
          ?>
   
             
              <tr>
              
            <td><?php echo $id ?></td>
                <td><?php echo $clave;?></td>
                <td><?php echo $nom_emp;?></td>
               
                  <td><?php echo $doctor;?></td>
                    <td><?php echo $diagnostico;?></td>
                    <td><?php echo $tipo_inca;?></td>
                  <td><?php echo $cli_ext;?></td>
                  <td><?php echo $mediex;?></td>
                  <td><?php echo $fecha_inicio;?></td>
                  <td><?php echo $fecha_fin;?></td>
                  <td><?php echo $cant;?></td>
            
                <td>
                
                    
      
                  
                      <a href="reporte/re_perInca.php?id=<?php echo $id;?>"   data-toggle="tooltip" class='btn btn-danger' title='imprimir' ><i class="fa fa-print"></i></a> 

                    <script>
                    function reportePDF2(){
	var desde = $id;
	
	window.open('reporte/re_perInca.php?desde='+desde);
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
     









