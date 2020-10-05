<?php

require '/funcs/conexion.php';
require '/funcs/funcs.php';
$errors = array();
if (empty($_GET['user_id'])) {
    header('Location: index.php');
}

if (empty($_GET['token'])) {
    header('Location: index.php');
}

$user_id = $mysqli->real_escape_string($_GET['user_id']);
$token = $mysqli->real_escape_string($_GET['token']);

$objeto = "cambia_pass";
$accion = "INGRESO";
$descripcion = "Esta en la pantalla de cambia password";
$bita = grabarBitacora($user_id, $objeto, $accion, $descripcion);

if (!verificaTokenPass($user_id, $token)) {
    echo 'No se pudo verificar los Datos';
    exit;
}

?>


<html>

<head>
    <title>Cambiar Password</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/bootstrap.min.js"></script>

    >
    <script src="../login/js/jquery.min.js"></script>
    <script src="../login/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../login/css/bootstrap.min.css">
    <link rel="stylesheet" href="../login/css/bootstrap-theme.min.css">

    <script src="../login/js/jquery.min.js"></script>
    <script src="../login/js/bootstrap.min.js"></script>



</head>

<body>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Cambiar Password</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">

                    <form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">

                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />

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