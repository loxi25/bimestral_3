<?php

// Cargar las constantes de conexión
require_once __DIR__ . '/constantes.php';


function conectar()
{
    // Crear conexión con MySQL
    $conexion = mysqli_connect(
        HOST,
        USER,
        PW,
        BD
    );

    // Verificar si la conexión falló
    if (!$conexion) {

        die(
            "Error de conexión con la base de datos: "
            . mysqli_connect_error()
        );

    }

    // Establecer UTF-8
    mysqli_set_charset($conexion, "utf8mb4");

    // Devolver conexión
    return $conexion;
}

?>