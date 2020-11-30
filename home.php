<?php


session_start();
//echo $_SESSION['menus'];
require 'funcs/conexion.php';
require 'funcs/funcs.php';
$rol= $_SESSION['id_rol'];
$insertar=getPer('per_insercion',$rol,'14');
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

if ($_SESSION['estado_usuario'] == strtolower('nuevo')) {
    header("Location: preguntas.php");
}
$estado = $_SESSION['estado_usuario'];

$idUsuario = $_SESSION['id_usuario'];
//echo $idUsuario;
//echo $_SESSION['menus'];
?>

<!DOCTYPE html>

<head>
    <title>HOME</title>
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
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <style type="text/css">
        .col-lg-6{
            margin: 15px 0;
        }
    </style>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="#" class="logo">
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

                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="container">                    
                    <div class="row">
                        <?php  if ($insertar==1 || $idUsuario==1){?>
                        <div class="col-lg-6">
                            <div class="card" style="width: 18rem;box-shadow: 5px 5px 10px 0px #6f6d6d99;">
                            <a href="add_clie.php">                                
                              <img src="./images/addCliente.svg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h3>Agregar Cliente</h3>
                              </div>
                            </a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php  if ($insertar==1 || $idUsuario==1){?>
                        <div class="col-lg-6">
                            <div class="card" style="width: 18rem;box-shadow: 5px 5px 10px 0px #6f6d6d99;">
                              <a href="add_vehiculo.php">
                              <img src="./images/carro.svg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h3>Agregar Vehiculo</h3>
                              </div>
                              </a>
                            </div>
                        </div>
                        <?php } ?>
                          <?php  if ($insertar==1 || $idUsuario==1){?>
                        <div class="col-lg-6">
                                <div class="card" style="width: 18rem; box-shadow: 5px 5px 10px 0px #6f6d6d99;">
                                    <a href="clientes_pend.php">
                                      <img src="./images/espera.svg" class="card-img-top" alt="...">
                                      <div class="card-body">
                                         <h3>Tickets</h3>
                                      </div>
                                    </a>
                                </div>
                        </div>
                        <?php } ?>
                        <?php  if ($insertar==1 || $idUsuario==1){?>
                        <div class="col-lg-6">
                                <div class="card" style="width: 18rem;box-shadow: 5px 5px 10px 0px #6f6d6d99;">
                                    <a href="atencion_meca.php">
                                      <img src="./images/atencion.svg" class="card-img-top" alt="...">
                                      <div class="card-body">
                                        <h3>Ver Atenciones</h3>
                                      </div>
                                     </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                </div>

            </section>

        </section>
        <!--main content end-->
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <!-- morris JavaScript -->
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- calendar -->
    <script type="text/javascript" src="js/monthly.js"></script>

    <!-- //calendar -->
</body>

</html>