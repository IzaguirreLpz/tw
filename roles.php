<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';
$rol= $_SESSION['id_rol'];
$insertar=getPer('per_insercion',$rol,'7');
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

if ($_SESSION['estado_usuario'] == strtolower('nuevo')) {
    header("Location: preguntas.php");
}
$idUsuario = $_SESSION['id_usuario'];
//echo $_SESSION['menus'];

$objeto="pantalla usuario";
		$accion="INGRESO";
		$descripcion="ingreso a pantalla roles";
		
		$bita=grabarBitacora($idUsuario,$objeto,$accion,$descripcion);


//en esta etapa se obtiene el submit del modal para eliminar el Cliente
if (!empty($_POST['clientId'])) {
    $idCliente = $_POST['clientId'];
    global $mysqli;

    
    $cont=getContar('tbl_usuario','id_rol',$idCliente);

   echo $cont;
    if ($cont==null) {
    $query = "DELETE FROM roles
    WHERE rol_id_rol = $idCliente";
    //$query = "DELETE FROM tbl_clientes WHERE id_cliente = $idCliente;";
    $objeto = "tbl_clientes";
    $accion = "DELETE";
    $descripcion = "ingreso a pantalla productos";

    if (mysqli_query($mysqli, $query)) {
        $errors = "Cliente eliminado con éxito.";
        grabarBitacora($idCliente, $objeto, $accion, $query);
    }else{
        $errors = "Lo sentimos , el intento de eliminado falló. Por favor, regrese y vuelva a intentarlo.";
        $type="warning";
    }
} else {
    $errors = "Este rol ya fue asignado a los usuarios, no  puedes eliminarlo.";
    $type="warning";
}

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CLIENTE</title>
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
  <link rel="stylesheet" href="tableexport.min.css">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/FileSaver.min.js"></script>
  <script src="js/tableexport.min.js"></script>
  <!--- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
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
                         if ($idUsuario == 1) {
                            include("menu2.php");
                        }else{
                        echo $_SESSION['menus']; 
                        }
                        ?>
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
                         Roles
                         <?php  if ($insertar==1 || $idUsuario==1){?>
                            <div class="btn-group pull-right">
                                <button type='button' class="btn btn-success" onClick="location.href='add_rol.php'"><span class="glyphicon glyphicon-plus"></span> Agregar </button>
                            </div>
                            <?php } ?>
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

	


                        
<button id="procesar" class="btn btn-primary">Generar Reporte</button>
             <button class="btn btn-default" title="salir de la consulta"  >   <span class="fa fa-outdent" title="salir de la consulta"  onclick="load(1)"></span> Cerrar Reporte</button>
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


<!-- Modal -->

<?php


//    include("modal/eliminar_usuario.php");
//   include("modal/editar_usuarios.php");
require 'modal/eliminar_roles.php';



?>

</body>

</html>
<script>
    $(document).ready(function() {
        load(1);
    });

    function
    obtener_id(item) {
        let val = item;
        let id = document.getElementById('clientId');
        id.value = val;
        $("#user_id_mod").val(item);
    }

    function
    obtener_id2(item) {


        $("#user_id_mod").val(item);


    }


    /*$("#editar_password").submit(function(event) {
        $('#actualizar_datos3').attr("disabled", true);
        var tabla = "tbl_clientes";
		var campo = "id_cliente";
        var  user_id_mod =  $("#user_id_mod").val(item);
        $.ajax({
            type: "POST",
            url: "ajax/eliminar_cliente.php",
            data: 'tabla='+tabla+'&campo='+campo+'&user_id_mod='+user_id_mod,
            beforeSend: function(objeto) {
                $("#resultados_ajax3").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#resultados_ajax3").html(datos);
                $('#actualizar_datos3').attr("disabled", false);
               // load(1);
            }
        });
        event.preventDefault();
    })*/

    function load(page) {

        $("#loader").fadeIn('slow');
        $.ajax({
            url: 'ajax/buscar_roles.php',
            beforeSend: function(objeto) {
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
            },
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');

            }
        })
    }

   
    $('#procesar').on('click', function(){
      
		var desde = $('#fecha_ini').val();
		var hasta = $('#fecha_fin').val();
		var url = 'ajax/busca_clientes_fecha.php';
            
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
	$("#editar_password").submit(function(event) {
        $('#actualizar_datos3').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/eliminar_rol.php",
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
        
       
            function ExportTable(){
			$("table").tableExport({
                
                
                 
                
				headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
				footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
				formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
				fileName: "id",                    // (id, String), filename for the downloaded file
				bootstrap: true,                   // (Boolean), style buttons using bootstrap
				position: "well" ,                // (top, bottom), position of the caption element relative to table
				ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file
				ignoreCols: null,                 // (Number, Number[]), column indices to exclude from the exported file
				ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
			});
		}
        
</script>