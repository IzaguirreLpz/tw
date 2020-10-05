<?php
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$status = array();
if (!empty($_POST)) {
	//if (isset($_POST['submit'])) {
	$email = $mysqli->real_escape_string($_POST['email']);

	if (emailExiste($email)) {

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

		if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {

			echo " le hemos enviado la direccion de correo electronico: $email por favor revisar";

			echo "<br><a href='index.php' >Iniciar Sesion</a>";
			exit;
		}
		$status[] = "mensaje enviado con exito al correo: {$email}";
		$status[] = "Por favor revisa tu correo";
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
	<?php echo successBlock($status);
	?>

	<img style="margin-top:10%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">

	<div class="w3ls-login">

		<form class="" method="post" id="recuperarPass">
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
		</form>

	</div>
</body>

</html>