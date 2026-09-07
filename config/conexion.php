<?php
// Requerir los parámetros de configuración de constantes
require_once __DIR__ . '/constantes.php';

function conectar() {
    // Establecer conexión con la BD
    $conexion = mysqli_connect(HOST, USER, PW, BD);

    // Verificar si la conexión falló
    if (!$conexion) {
        die("La conexión con la BD falló: " . mysqli_connect_error());
    }

    // Establecer conjunto de caracteres utf8mb4 para el hosting
    mysqli_set_charset($conexion, 'utf8mb4');

    return $conexion;
}
?>
