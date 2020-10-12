<?php
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = '';
$type = 'success';

function getCorreo($campo, $tabla, $campoWhere, $valor)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT $campo FROM $tabla WHERE $campoWhere = ? ");
	$stmt->bind_param('s', $valor);
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

function valid_email($str)
{
	return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
}

if (!empty($_POST)) {
	$userName = $_POST['email'];
	$email = getCorreo('correo_electronico', 'tbl_usuario', 'usuario', $userName);

	if (emailExiste($email)) {
		if (valid_email($email) == 1) {
			$usuariocam = "usuario";
			$nombre = getValor('nombre_usuario', 'correo_electronico', $email);
			$user_id = getValor('id_usuario', "correo_electronico", $email);
			$token = '';
			for ($i = 0; $i < 16; $i++) {
				$token .= chr(rand(65, 90));
			}
			$token1 = generaTokenPass($user_id, $token);
			$url = "https://tecnowash.herokuapp.com/reset_password.php?userid={$user_id}&token={$token}";
			$asunto = 'Recuperar Contasenia';
			grabarBitacora($user_id, 'Recuperacion de Password', 'Solicitud', 'Se solicito recuperacion de password mediante correo electronico');
			$cuerpo = "
	
	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
	
	<html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
	<head>
	<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
	<meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
	<meta content='width=device-width' name='viewport'/>
	<!--[if !mso]><!-->
	<meta content='IE=edge' http-equiv='X-UA-Compatible'/>
	<!--<![endif]-->
	<title></title>
	<!--[if !mso]><!-->
	<!--<![endif]-->
	<style type='text/css'>
			body {
				margin: 0;
				padding: 0;
			}
	
			table,
			td,
			tr {
				vertical-align: top;
				border-collapse: collapse;
			}
	
			* {
				line-height: inherit;
			}
	
			a[x-apple-data-detectors=true] {
				color: inherit !important;
				text-decoration: none !important;
			}
		</style>
	<style id='media-query' type='text/css'>
			@media (max-width: 520px) {
	
				.block-grid,
				.col {
					min-width: 320px !important;
					max-width: 100% !important;
					display: block !important;
				}
	
				.block-grid {
					width: 100% !important;
				}
	
				.col {
					width: 100% !important;
				}
	
				.col>div {
					margin: 0 auto;
				}
	
				img.fullwidth,
				img.fullwidthOnMobile {
					max-width: 100% !important;
				}
	
				.no-stack .col {
					min-width: 0 !important;
					display: table-cell !important;
				}
	
				.no-stack.two-up .col {
					width: 50% !important;
				}
	
				.no-stack .col.num4 {
					width: 33% !important;
				}
	
				.no-stack .col.num8 {
					width: 66% !important;
				}
	
				.no-stack .col.num4 {
					width: 33% !important;
				}
	
				.no-stack .col.num3 {
					width: 25% !important;
				}
	
				.no-stack .col.num6 {
					width: 50% !important;
				}
	
				.no-stack .col.num9 {
					width: 75% !important;
				}
	
				.video-block {
					max-width: none !important;
				}
	
				.mobile_hide {
					min-height: 0px;
					max-height: 0px;
					max-width: 0px;
					display: none;
					overflow: hidden;
					font-size: 0px;
				}
	
				.desktop_hide {
					display: block !important;
					max-height: none !important;
				}
			}
			a{
				color:white;
				text-decoration:none;
			}
		</style>
	</head>
	<body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #fff;'>
	<!--[if IE]><div class='ie-browser'><![endif]-->
	<table bgcolor='#fff' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; width: 100%;' valign='top' width='100%'>
	<tbody>
	<tr style='vertical-align: top;' valign='top'>
	<td style='word-break: break-word; vertical-align: top;' valign='top'>
	<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#fff'><![endif]-->
	<div style='background-color:transparent;'>
	<div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
	<div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
	<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
	<!--[if (mso)|(IE)]><td align='center' width='500' style='background-color:transparent;width:500px; border-top: 8px solid #B8221F; border-left: 8px solid #B8221F; border-bottom: 8px solid #B8221F; border-right: 8px solid #B8221F;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
	<div class='col num12' style='min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 484px;'>
	<div style='width:100% !important;'>
	<!--[if (!mso)&(!IE)]><!-->
	<div style='border-top:8px solid #B8221F; border-left:8px solid #B8221F; border-bottom:8px solid #B8221F; border-right:8px solid #B8221F; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
	<!--<![endif]-->
	<div></div>
	<div align='center' class='img-container center autowidth' style='padding-right: 0px;padding-left: 0px;'>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
	<!--[if mso]></td></tr></table><![endif]-->
	</div>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 25px; padding-left: 25px; padding-top: 25px; padding-bottom: 25px; font-family: Arial, sans-serif'><![endif]-->
	<div style='color:#b8221f;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.2;padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px;'>
	<div style='line-height: 1.2; font-size: 12px; color: #b8221f; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 14px;'>
	<p style='font-size: 18px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 22px; margin: 0;'><span style='font-size: 18px;'><strong>CAMBIO DE PASSWORD</strong></span></p>
	</div>
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
	<table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
	<tbody>
	<tr style='vertical-align: top;' valign='top'>
	<td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
	<table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
	<tbody>
	<tr style='vertical-align: top;' valign='top'>
	<td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	</tbody>
	</table>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
	<div style='color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
	<div style='line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 14px;'>
	<p style='font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;'>Hola estimado {$nombre}, hemos recibido la solicitud de cambio de password; en caso de no haberlo solicitado usted ignore este correo de lo contrario favor haga clic en el botón para recuperar su password</p>
	</div>
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
	<table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
	<tbody>
	<tr style='vertical-align: top;' valign='top'>
	<td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
	<table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
	<tbody>
	<tr style='vertical-align: top;' valign='top'>
	<td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	</tbody>
	</table>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='' style='height:31.5pt; width:180.75pt; v-text-anchor:middle;' arcsize='10%' stroke='false' fillcolor='#276a9c'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Arial, sans-serif; font-size:16px'><![endif]-->
	<div style='text-decoration:none;display:inline-block;color:#ffffff;background-color:#276a9c;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #276a9c;border-right:1px solid #276a9c;border-bottom:1px solid #276a9c;border-left:1px solid #276a9c;padding-top:5px;padding-bottom:5px;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;'><span style='padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;'><span style='font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'>
	<a href={$url}>
	<button style:'background-color: #276a9c;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;  display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;'>Recuperar Password</span></span></div>
	</a>
	<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
	</div>
	<!--[if (!mso)&(!IE)]><!-->
	</div>
	<!--<![endif]-->
	</div>
	</div>
	<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
	<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
	</div>
	</div>
	</div>
	<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
	</td>
	</tr>
	</tbody>
	</table>
	<!--[if (IE)]></div><![endif]-->
	</body>
	</html>
	";
			$enviado = enviarEmail($email, $nombre, $asunto, $cuerpo);
			if ($enviado == true) {
				$errors = 'Se ha enviado un enlace para cambiar tu password a ' . $email . ' favor verifica tu correo';
				$type = 'success';
			} else {
				$errors = 'Hemos tenido problemas de servidor para enviar tu recuperacion de contraseña ';
				$type = 'danger';
			}
		} else {
			$errors = 'El siguiente correo electronico (' . $email . ') asociado con esta cuenta tiene un formato incorrecto favor ponerse en contacto con su administrador';
			$type = 'danger';
		}

		global $mysqli;
		$hoy = new DateTime();
		$stmt = $mysqli->prepare("UPDATE tbl_usuario SET fecha_cambio_contrasena=NOW() WHERE id_usuario = ?");
		$stmt->bind_param('i', $user_id);
		$stmt->execute();
		$stmt->close();
		//		$errors = "mensaje enviado con exito al correo: {$email}";
		//		$type = 'success';
	} else {
		$errors = "El usuario no existe intentalo de nuevo";
		$type = 'danger';
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

	<img style="margin-top:10%" src="images\tecniwahs_logo.png" alt="tecniwash logo" srcset="">
	<div class="container">
		<?php
		if ($errors != '') {
			echo showMessage($errors, $type);
		}
		?>
	</div>
	<div class="w3ls-login">
		<form class="" method="post" id="recuperarPass">
			<div class="agile-field-txt">
				<h4 style="font-size: 20px;font-weight:300">Recuperar Contraseña</h4>
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="glyphicon glyphicon-user" aria-hidden="true"></i>Nombre De Usuario :</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" name="email" placeholder="Usuario" autocomplete="Off" required />
				<span id="check-e"></span>
			</div>

			<div class="agile-field-txt">
				<a data-toggle="modal" href="recupera_pre.php" style="cursor: pointer;">Recuperar Mediante Preguntas</a>
			</div>

			<hr />

			<div class="w3ls-login  w3l-sub">
				<input type="submit" name="btn-login" class="btn btn-default">

			</div>
			<div class="form-group">


				<br>
				<a data-toggle="modal" href="index.php" style="cursor: pointer;">Regresar al Login</a>

			</div>
			<br />
		</form>

	</div>
</body>

</html>