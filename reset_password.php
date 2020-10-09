<?php

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = '';
$type = 'success';

$userid = $mysqli->real_escape_string($_GET['userid']);
$token = $mysqli->real_escape_string($_GET['token']);

$objeto = "cambia_pass";
$accion = "INGRESO";
$descripcion = "Esta en la pantalla de cambia password";
$bita = grabarBitacora($userid, $objeto, $accion, $descripcion);

if (!verificaTokenPass($userid, $token)) {
    $errors =  'No se pudo verificar los Datos';
    $type = 'danger';
}

if ($_POST != null) {
    $pass = $_POST['password'];
    $confPass = $_POST['con_password'];

    if ($pass != $confPass) {
        $errors = 'Lamentablemente las contraseñas ingresadas no coinciden, Intentalo de Nuevo';
        $type = 'danger';
    } else {
        $errors = 'Muy Bien Contraseña actualizada correctamente';
        $type = 'success';
        $confPass = hashPassword($pass);
        updPass($confPass, $userid);
        //header('/index.php');
        header("Location: /tw/", TRUE, 301);
    }
}

?>


<html>

<head>
    <title>Cambiar Password</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/stylelogin.css" type="text/css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="../login/js/jquery.min.js"></script>
    <script src="../login/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../login/css/bootstrap.min.css">
    <link rel="stylesheet" href="../login/css/bootstrap-theme.min.css">

    <script src="../login/js/jquery.min.js"></script>
    <script src="../login/js/bootstrap.min.js"></script>



</head>

<body>

    <div class="container">
        <img style="margin-top:5%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">
        <?php echo showMessage($errors, $type);
        ?>
        <div class="w3ls-login">


            <form class="" method="post" id="loginform">
                <div class="agile-field-txt">
                    <h3 style="font-size: 20px;font-weight:500">Cambiar Password</h3>
                </div>
                <div class="agile-field-txt">
                    <label>
                        <i class="glyphicon glyphicon-lock" aria-hidden="true"></i> Neva Contraseña :</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
                    <span id="check-e"></span>
                </div>

                <div class="agile-field-txt">
                    <label>
                        <i class="glyphicon glyphicon-lock" aria-hidden="true"></i> password :</label>
                    <input type="password" class="form-control" name="con_password" placeholder="Password" id="password" required />
                    <span toggle="password-field" id="eye" class="fa fa-eye field-icon" toggleClass=" toggle-password" onclick="myFunction()"></span>
                </div>

                <div class="w3ls-login  w3l-sub">
                    <input type="submit" name="btn-login" value="Modificar" class="btn btn-default">
                </div>

                <!--- <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>-->
            </form>

        </div>
        <!--  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Cambiar Password</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">

                    <form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">

                        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>" />

                        <input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Nuevo Password</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input title="Nueva Contraseña" maxlength="15" type="password" class="form-control" name="password" placeholder="Password" required>
                                    <span id="show-hide-passwd" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input title="Confirmacion de Contraseña" maxlength="15" type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
                                    <span id="show-hide-passwd1" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">

                            <center>
                                <div class="col-sm-12 controls">
                                    <button title="Modificar Contraseña" id="btn-login" type="submit" class="btn btn-success">Modificar</a>
                                </div>
                            </center>
                        </div>
                    </form>
                    <?php echo resultBlock($errors); ?>
                </div>
            </div>
        </div> -->
    </div>
</body>

</html>

<script>
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
    })
</script>