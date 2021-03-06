<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}
$idUsuario = $_SESSION['id_usuario'];

$edicion = 0;
$rol = 5;
$token = generateRandomString();

if (isset($_GET["us"])) {
    $edicion = 1;
    $idElement = $_GET["us"];
    $arreglo = getArray("roles", "rol_id_rol", $idElement);
    $nombreRol = $arreglo['rol_nombre'];
	$descripcionRol = $arreglo['rol_descripcion'];
};

if (!empty($_POST)) {
     /*$post = file_get_contents('php://input');
    echo $post; */
    if (!empty($_POST['editMode'])){
        $editId = $_POST['editMode'];
        $nombreRol = $_POST['marca'];
        $descripcionRol = $_POST['modelo'];
        $sql = "UPDATE roles
			SET
			rol_nombre = '$nombreRol',
			rol_descripcion = '$descripcionRol',
			rol_fecha_modificacion =  current_timestamp()
			WHERE rol_id_rol = $idElement;";
        global $mysqli;
        $conexion = $mysqli;
        if (mysqli_query($conexion, $sql)) {
            $errors = 'Se han actualizado los datos de el Rol correctamente';
            $type = 'success';
        } else {
            $mensaje = mysqli_error($conexion);
            $errors = 'Hemos tenido el siguiente problema: a la hora de actualizar ' . $mensaje . 'Contacta tu Administrador</br>'.$sql.'';
            $type = 'warning';
        }
       // mysqli_close($conexion);
    }else{
    $nombreRol = $_POST['marca'];
    $descripcionRol = $_POST['modelo'];
    global $mysqli;
    $conexion = $mysqli;	
    $consulta = "INSERT INTO roles
		(rol_nombre,rol_descripcion)
		VALUES
		('$nombreRol','$descripcionRol');";
    if (mysqli_query($conexion, $consulta)) {
        $errors = 'Se ha ingresado el rol correctamente';
        $type = 'success';
        header('Location: roles.php');
    } else {
        $mensaje = mysqli_error($conexion);
        $errors = 'Hemos tenido el siguiente problema: ' . $mensaje . '</br> Contacta tu Administrador</br>'.$consulta.'';
        $type = 'warning';
    }
    //mysqli_close($conexion);
    }
}
?>

<!DOCTYPE html>

<head>
    <title>Agregar Producto Nuevo</title>
    <link rel="icon" href="images\favicon\favicon.ico" type="image/ico" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <link rel="stylesheet  prefetch" href="css/bootstrap.min.css">
    <link rel="stylesheet  prefetch" href="css/bootstrap-theme32.min.css">
    <link rel="stylesheet  prefetch" href="css/bootstrapValidator32.min.css">

</head>

<body>
    <style>
        .form-w3layouts {
            background-color: #fff;
        }
    </style>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="" class="logo">
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
                    <li><a href="logout.php"><i class="fa fa-key"></i> Salir</a></li>
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
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

            </section>
            <div class="form-w3layouts">
                <!-- page start-->

                <?php
                if ($errors != '') {
                    echo showMessage($errors, $type);
                }
                ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php
                        if ($edicion != 0) {
                            echo "Editar Rol";
                        } else {
                            echo "Agregar Nuevo Rol";
                        } ?>
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>

                            <a class="fa fa-share" href="roles.php"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal" method="post" action="" novalidate="novalidate">
                            <?php if($edicion != 0){
                                ?>
                            <input type="hidden" id="usu" name="editMode" <?php echo "value=$idElement";?> >
                            <?php
                            }
                            ?>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">Nombre Rol:</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-file-signature"></i></span>
                                            <input maxlength="70" type="text" <?php if ($edicion != 0) {
                                    echo "value='$nombreRol'";
                                } ?> name="marca" placeholder="Marca" style="text-transform: uppercase;" id="txt_nc" autocomplete="off" autofocus="on" class="form-control" onkeypress="return soloLetras(event)" onPaste="return false;" title="Marca del Vehiculo" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">Descripcion Rol:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                                                    <input maxlength="70" type="text" <?php if ($edicion != 0) {
                                    echo "value='$descripcionRol'";
                                } ?> name="modelo" placeholder="Modelo" style="text-transform: uppercase;" id="txt_nc" autocomplete="off" autofocus="on" class="form-control" onkeypress="return soloLetras(event)" onPaste="return false;" title="Marca del Vehiculo" required>
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-success" value="Guardar" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
                <!-- page end-->
            </div>
        </section>
        <!--main content end-->
    </section>

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        //eliminar alerta despues de 5 segundos
        let alerta = document.getElementsByClassName('alert');
        setTimeout(function() {
            while (alerta.length > 0) {
                alerta[0].parentNode.removeChild(alerta[0]);
            }
        }, 3500);
    </script>

    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <!-- morris JavaScript -->
    <script src="js/toastr.min.js"></script>
    <!-- calendar -->
    <script type="text/javascript" src="js/monthly.js"></script>
    <!-- //calendar -->
    <script src="js\validaciones.js"></script>
</body>

</html>






























