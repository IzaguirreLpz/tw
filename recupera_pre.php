<?php

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = array();
if (!empty($_POST)) {
	$user = $mysqli->real_escape_string($_POST['email']);

	if (usuarioExiste($user)) {

		$user_id = getValor('id_usuario', 'usuario', $user);
		echo "esta bien";

		header('Location:cambia_pass_pre.php?user_id=' . $user_id);
	} else {
		$errors[] = "no existe usuario";
	}
}
?>
<html>

<head>
	<title>Recuperar Password</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>

</head>

<body>

	<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Recuperar Password</div>
					<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
				</div>

				<div style="padding-top:30px" class="panel-body">

					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

					<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="text" class="form-control" name="email" placeholder="USUARIO" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" onPaste="return false;" maxlength="15" required>
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

						<center>
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
						</center>
						<div class="form-group">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
									No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
								</div>
							</div>
						</div>
					</form>
					<?php echo resultBlock($errors); ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>