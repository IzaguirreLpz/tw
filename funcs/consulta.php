<?php 

require 'conexion.php';
require 'funcs.php';

session_start();
			  

if (empty($_POST['masco'])){
				echo json_encode("seleccione una vehiculo");
        
		} elseif (empty($_POST['detalle'])){
		 	echo json_encode( "Destalle de atencion esta vacio.");
        } elseif (empty($_POST['id_clie'])) {
            echo json_encode( "cliente vacio");	
        

  
   }
			
elseif (

			 !empty($_POST['mod_id'])


        ) {



$id_cliente=$_POST['id_clie']; 

$auto=$_POST['masco'];
$obs=$_POST['detalle'];
$ate=$_POST['mod_id'];

    
    
    
    $num_fact=getNum();
    
    
    


    		$sql="UPDATE tbl_atenciones SET id_auto='".$auto."', observacion='".$obs."', status= 2  WHERE id_atencion=".$ate."";
    
    
    
		$query_update = mysqli_query($mysqli,$sql);

    
    
    echo "INSERT INTO detalle_factura(numero_factura, id_producto, cantidad, precio_venta) select $num_fact , id_producto, cantidad_tmp,precio_tmp from tmp where num=$ate";
    $detalle=mysqli_query($mysqli,"INSERT INTO detalle_factura(numero_factura, id_producto, cantidad, precio_venta) select $num_fact , id_producto, cantidad_tmp,precio_tmp from tmp where num=$ate");
    
    
    $condiciones=2;
    
    $idUsuario = $_SESSION['id_usuario'];
       



  
       $insertar_fact=mysqli_query($mysqli,"INSERT INTO facturas ( numero_factura, id_cliente, id_vendedor, condiciones, total_venta, estado_factura, id_atencion) VALUES ('$num_fact','$id_cliente','$idUsuario','$condiciones',(SELECT sum(precio_tmp) as Total FROM tmp WHERE num=$ate),'2',$ate)");
    
    
    
    
    
    
    
    
    
    
			if ($query_update){
    
    
    
                
		echo json_encode("ok");
            }else{
		echo json_encode("error");
}
    
    }


?>