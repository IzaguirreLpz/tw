<?php

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = '';
$type;
$access = false;

if (!empty($_POST['email'])) {
	$user = $mysqli->real_escape_string($_POST['email']);

	if (usuarioExiste($user)) {

		$user_id = getValor('id_usuario', 'usuario', $user);
		header('Location:recupera_pre.php?user_id=' . $user_id);
	} else {
		$errors = "El usuario ingresado no existe, intente nuevamente";
		$type = 'danger';
	}
}

if (!empty($_POST['password'])) {
	$pass = $_POST['password'];
	$confPass = $_POST['con_password'];
	$userid = $_GET['user_id'];
	if ($pass != $confPass) {
		$errors = 'Lamentablemente las contraseñas ingresadas no coinciden, Intentalo de Nuevo';
		$type = 'danger';
		$access = true;
	} else {

		$confPass = hashPassword($pass);
		updPass($confPass, $userid);
		$errors = 'Muy Bien Contraseña actualizada correctamente, por favor espere unos segundos';
		print("<script>   setTimeout(function(){location.href='index.php';},3000);                  </script>");
		$type = 'success';
	}
}


function getPregunta($idUser, $idPregunta)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT respuesta FROM bd_ber.tbl_respuestas where id_usuario = ? and id_pregunta=?;");
	$stmt->bind_param('ii', $idUser, $idPregunta);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($_campo);
		$stmt->fetch();
		return $_campo;
	} else {
		return null;
	}
}

if (!empty($_POST['respuesta'])) {
	$respuesta = $_POST['respuesta'];
	$pregunta = $_POST['pregunta'];
	$user_id = $_GET['user_id'];
	$respuestaBd = getPregunta($user_id, $pregunta);
	if ($respuesta == $respuestaBd) {
		$errors = "Respuesta Correcta Ingrese Nueva Contraseña";
		$type = 'success';
		$access = true;
	} else {
		$errors = "Respuesta Incorrecta Intentalo Nuevamente";
		$type = 'danger';
	}
}
?>
<html>

<head>
	<title>Recuperar Password</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stylelogin.css" type="text/css" />
</head>

<body>

	<div class="container">
		<img style="margin-top:5%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">
		<?php
		if (empty($_GET['user_id'])) {
			if ($errors != '') {
				echo showMessage($errors, $type);
			}

		?>
			<div class="w3ls-login">

				<form class="" method="post" id="loginform">
					<div class="agile-field-txt">
						<h3 style="font-size: 20px;font-weight:500">Recuperar Password</h3>
					</div>
					<div class="agile-field-txt">
						<label>
							<i class="glyphicon glyphicon-user" aria-hidden="true"></i>Nombre De Usuario :</label>
						<input type="text" maxlength="15" style="text-transform: uppercase;" class="form-control" autocomplete="off" name="email" placeholder="Usuario" required />
						<span id="check-e"></span>
					</div>

					<div class="w3ls-login  w3l-sub">
						<input type="submit" name="btn-login" value="Enviar" class="btn btn-default">
					</div>
					<div class="form-group">


						<br>
						<a href="index.php" style="cursor: pointer;">Regresar al Login</a>

					</div>
				</form>

			</div>
		<?php
		} else if ($access == false) {
		?>
			<div class="container">
				<?php
				if ($errors != '') {
					echo showMessage($errors, $type);
				}
				?>
			</div>
			<div class="w3ls-login">
				<form class="" method="post" id="loginform">
					<div class="agile-field-txt">
						<h3 style="font-size: 20px;font-weight:500">Seleccione Pregunta De Seguridad</h3>
					</div>
					<div class="agile-field-txt">
						<?php
						$user_id = $_GET['user_id'];
						global $mysqli;
						$conexion = $mysqli;
						$consulta = "SELECT p.id_pregunta, p.pregunta FROM tbl_preguntas p WHERE p.id_pregunta IN (SELECT id_pregunta from tbl_respuestas where id_usuario= $user_id)";
						$result = mysqli_query($conexion, $consulta); {
						?>
							<select name="pregunta" class="form-control" id="sectorbox">
								<?php
								while ($row = mysqli_fetch_array($result)) {
									echo '<option value="' . $row['id_pregunta'] . '">' . ' - ' . $row['pregunta'] . '</option>';
								}

								?>
							</select>
						<?php
						}
						?>
					</div>
					<div class="agile-field-txt">
						<input type="text" class="form-control" maxlength="15" name="respuesta" placeholder="Respuesta" autocomplete="off" required />
						<span id="check-e"></span>
					</div>

					<div class="w3ls-login  w3l-sub">
						<input type="submit" name="btn-login" value="Enviar" class="btn btn-default">
					</div>
					<div class="form-group">


						<br>
						<a href="index.php" style="cursor: pointer;">Regresar al Login</a>

					</div>
				</form>

			</div>
		<?php
		} else if ($access == true) {
			if (!empty($_POST['password'])) {
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
			<div class="container">
				<?php
				if ($errors != '') {
					echo showMessage($errors, $type);
				}
				?>
			</div>
			<div class="w3ls-login">


				<form class="" method="post" id="loginform">
					<div class="agile-field-txt">
						<h3 style="font-size: 20px;font-weight:500">Cambiar Password</h3>
					</div>
					<div class="agile-field-txt">
						<label>
							<i class="glyphicon glyphicon-lock" aria-hidden="true"></i> Neva Contraseña :</label>
						<input type="password" maxlength="15" class="form-control" name="password" placeholder="Contraseña" required />
						<span id="check-e"></span>
					</div>

					<div class="agile-field-txt">
						<label>
							<i class="glyphicon glyphicon-lock" aria-hidden="true"></i> password :</label>
						<input type="password" maxlength="15" class="form-control" name="con_password" placeholder="Password" id="password" required />
						<span toggle="password-field" id="eye" class="fa fa-eye field-icon" toggleClass=" toggle-password" onclick="myFunction()"></span>
					</div>

					<div class="w3ls-login  w3l-sub">
						<input type="submit" name="btn-login" value="Modificar" class="btn btn-default">
					</div>
				</form>

			</div>
		<?php
		}
		?>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>

</html>