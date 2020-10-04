<?php








	require '../funcs/conexion.php';
require '../funcs/funcs.php';

$id_empleado=$_REQUEST["emple"];

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('ate_diagnostico','	ate_f_cardiaca','ate_f_respiratoria','	ate_presion','ate_temperatura','ate_imc','ate_glucometria','ate_fecha_visita');//Columnas de busqueda
		 $sTable = "v_expediente";
        $where=" where ate_id_empleado= $id_empleado";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
        
        
        
        
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 4; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable $where $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $where $sWhere   ORDER BY ate_fecha_visita DESC LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					
				
					
				
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					
					$diagnostico=$row['ate_diagnostico'];
                    $fc=$row['ate_f_cardiaca'];
                    $fr=$row['ate_f_respiratoria'];
                    $presion=$row['ate_presion'];
                    $temperatura=$row['ate_temperatura'];
                    $peso=$row['ate_peso_lbs'];
                    $imc=$row['ate_imc'];
                    $gluco=$row['ate_glucometria'];
                    $fecha=$row['ate_fecha_visita'];
                    $doctor=$row['usu_nombre_com'];
				 
					?>
                  
					<tr>
                                   <td ><b> Fecha:</b> <?php echo $fecha; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Doctor:</b> <?php echo $doctor; ?> <br>
                                      <b> Diagnostico:</b> <?php echo $diagnostico; ?> <br><br>
                                       
                                       
                                       <?php if (!empty($fc)){  ?>
                        
                        <b> FC:</b> <?php echo $fc; } ?>
                  
                                        <?php if (!empty($fr)){  ?>
                                       <b> FR:</b> <?php echo $fr; }?>
                                       
                                        <?php if (!empty($presion)){  ?>
                                       <b> Presion:</b> <?php echo $presion;} ?>
                                       
                                        <?php if (!empty($temperatura)){  ?>
                                       <b> Temp:</b> <?php echo $temperatura; }?>                                       
                                       
                                        <?php if (!empty($peso)){  ?>
                                       <b> Peso:</b> <?php echo $peso;} ?>
                                       
                                        <?php if (!empty($imc)){  ?>
                                       <b> IMC:</b> <?php echo $imc; }?>
                                       
                                       
                                       
                                        <?php if (!empty($gluco)){  ?>
                                       <b> Glucometria:</b> <?php echo $gluco;} ?>
                                       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </td>

			
						<!--<td class='col-xs-3'>
						<div class="">
						<input type="date" class="form-control" style="text-align:right" id="fecha_vence_<?php echo $id_producto; ?>"  value="1" >
						</div></td>-->
					
					
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>