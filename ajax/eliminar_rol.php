<?php

session_start();


	require '../funcs/conexion.php';
require '../funcs/funcs.php';
	$idUsuario = $_SESSION['id_usuario'];

		


if (empty($_POST['user_id_mod'])){
			$errors[] = "ID vacío";
		 
 }  elseif (
			 !empty($_POST['user_id_mod'])
			
   ) {
			
	$user_id=$_POST['user_id_mod'];
			
			$cont=getContar('tbl_usuario','id_rol',$user_id);

		
			 if ($cont==null) {
			
			
			
				
				
				    
						   $sql = "DELETE  FROM tbl_usuario WHERE id_usuario='".$user_id."'";
                    $query = mysqli_query($mysqli,$sql);
				

		         $objeto="tbl_usuario";
		          $accion="DELETE";
		         $descripcion="ingreso a pantalla usuarios";
		
		         
                     //   $messages[] = "usuario ha sido eliminado con éxito.";
                   //elseif ($query) {
                        //$errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                   // }
				
				   
				   if ($query){ 
					
						   
					$messages[] = "usuario ha sido eliminado con éxito.";
					$bita=grabarBitacora($idUsuario,$objeto,$accion,$sql);
			
	   
	           }else{

					$errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
				   }




            
        } else {
            $errors[] = "Este rol ya fue asignado no lo puedes eliminar.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
		}
?>