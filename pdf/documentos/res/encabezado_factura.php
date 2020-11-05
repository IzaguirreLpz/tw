<?php 
	if ($con){ 
       $sql = "SELECT * FROM tbl_cai";

      $query = mysqli_query($con, $sql);
     
      
      $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM tbl_cai  ");
    $row1= mysqli_fetch_array($count_query);
      
      $numrows = $row1['numrows'];
      
 
          if ($numrows>0){
      
        while ($row=mysqli_fetch_array($query)){
      
                  $num_factura=$row['num_factura'];
                  $cai=$row['cai'];
                  $desde=$row['rango1'];
                  $hasta=$row['rango2'];
                 
        	 }
 
	 }?>

    <table cellspacing="0" style="width: 100%;">
        <tr>

            
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo get_row('perfil','nombre_empresa', 'id_perfil', 1);?></span>
				<br><?php echo get_row('perfil','direccion', 'id_perfil', 1).", ". get_row('perfil','ciudad', 'id_perfil', 1)." ".get_row('perfil','estado', 'id_perfil', 1);?><br> 
				Teléfono: <?php echo get_row('perfil','telefono', 'id_perfil', 1);?><br>
				Email: <?php echo get_row('perfil','email', 'id_perfil', 1);?>
                
            </td>
            
            	<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
               CAI <?php echo $cai;?>			
            RANGO DE IMPRESIÓN: DESDE <?php echo $desde;?> 
            HASTA <?php echo $hasta;?>
                
            </td>
		
			
        </tr>
    </table>
	<?php }?>	