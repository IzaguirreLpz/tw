<?php

//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
$mysqli = new mysqli("13.59.202.139", "root", "Atlashome2018_", "bd_ber");
if (mysqli_connect_errno()) {
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}
