<?php 
	// Change the line below to your timezone!
	date_default_timezone_set('America/El_Salvador');
	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>
          <!--   <td style="width: 25%; color: #444444;">
               <img style="width: 100%;" src="../../<?php echo get_row('perfil','logo_url', 'id_perfil', 1);?>" alt="Logo"><br>
            </td> -->
				<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo get_row('tbl_parametros','descripcion', 'id_parametro', 7);?></span>
				<br><?php echo get_row('tbl_parametros','descripcion', 'id_parametro', 4).", ". get_row('tbl_parametros','descripcion', 'id_parametro',11)." ";?><br>
				Teléfono: <?php echo get_row('tbl_parametros','descripcion', 'id_parametro',12);?><br>
                Email: <?php echo get_row('tbl_parametros','descripcion', 'id_parametro',13);?><br>
                Fecha: <?php $date = date('d/m/Y'); echo "$date";?><br>
                Hora: <?php $time = date('H:i:s'); echo "$time";?><br>
				</td>
			<td style="width: 25%;text-align:right">
			FACTURA Nº <?php echo $numero_factura;?>
			</td>
        </tr>
    </table>
	<?php }?>	