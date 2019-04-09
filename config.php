<?php
$mysqli = new mysqli('localhost:3308','root','','eye');
	// conexion('servidor','usuario','contraseña','basededatos');
	if ($mysqli->connect_errno) {
		echo "Error de conexión de Base de Datos".$mysqli->connect_error;
	} 