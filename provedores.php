<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}
$insertar=getPer('per_insercion',$_SESSION['id_rol'],'16');
if ($_SESSION['estado_usuario'] == strtolower('nuevo')) {
    header("Location: preguntas.php");
}
$idUsuario = $_SESSION['id_usuario'];
//echo $_SESSION['menus'];

$objeto="pantalla usuario";
		$accion="INGRESO";
		$descripcion="ingreso a pantalla proveedores";
		
		$bita=grabarBitacora($idUsuario,$objeto,$accion,$descripcion);


//en esta etapa se obtiene el submit del modal para eliminar el Cliente
if (!empty($_POST['clientId'])) {
    $idProveedor = $_POST['clientId'];
    //codigo de validacion

    $cont=getContar('products','proveedor',$idProveedor);

    if ($cont==null) {
   
    $a = 3;

    $sql = "DELETE  FROM tbl_proveedores WHERE id_proveedor='" . $idProveedor . "'";
    $query = mysqli_query($mysqli, $sql);
    $objeto = "Proveedor";
    $accion = "DELETE";
    $descripcion = "eliminar  proveedor";

    if ($query) {
        $messages = "Registro eliminado con éxito.";
        $bita = grabarBitacora($idUsuario, $objeto, $accion, $sql);
    } else {
        $errors = "Lo sentimos , el intento de eliminado falló. Por favor, regrese y vuelva a intentarlo.";
    }
    } else {
        $errors = " ya fue utilizado en una factura, no  puedes eliminarlo.";
    }
    //codigo normal
    global $mysqli;
    $query = "DELETE FROM tbl_proveedores WHERE id_proveedor = $idProveedor;";
    $objeto = "tbl_proveedores";
    $accion = "DELETE";
    $descripcion = "Se elimino un proveedor";
    if (mysqli_query($mysqli, $query)) {
        $errors = "Proveedor eliminado con éxito.";
        grabarBitacora($idProveedor, $objeto, $accion, $query);
    }else{
        $errors = "Lo sentimos , el intento de eliminado falló. Por favor, regrese y vuelva a intentarlo.";
        $type="warning";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Provedores</title>
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
                         Provedores
                         <?php  if ($insertar==1 || $idUsuario==1){?>
                            <div class="btn-group pull-right">
                                <button type='button' class="btn btn-success" onClick="location.href='add_proveedor.php'"><span class="glyphicon glyphicon-plus"></span> Agregar Proveedor</button>
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
                        
             <a  href="javascript:reportePDF();" style="margin: 0 15px" class="btn btn-danger">Generar PDF</a>
           
             </a>
                        </div>
                         <?php
                if ($errors != '') {
                    echo showMessage($errors, $type);
                }
                ?>
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
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">¿Seguro que deséa eliminar este Proveedor?</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="editar_password" name="editar_password">
                    <div id="mensajeAjax"></div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="hidden" id="clientId" name="clientId">
                            <div class="container">
                                <img width="50%" src="./images/delete.svg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" id="eliminarProducto">Eliminar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>
<script>
    //eliminar alerta despues de 5 segundos
        let alerta = document.getElementsByClassName('alert');
        setTimeout(function() {
            while (alerta.length > 0) {
                alerta[0].parentNode.removeChild(alerta[0]);
            }
        }, 3500);
    $(document).ready(function() {
    $('table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    $(document).ready(function() {
        load(1);
    });

    function
    obtener_id(item) {
        let val = item;
        let id = document.getElementById('clientId');
        console.log(item)
        id.value = val;
        $("#user_id_mod").val(item);
    }

    function load(page) {

        $("#loader").fadeIn('slow');
        $.ajax({
            url: 'ajax/buscar_proveedores.php',
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
		var url = 'ajax/buscar_provedores_fecha.php';
            
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
    window.open('rpt_proveedores.php?desde=' + desde + '&hasta=' + hasta + '&buscar=' + busca);
}

</script>