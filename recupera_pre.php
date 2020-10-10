<?php

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = array();
if (!empty($_POST)) {
	echo $_POST['email'];
	$user = $mysqli->real_escape_string($_POST['email']);

	if (usuarioExiste($user)) {

		$user_id = getValor('id_usuario', 'usuario', $user);
		echo "esta bien";
		header('Location:recupera_pre.php?user_id=' . $user_id);
	} else {
		$errors[] = "no existe usuario";
	}
}
?>
<html>

<head>
	<title>Recuperar Password</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stepper.css">
	<link rel="stylesheet" href="css/stylelogin.css" type="text/css" />
</head>

<body>

	<div class="container">
		<img style="margin-top:5%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">
		<?php
		if (empty($_GET['user_id'])) {
		?>
			<div class="w3ls-login">

				<form class="" method="post" id="loginform">
					<div class="agile-field-txt">
						<h3 style="font-size: 20px;font-weight:500">Recuperar Password</h3>
					</div>
					<div class="agile-field-txt">
						<label>
							<i class="glyphicon glyphicon-user" aria-hidden="true"></i>Nombre De Usuario :</label>
						<input type="text" class="form-control" name="email" placeholder="Usuario/Correo" required />
						<span id="check-e"></span>
					</div>

					<div class="w3ls-login  w3l-sub">
						<input type="submit" name="btn-login" value="Enviar" class="btn btn-default">
					</div>
					<div class="form-group">


						<br>
						<a data-toggle="modal" href="/tw" style="cursor: pointer;">Regresar al Login</a>

					</div>

					<!--- <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>-->
				</form>

			</div>
		<?php
		} else {
		?>
			<form id="regForm">
				<h1>Register:</h1>
				<!-- One "tab" for each step in the form: -->
				<div class="tab">Name:
					<p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
					<p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
				</div>
				<div class="tab">Contact Info:
					<p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
					<p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
				</div>
				<div class="tab">Birthday:
					<p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
					<p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
					<p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
				</div>
				<div class="tab">Login Info:
					<p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
					<p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
				</div>
				<div style="overflow:auto;">
					<div style="float:right;">
						<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
						<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
					</div>
				</div>
				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center;margin-top:40px;">
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
				</div>
			</form>
		<?php
		}
		?>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="js/stepper.js"></script>
</body>

</html>