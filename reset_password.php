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
        $errors = 'Muy Bien Contraseña actualizada correctamente, por favor espere unos segundos';
        $type = 'success';
        $confPass = hashPassword($pass);
        updPass($confPass, $userid);
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
        <?php
        if ($errors != '') {
            echo showMessage($errors, $type);
            // header("Location: /tw/", TRUE, 301);
            header("Refresh:5; url=http://localhost/tw/", true, 303);
        }
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