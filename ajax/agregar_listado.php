<?php

require '../funcs/conexion.php';
require '../funcs/funcs.php';



session_start();


//$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$empleado=intval($_GET['id']);
		$query=mysqli_query($mysqli, "select * from siec_empleados where emp_id_empleado='".$empleado."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['emp_id_empleado'];
		if ($count!= 0){
            
            
            
            $idUsuario = $_SESSION['id_usuario'];
            $clinica=$_SESSION['clinica'];
			$agregar=mysqli_query($mysqli,"INSERT INTO siec_atenciones (ate_id_empleado,ate_id_clinica,ate_id_usuario,status ) values ('$empleado','$clinica','$idUsuario',1)");
             //$sentencia="INSERT INTO siec_empleados (ate_clave_empleado,ate_id_clinica,ate_id_usuario ) values ( '$empleado',1,1)"
             	//	$sql="INSERT INTO clientes (nombre_cliente, telefono_cliente, email_cliente, direccion_cliente, status_cliente, date_added) VALUES ('$nombre','$telefono','$email','$direccion','$estado','$date_added')";
        
           // print $sentencia;
			?>

			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Agregado a Lista espera Exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}}else {?>
<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
	<?php } ?>