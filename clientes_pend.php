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
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="home.php" class="logo">
                    MENU
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="images/2.png">
                            <span class="username"><?php echo $_SESSION['usuario'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">

                            <li><a href="logout.php"><i class="fa fa-key"></i>Salir</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <?php
                        if ($id_usu == 1) {
                            include("menu2.php");
                        }
                        //echo $_SESSION['menus']; 
                        ?>

                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de espera
                            </div>
                            
                                    <div class="row w3-res-tb">

                           
                           
                           
                               <form class="form-horizontal" role="form" id="empleado">
				
                    
                      <?php // if ($insertar==1 || $idUsuario==1){?>
                    
			
							
							<div class="col-sm-4">
							
								<select  class="myselect" style="text-transform: uppercase;width:330px; height:90px" id="q"  name="empleado"  >
                <?php 
				$query_cod_veh=mysqli_query($mysqli,"SELECT id_cliente, identidad, nom_cliente from tbl_clientes ");
				while($rw=mysqli_fetch_array($query_cod_veh))	{
					?>
                    
				<option value="<?php echo $rw['id_cliente'];?>"><?php echo $rw['identidad'];?> | <?php echo $rw['nom_cliente'];?></option>			
					<?php
				}

				?>
			
                </select>
                             
                </div>     
                            
                            
                            
							
							
							
							<div class="col-sm-3">
								<button type="button" class="btn btn-default" onclick="agregar('<?php echo $rw['emp_id_empleado'];?>')">
									<span class="glyphicon glyphicon-plus" ></span> Agregar  </button>
								<span id="loader"></span>
                                
                                
							</div>
					
				
				<?php //} ?>
				
				
			</form>
                            <div class="">
                            </div>
                            <div class="">

                            </div>
                        </div>
                        <div id="resultados"></div><!-- Carga los datos ajax -->
                        <div class='outer_div'></div>

                    </div>
                </div>
            </section>
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
require 'modal/eliminar_usuario.php';



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