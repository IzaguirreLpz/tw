
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
      <table class="table" id="tableListar">
        <thead>
          <tr class="info">
  
             <th>N°</th>
             <th>clave</th>
             <th>nombre </th>
            
              <th>obs.Personales</th>
             <th>obs.Familiares</th>
              <th>clinica</th>
              <th>Fecha</th>
            <th> Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
			
			
			

				
			if ($rol !=1){
         $clinica_b="where enc_id_clinica=$clinica ";
         
     }else{
    $clinica_b="";
                 
                 
                 
     }
  
			
			 $sql =  "SELECT * from siec_encabezado_antecedentes inner join siec_empleados on siec_empleados.emp_id_empleado=siec_encabezado_antecedentes.enc_id_empleado inner JOIN siec_usuarios on siec_usuarios.usu_id_usuario=siec_encabezado_antecedentes.enc_id_usuario inner JOIN siec_clinicas on siec_clinicas.cli_id_clinica=siec_encabezado_antecedentes.enc_id_clinica  $clinica_b";

			$query = mysqli_query($mysqli, $sql);
     
			
			$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM siec_encabezado_antecedentes  ");
		$row1= mysqli_fetch_array($count_query);
			
			$numrows = $row1['numrows'];
			
 
          if ($numrows>0){
			
        while ($row=mysqli_fetch_array($query)){
			
                        
            $id=$row['enc_id_encabezado_ant'];
            $clave=$row['enc_clave_empleado'];
            $nom_emp=$row['emp_nombre'];
            $perso=$row['enc_obse_personales'];
            $familiares=$row['enc_obse_familiares'];
            $clinica=$row['cli_nombre'];
			$fecha_creacion=$row['enc_fecha_creacion'];
		   $fecha_creacion=date('d/m/Y', strtotime($fecha_creacion));	   
     
          ?>
   
             
              <tr>
              
            <td><?php echo $id; ?></td>
                  <td><?php echo $clave; ?></td>
                <td><?php echo $nom_emp;?></td>
                  <td><?php echo $perso;?></td>
                  <td><?php echo $familiares;?></td>
                <td><?php echo $clinica;?></td>
                  <td><?php echo $fecha_creacion;?></td>
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
     