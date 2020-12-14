<?php

session_start();
$session_id= session_id();



if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../funcs/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("funciones.php");
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=mysqli_query($mysqli, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");
    
    
    $cantpro=getValor($id);
    $stock=$cantpro-$cantidad;
   
    $update=mysqli_query($mysqli, "UPDATE products SET cant='".$stock."' WHERE id_producto='".$id."'");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
     $can=getTemp($id_tmp);
    $geTpro= getpro($id_tmp);
    $update=mysqli_query($mysqli, "UPDATE products SET cant=cant+'".$can."' WHERE id_producto='".$geTpro."'");
$delete=mysqli_query($mysqli, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
    
    
         
}
$simbolo_moneda="L";
?>
<table class="table">
    <tr>
        <th class='text-center'>CODIGO</th>
        <th class='text-center'>CANT.</th>
        <th>DESCRIPCION</th>
        <th class='text-right'>PRECIO UNIT.</th>
        <th class='text-right'>PRECIO TOTAL</th>
        <th></th>
    </tr>
    <?php
	$sumador_total=0;
	//"select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	$sql=mysqli_query($mysqli, "select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	
	
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
    <tr>
        <td class='text-center'><?php echo $codigo_producto;?></td>
        <td class='text-center'><?php echo $cantidad;?></td>
        <td><?php echo $nombre_producto;?></td>
        <td class='text-right'><?php echo $precio_venta_f;?></td>
        <td class='text-right'><?php echo $precio_total_f;?></td>
        <td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')">Anular</a></td>
    </tr>
    <?php
	}
	$impuesto=15;
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;

?>
    <tr>
        <td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda;?></td>
        <td class='text-right'><?php echo number_format($subtotal,2);?></td>
        <td></td>
    </tr>
    <tr>
        <td class='text-right' colspan=4>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
        <td class='text-right'><?php echo number_format($total_iva,2);?></td>
        <td></td>
    </tr>
    <tr>
        <td class='text-right' colspan=4>TOTAL <?php echo $simbolo_moneda;?></td>
        <td class='text-right'><?php echo number_format($total_factura,2);?></td>
        <td></td>
    </tr>

</table>