<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}
$id_usu = $_SESSION['id_usuario'];

$us = 0;
//para que cuando sea agregar el rol sea nuevo predeterminado
$rol = 5;
$token = generateRandomString();
//for ($i = 0; $i < 16; $i++) {
//	$token .= chr(rand(65, 90));
//}


//echo $token;

if (isset($_GET["us"])) {
    $us = $_GET["us"];

    $arreglo = getArray("tbl_usuario", "id_usuario", $us);
    $nom = $arreglo['nombre_usuario'];
    $usu = $arreglo['usuario'];
    $rol = $arreglo['id_rol'];
    $estado = $arreglo['estado_usuario'];
    $corr = $arreglo['correo_electronico'];
};

if (!empty($_POST)) {
    //$post = file_get_contents('php://input');
    //echo $post;
    $nombre = $_POST['product_nombre'];
    $precio = $_POST['product_price'];
    $descripcion = $_POST['product_description'];
    $unidades = $_POST['product_units'];
    global $mysqli;
    $conexion = $mysqli;
    $consulta = "INSERT INTO tbl_productos(nombre,precio,descripcion,cantidad) VALUES ('$nombre',$precio,'$descripcion',$unidades);";
    if (mysqli_query($conexion, $consulta)) {
        $errors = 'Se ha ingresado el producto correctamente';
        $type = 'success';
    } else {
        $errors = 'Lamentablemente hemos tenido problemas ingresando el producto, si puedes reportalo con tu Administrador';
        $type = 'warning';
    }
    mysqli_close($conexion);
}

//echo $_SESSION['id_usuario'];
//echo $_SESSION['menus'];
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

    <!-- <link rel="stylesheet  prefetch" href="css/bootstrap2.min" > -->
    <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>-->

    <link rel="stylesheet  prefetch" href="css/bootstrap.min.css">
    <link rel="stylesheet  prefetch" href="css/bootstrap-theme32.min.css">
    <link rel="stylesheet  prefetch" href="css/bootstrapValidator32.min.css">
    <!--   <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
	<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->


</head>

<body>
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
                                if ($us != 0) {
                                    echo "Editar  Producto $usu ";
                                } else {
                                    echo "Agregar Nuevo Producto ";
                                } ?>
                                <span class="tools pull-right">
                                    <a class="fa fa-chevron-down" href="javascript:;"></a>

                                    <a class="fa fa-share" href="usuarios.php"></a>
                                </span>
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal" method="post" action="" novalidate="novalidate">
                                        <input type="hidden" id="usu" name="usu" <?php echo "value='$us'";  ?>>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3">Nombre Producto:</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-file-signature"></i></span>
                                                    <input maxlength="70" type="text" <?php if ($us != 0) {
                                                                                            echo "value=$nom";
                                                                                        } ?> name="product_nombre" placeholder="Nombre" style="text-transform: uppercase;" id="txt_nc" autocomplete="off" autofocus="on" onkeyup="return unspaces()" onkeypress="return soloLetras(event)" class="form-control" onkeypress="return soloLetras(event)" onPaste="return false;" title="Nombre Del Producto" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="control-label col-lg-3">Precio de Venta:</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-money-bill-wave"></i></span>
                                                    <input maxlength="15" type="number" name="product_price" <?php if ($us != 0) {
                                                                                                                    echo "value=$usu ";
                                                                                                                } ?> style="text-transform: uppercase;" id="txt_us" autocomplete="off" autofocus="on" onkeyup="return nospaces()" onPaste="return false;" class="form-control" title="Recuerda ingresar un precio" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3">Precio de Compra:</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fas fa-money-bill-wave"></i></span>
                                                    <input maxlength="15" type="number" name="product_compra" <?php if ($us != 0) {
                                                                                                                    echo "value=$usu ";
                                                                                                                } ?> style="text-transform: uppercase;" id="txt_us" autocomplete="off" autofocus="on" onkeyup="return nospaces()" onPaste="return false;" class="form-control" title="Recuerda ingresar un precio" required>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function soloLetras(e) {
                                                key = e.keyCode || e.which;
                                                tecla = String.fromCharCode(key).toLowerCase();
                                                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                                                especiales = "8-37-39-46";
                                                tecla_especial = false
                                                for (var i in especiales) {
                                                    if (key == especiales[i]) {
                                                        tecla_especial = true;
                                                        break;
                                                    }
                                                }
                                                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <script>
                                            function soloLetras(e) {
                                                key = e.keyCode || e.which;
                                                tecla = String.fromCharCode(key).toLowerCase();
                                                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                                                especiales = "8-37-39-46";
                                                tecla_especial = false
                                                for (var i in especiales) {
                                                    if (key == especiales[i]) {
                                                        tecla_especial = true;
                                                        break;
                                                    }
                                                }
                                                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <!-- Text input-->
                                        <?php if ($us == 0) { ?>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Descripcion:</label>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                                                        <textarea class="form-control" name="product_description" autocomplete="off" title="recuerda describir el producto que venderas" autofocus="on" id="exampleFormControlTextarea1" rows="1" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function nospaces2() {
                                                    orig = document.form.pass1.value;
                                                    nuev = orig.split(' ');
                                                    nuev = nuev.join('');
                                                    document.form.pass1.value = nuev;
                                                    if (nuev = orig.split(' ').length >= 2);
                                                }
                                            </script>

                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Proveedor:</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fas fa-parachute-box"></i></span>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="product_supliers" title="Por favor seleccione un proveedor">
                                                            <option value="1">Inversiones Multiples</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Unidades en Inventario:</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fas fa-boxes"></i></span>
                                                        <input maxlength="20" type="number" name="product_units" placeholder="Confirmar Password" id="pass2" title="Numero total de productos con el que cuentas en inventario" class="form-control" autocomplete="off" autofocus="on" onkeyup="return nospaces1()" onPaste="return false;" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function nospaces1() {
                                                    orig = document.form.pass2.value;
                                                    nuev = orig.split(' ');
                                                    nuev = nuev.join('');
                                                    document.form.pass2.value = nuev;
                                                    if (nuev = orig.split(' ').length >= 2);
                                                }
                                            </script>
                                        <?php } ?>
                                        <script>
                                            function nospaces3() {
                                                orig = document.form.correo.value;
                                                nuev = orig.split(' ');
                                                nuev = nuev.join('');
                                                document.form.correo.value = nuev;
                                                if (nuev = orig.split(' ').length >= 2);
                                            }

                                            function validar() {
                                                var correo, expresion;
                                                correo = document.getElementById("correo").value;
                                                expresion = /\w+@\w+\.+[a-z]/;
                                                if (correo.length > 80) {
                                                    alert("El campo correo excede su capacidad de caracteres");
                                                } else if (!expresion.test(correo)) {
                                                    alert('El correo no es valido');
                                                    return false;
                                                }
                                            }
                                        </script>
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
    </script>
    <script>
        $(document).on('submit', '#loginform', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'registrar2.php',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data) {
                    toastr.options.timeOut = 2000;
                    // toastr.options.showMethod = 'fadeIn';
                    // toastr.options.hideMethod = 'fadeOut';
                    // toastr.options.positionClass = 'toast-top-center';
                    if (data == "ok") {
                        toastr.success("Guardado con exito.");
                        setTimeout(function() {
                            location.href = "usuarios.php";
                        }, 1500);
                    } else {
                        toastr.error(data);
                    }
                }
            })
        });

        function showVitales() {
            // element = document.getElementById("auto");
            check = document.getElementById("auto");
            if (check.checked) {
                document.getElementById('pass1').value = '<?php echo $token ?>';
                document.getElementById('pass2').value = '<?php echo $token ?>';
            } else {
                document.getElementById('pass1').value = '';
                document.getElementById('pass2').value = '';
            }
        }

        function showContent() {
            element = document.getElementById("conte");
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display = 'block';
                document.getElementById('incapacidad').value = 1;
                // a=document.getElementById('check').value=1;
                //alert(a)
            } else {
                element.style.display = 'none';
                document.getElementById('incapacidad').value = "0";
                // a=document.getElementById('check').value=2;
                //alert(a)
            }
        }

        $(document).on('ready', function() {
            $('#show-hide-passwd').on('click', function(e) {
                e.preventDefault();
                var current = $(this).attr('action');
                if (current == 'hide') {
                    $(this).prev().attr('type', 'text');
                    $(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action', 'show');
                }
                if (current == 'show') {
                    $(this).prev().attr('type', 'password');
                    $(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action', 'hide');
                }
            })
        })

        $(document).on('ready', function() {
            $('#show-hide-passwd1').on('click', function(e) {
                e.preventDefault();
                var current = $(this).attr('action');
                if (current == 'hide') {
                    $(this).prev().attr('type', 'text');
                    $(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action', 'show');
                }
                if (current == 'show') {
                    $(this).prev().attr('type', 'password');
                    $(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action', 'hide');
                }
            })
        });
    </script>

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
    <!-- //calendar -->
</body>

</html>