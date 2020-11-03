<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

if ($_SESSION['estado_usuario'] == strtolower('nuevo')) {
    header("Location: preguntas.php");
}
$id_usu = $_SESSION['id_usuario'];
//echo $_SESSION['menus'];

$objeto="pantalla usuario";
		$accion="INGRESO";
		$descripcion="ingreso a pantalla usuario";
		
		$bita=grabarBitacora($id_usu,$objeto,$accion,$descripcion);


?>

<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 
    <!-- //font-awesome icons -->
    
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	     <link href="css/select2.min.css" rel="stylesheet" /> 
      <script src="js/select2.min.js"></script>
</head>

<body>
     <?php  include("barras.php"); ?>
    <section id="container">
        <!--header start-->

        <!--sidebar end-->
        <!--main content start-->
      
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de espera
                            
                            <div class="btn-group pull-right">
                
              
				<a  href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
                
                
			
			</div>
                            </div>
                   
            <div class="panel-body">
               <form class="form-horizontal" role="form" id="empleado">
          
                           
                           <div class="form-group row">
							
                           
				
                    
                      <?php // style="text-transform: uppercase;width:300px; height:90px" if ($insertar==1 || $idUsuario==1){?>
                    
	<label for="q" class="col-md-2 control-label">Cliente o # de factura</label>		
<div class="col-md-5">
					
								<div class="col-md-5">
    </div>
                         <div class="col-md-3">
                                 
								<button type="button" class="btn btn-default" onclick="agregar('<?php echo $rw['emp_id_empleado'];?>')">
									<span class="glyphicon glyphicon-plus" ></span> Agregar  </button>
								<span id="loader"></span>
                                
                                
							</div>
					</div>
				
				
				
				 </div> 
			</form>
                           
                       
                        <div id="resultados"></div><!-- Carga los datos ajax -->
                        <div class='outer_div'></div>

                    </div>
         
			</div>
		
     </div>
           	
	<script type="text/javascript" src="js/VentanaCentrada.js">
             
             </script>
             
            <script src="js/bootstrap.js"></script>
            <script src="js/jquery.dcjqaccordion.2.7.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/jquery.nicescroll.js"></script>
            <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
            <script src="js/jquery.scrollTo.js"></script>
            <!-- morris JavaScript -->

            <!-- calendar -->
            <script type="text/javascript" src="js/monthly.js"></script>

            <!-- //calendar -->
</body>
<?php


//    include("modal/eliminar_usuario.php");
//   include("modal/editar_usuarios.php");
//require 'modal/eliminar_usuario.php';



?>

</html>
<script>
    $(document).ready(function() {
        load(1);
    });
    
    
    
    
    
    	function agregar (id)
		{
			var q= $("#q").val();
            var id= $("#q").val();
		if (confirm("¿Desea agregar a lista de espera? ")){	
		$.ajax({
        type: "GET",
        url: "./ajax/agregar_listado.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}

    function
    obtener_id(item) {


        $("#user_id_mod").val(item);


    }

function agregar (id)
		{
			var q= $("#q").val();
            var id= $("#q").val();
		if (confirm("¿Desea agregar a lista de espera? ")){	
		$.ajax({
        type: "GET",
        url: "./ajax/agregar_listado.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
    	$(".myselect").select2();
		
    $("#editar_password").submit(function(event) {
        $('#actualizar_datos3').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/eliminar_usuario.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#resultados_ajax3").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#resultados_ajax3").html(datos);
                $('#actualizar_datos3').attr("disabled", false);
                load(1);
            }
        });
        event.preventDefault();
    })


    	function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
                    url:'ajax/buscar_clie_pend.php',

				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					$('[data-toggle="tooltip"]').tooltip({html:true}); 
					
				}
			})
		}
</script>