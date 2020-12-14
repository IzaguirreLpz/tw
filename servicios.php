<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

if ($_SESSION['estado_usuario'] == strtolower('nuevo')) {
    header("Location: preguntas.php");
}
$idUsuario = $_SESSION['id_usuario'];
//echo $_SESSION['menus'];

$objeto="pantalla servicios";
		$accion="INGRESO";
		$descripcion="ingreso a pantalla usuario";
		$bita=grabarBitacora($idUsuario,$objeto,$accion,$descripcion);
        $insertar=getPer('per_insercion', $_SESSION['id_rol'],'13');

//en esta etapa se obtiene el submit del modal para eliminar el Cliente
if (!empty($_POST['clientId'])) {
    $idCliente = $_POST['clientId'];
    global $mysqli;
    $query = "DELETE FROM products WHERE id_producto = $idCliente;";
    $objeto = "products";
    $accion = "DELETE";
    $descripcion = "eliminado servicios";
    if (mysqli_query($mysqli, $query)) {
        $errors = "Servicio eliminado con éxito.";
        grabarBitacora($idCliente, $objeto, $accion, $query);
    }else{
        $errors = "Lo sentimos , el intento de eliminado falló. Por favor, regrese y vuelva a intentarlo.";
        $type="warning";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Servicios</title>
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
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="css/monthly.css">
 
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="tableexport.min.css"> -->
 
  <script src="js/jquery.min.js"></script>
  <script src="js/FileSaver.min.js"></script>
  <!-- <script src="js/tableexport.min.js"></script> -->
  <!--- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
	     <link href="css/select2.min.css" rel="stylesheet" /> 
      <script src="js/select2.min.js"></script>
       <!-- Librerias para generar reportes -->
<link rel="stylesheet" type="text/css" href="reportsLibrary\datatables.min.css">
<script type="text/javascript" src="reportsLibrary\datatables.min.js"></script>
<script type="text/javascript" src="reportsLibrary\pdfmake.min.js"></script>
<script type="text/javascript" src="reportsLibrary\vfs_fonts.js"></script>
<!-- Librerias para generar reportes -->
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
                        if ($idUsuario == 1) {
                            include("menu2.php");
                        }else{
                            echo $_SESSION['menus'];

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
                         Servicios
                         <?php  if ($insertar==1 || $idUsuario==1){?>
                            <div class="btn-group pull-right">
                                <button type='button' class="btn btn-success" onClick="location.href='add_servicio.php'"><span class="glyphicon glyphicon-plus"></span> Agregar </button>
                            </div>
                            <?php  } ?>  
                        </div>
                        <div class="row w3-res-tb">

                        <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">INICIO</span>
		   <input  type="date" id="fecha_ini"  name="fecha_ini" placeholder="FECHA INICIO"></div>
		</div>

		<div class="input-group">
		  <span class="input-group-addon">FIN</span>
		<input  type="date"   id="fecha_fin" name="fecha_fin"  >


             <a  href="javascript:reportePDF();" style="margin: 0 15px" class="btn btn-danger">Generar PDF</a>

             </a>
                        </div>
                        <div id="resultados"></div><!-- Carga los datos ajax -->
                        <div class='outer_div'></div>

                    </div>
                </div>
            </section>

            <?php
                if ($errors != '') {
                    echo showMessage($errors, $type);
                }
                ?>
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


<!-- Modal -->
<?php

require 'modal/eliminar_producto.php';

?>



</body>

</html>
<script>
    $(document).ready(function() {
        load(1);
    });

    function obtener_id(id, titulo, descripcion) {
        $("#product_id").val(id);
    }


    
    $("#editar_password").submit(function(event) {
        $('#actualizar_datos3').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/eliminar_producto.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#mensajeAjax").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#mensajeAjax").html(datos);
                $('#actualizar_datos3').attr("disabled", false);
                load(1);
                setTimeout(function() {
                    limpiarMensaje('mensajeAjax');
                    $('#myModal4').modal('hide');
                }, 3000);
            }
        });
        event.preventDefault();
    })


    function load(page) {

        $("#loader").fadeIn('slow');
        $.ajax({
            url: 'ajax/buscar_servicios.php',
            beforeSend: function(objeto) {
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
            },
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');

            }
        })
    }
    /*$('#procesar').on('click', function(){
		var desde = $('#fecha_ini').val();
		var hasta = $('#fecha_fin').val();
		var url = 'ajax/buscar_servicios_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(data){
			$(".outer_div").html(data).fadeIn('slow');
            ExportTable();
            $('#loader').html('');
		}
	});
	return false;
    });*/
    
   function reportePDF() {
    var desde = $('#fecha_ini').val();
    var hasta = $('#fecha_fin').val();
    var inputs = document.getElementsByTagName('input');

for(var i = 0; i < inputs.length; i++) {
    if(inputs[i].type.toLowerCase() == 'search') {
        var busca = inputs[i].value;
        console.log(busca, desde, hasta)
    }
}
    window.open('rpt_servicio.php?desde=' + desde + '&hasta=' + hasta + '&buscar=' + busca);
}

</script>