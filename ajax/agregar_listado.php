<?php

require '../funcs/conexion.php';
require '../funcs/funcs.php';



session_start();


//$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$empleado=intval($_GET['id']);
		$query=mysqli_query($mysqli, "select count(*) contar from tbl_vehiculos where cliente_id='".$empleado."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['contar'];
		if ($count!= 0){
            
            
            
            $idUsuario = $_SESSION['id_usuario'];
           
			$agregar=mysqli_query($mysqli,"INSERT INTO tbl_atenciones (id_cliente,id_usuario,status,id_meca ) values ('$empleado','$idUsuario',1,2)");
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
			  <strong>Error!</strong> No tiene vehiculos asignado el cliente.
			</div>
			<?php
			
		}}else {?>
<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
	<?php } ?>