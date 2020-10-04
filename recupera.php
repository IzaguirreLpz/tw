<?php

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$status = array();
//if (!empty($_POST)) {
if (isset($_POST['submit'])) {
	$email = $mysqli->real_escape_string($_POST['email']);

	if (usuarioExiste($email)) {

		$co = "correo_electronico";
		$usuariocam = "usuario";
		$cor = getValor($co, $usuariocam, $email);

		$user_id = getValor('id_usuario', 'usuario', $email);
		$nombre = getValor('nombre_usuario', 'correo_electronico', $cor);
		$token =  generateToken();
		$token1 = generaTokenPass($user_id, $token);
		$url = 'http://localhost:8080/triste/mau2/login/cambia_pass.php?user_id=' . $user_id . '&token=' . $token;

		$asunto = 'recuperar pass';
		$cuerpo = "Estimado:$nombre <br /><br />Para continuar con el proceso de recuperación, es indispensable de click en la siguiente url <a href='$url'>Recuperar password</a>";

		if (enviarEmail($cor, $nombre, $asunto, $cuerpo)) {

			echo " le hemos enviado la direccion de correo electronico: $email por favor revisar";

			echo "<br><a href='index.php' >Iniciar Sesion</a>";
			exit;
		}
		$status[] = "Todo esta saliendo segun el plan";
	} else {
		$status[] = "no existe usuario";
	}
}
?>
<html>

<head>
	<title>Recuperar Password</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/stylelogin.css" type="text/css" />

	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<?php echo resultBlock($status);
	?>

	<img style="margin-top:10%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">
	<!--TECNIWASH<div class="signin-form">-->

	<div class="w3ls-login">


		<form class="" method="post" id="loginform">
			<div class="agile-field-txt">
				<h4 style="font-size: 20px;font-weight:500">Recuperar Contraseña</h4>
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="glyphicon glyphicon-user" aria-hidden="true"></i> Correo Electronico :</label>
				<input type="text" class="form-control" name="email" placeholder="Email" autocomplete="Off" required />
				<span id="check-e"></span>
			</div>

			<div class="agile-field-txt">
				<a data-toggle="modal" href="/tw/recupera_pre.php" style="cursor: pointer;">Recuperar Mediante Preguntas</a>
			</div>

			<hr />

			<div class="w3ls-login  w3l-sub">
				<input type="submit" name="btn-login" class="btn btn-default">

			</div>
			<br />
			<!--- <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>-->
		</form>

	</div>

	<!-- 
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
							<input id="email" type="text" class="form-control" name="email" placeholder="USUARIO" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" maxlength="15" onPaste="return false;" required>
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

				</div>
			</div>
		</div>
	</div>

 -->

</body>

</html>