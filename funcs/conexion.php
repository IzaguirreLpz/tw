<?php

<<<<<<< HEAD

$mysqli=new mysqli("127.0.0.1","root","","bd_tw"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
=======
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
 $mysqli = new mysqli("testingdb.c2lgpurhnyvd.us-east-1.rds.amazonaws.com", "root", "NiOlUT2X3M1D2maxbCWI", "bd_tw");
if (mysqli_connect_errno()) {
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
} 
	/*
$mysqli=new mysqli("127.0.0.1","root","","bd_ber"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
>>>>>>> aebd972162b49b0b55acd075c7692691808642e7
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}*/

	?>
