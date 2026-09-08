<?php

require_once __DIR__ . '/config/conexion.php';

$conexion = conectar();

echo "✅ CONEXIÓN EXITOSA";
echo "<br>";
echo "Base de datos: " . BD;

?>