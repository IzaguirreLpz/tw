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
$idUsuario = $_SESSION['id_usuario'];
//echo $_SESSION['menus'];

$objeto = "pantalla usuario";
$accion = "INGRESO";
$descripcion = "ingreso a pantalla usuario";
$insertar=getPer('per_insercion',$_SESSION['id_rol'],'17');
$bita = grabarBitacora($idUsuario, $objeto, $accion, $descripcion);


?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestion De Productos</title>
    <link rel="icon" href="images\favicon\favicon.ico" type="image/ico" sizes="16x16">
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
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
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
                            PRODUCTOS
                            <div class="btn-group pull-right">
                            <?php  if ($insertar==1 || $idUsuario==1){?>
                                <button type='button' class="btn btn-success" onClick="location.href='add_product.php'"><span class="glyphicon glyphicon-plus"></span> Agregar </button>
                                <?php  } ?>    
                            </div>
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

require 'modal/eliminar_producto.php';

?>

</html>

<script>

    

$('#procesar').on('click', function(){
      
        var desde = $('#fecha_ini').val();
        var hasta = $('#fecha_fin').val();
        var url = 'ajax/busca_productos_fecha.php';
            
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
    });

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

    function limpiarMensaje(id) {
        let content = document.getElementById(id);
        content.removeChild(content.lastElementChild);
    }

    function load(page) {

        $("#loader").fadeIn('slow');
        $.ajax({
            url: 'ajax/buscar_productos.php',
            beforeSend: function(objeto) {
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
            },
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');

            }
        })
    }


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
    window.open('rpt_productos.php?desde=' + desde + '&hasta=' + hasta + '&buscar=' + busca);
}


</script>