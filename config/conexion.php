<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "codex"; // <-- Cambiado de TRAVEL a codex



$con = new mysqli($servidor, $usuario, $clave, $base_datos);

if  ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

else {
    echo "Conexión exitosa a la BD!";
}
$con->set_charset("utf8mb4");

?> 
