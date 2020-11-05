<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}
$id_usu= $_SESSION['id_usuario'];
$nombre=getNum();
//echo $_SESSION['id_usuario'];
//echo $_SESSION['menus'];
?>

<!DOCTYPE html>
<head>
<title>HOME</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<link rel="stylesheet" href="css/toastr.min.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>

<!-- <link rel="stylesheet  prefetch" href="css/bootstrap2.min" > -->
<!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>-->
	
<link rel="stylesheet  prefetch" href="css/bootstrap.min.css" >
<link rel="stylesheet  prefetch" href="css/bootstrap-theme32.min.css" >
<link rel="stylesheet  prefetch" href="css/bootstrapValidator32.min.css" >
  <!--   <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
	<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->
	<link href="css/select2.min.css" rel="stylesheet" /> 
      <script src="js/select2.min.js"></script>

</head>
<body>
<?php     include("barras.php"); ?>
<section id="main-content">
	<section class="wrapper">
		
</section>
<div class="form-w3layouts">
            <!-- page start-->
            
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          ATENCIÓN
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                            <form class="cmxform form-horizontal " name="consultas" method="post" id="loginform"  action="" novalidate="novalidate">
                            <div class="agileinfo-row">
							<input type="" id="mod_id" name="mod_id" value="<?php echo $nombre;?>">
							<div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Auto</label>
            
              <div class='col-md-8'>
                <select  class="myselect" style="text-transform: uppercase;width:300px; height:90px" id="masco" name="masco"  >
                <?php 
				$query_cod_veh=mysqli_query($mysqli,"SELECT id_vehiculo,placa, marca, modelo, color  from tbl_vehiculos");
				while($rw=mysqli_fetch_array($query_cod_veh))	{
					?>
                    
				<option value="<?php echo $rw['id_vehiculo'];?>"><?php echo $rw['placa']." | ". $rw['marca']." ". $rw['modelo']. " ".  $rw['color'];?></option>			
					<?php
				}

				?>
			
                </select>
              </div>
			 
          </div>
		  
		  
			


			
			 
              
  
			 
              
       

			 </div>
			 
			 	<div class="agileinfo-row w3ls-row2"> 
			 
			       
			     
			  
				
			  <div class="form-group">
			   <label for="direccion" class="col-sm-3 control-label">Detalle atención</label>
				<div class="col-sm-8">
			  	 <div class="input-group">
			  	  <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
				  <textarea input  class="form-control" id="direccion" name="direccion" placeholder="Direccion" pattern="[a-zA-Z0-9]{2,64}" title="Detalle de atención"   onPaste="return false;" rows=10 cols="100" autocomplete="off"></textarea>
				</div> 
			  </div>
			  </div>
				

			   
                            
      
         
              
			 </div>
		 
		  <div class="btn-group pull-right">
				<button type='button' class="btn btn-danger" data-toggle="modal"  onclick="obtener_id()" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Usados en consulta</button>
			</div>
          	<div id="resultados">
                   <b>Servicios o Productos</b>
                </div><!-- Carga los datos ajax -->
				<div class='outer_div'></div>

                                    
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                           
                                        </div>
                                   
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>











<?php   include("modal/eliminar_usados-modal.php"); ?>
    
</section>
<!--main content end-->
</section>
   


<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script src="js/toastr.min.js"></script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script>
        
  	
	
        
$(".myselect").select2();
     
     $(document).on('submit', '#loginform', function(event) {
		event.preventDefault();
		$.ajax({
			url: 'funcs/consulta.php',
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
			success:function(data){
	
				toastr.options.timeOut = 2000;
				// toastr.options.showMethod = 'fadeIn';
				// toastr.options.hideMethod = 'fadeOut';
				// toastr.options.positionClass = 'toast-top-center';
				
				if(data=="ok"){
					toastr.info("Consulta registrada con exito");
					setTimeout(function(){
						location.href="recetas.php";
					},2000);
				}
			
				else{
					toastr.error(data);
				}
			}
		})
	});

    
    
    
    
		$(".myselect").select2();
		
    	 	  function obtener_id(){
		
var hasta = $('#mod_id').val();
var desde=$('#masco').val();
			$("#nom").val(hasta);
	        $("#mas").val(desde);
	      
 }
       
   
    
    
        	 	  function capturar(id){

			$("#consul_id").val(id);
	     
	      
 }
       
   

	 	$(document).ready(function(){
			load(1);
		});

		function load(page){
            var hasta = $('#mod_id').val();	
		
			$("#loader").fadeIn('slow');
			$.ajax({
                type:'POST',
				url:'ajax/atencion_ajax.php',
                data:'hasta='+hasta,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}  
    

    
	</script>


        
<?php
				
				
			include("modal/registro_usado.php");
		

	

		  
			?>
        
	<!-- //calendar -->
</body>
</html>
