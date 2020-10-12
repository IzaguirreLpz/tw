<?php


session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

if(!isset($_SESSION['id_usuario'])){
    header ("Location: index.php");
}
$id_usu= $_SESSION['id_usuario'];
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
if ($id_usu==1){
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
            
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Configuraciones
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="get" action="" novalidate="novalidate">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="firstname" name="firstname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="lastname" name="lastname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Username</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="username" name="username" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="password" name="password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-3 col-sm-3">Agree to Our Policy</label>
                                        <div class="col-lg-6 col-sm-9">
                                            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-3 col-sm-3">Receive the Newsletter</label>
                                        <div class="col-lg-6 col-sm-9">
                                            <input type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
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
</html>
