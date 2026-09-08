<?php

require_once __DIR__ . '/config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acceso no permitido.");
}

$conexion = conectar();

$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");
$id_producto = intval($_POST["id_producto"] ?? 0);
$id_categoria = intval($_POST["id_categoria"] ?? 0);

if (
    empty($nombre) ||
    empty($correo) ||
    empty($mensaje) ||
    $id_producto <= 0 ||
    $id_categoria <= 0
) {
    die("Todos los campos son obligatorios.");
}

/*
 * Primero buscamos si el cliente ya existe.
 */
$sql_cliente = "SELECT id_cliente 
                FROM cliente 
                WHERE correo = ?
                LIMIT 1";

$stmt = mysqli_prepare($conexion, $sql_cliente);
mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$cliente = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);


/*
 * Si no existe, creamos el cliente.
 */
if (!$cliente) {

    $sql_cliente = "INSERT INTO cliente
                    (nombre_cliente, apellidos_cliente, cuenta_google, telefono, correo, presupuesto)
                    VALUES (?, '', 0, 0, ?, 0)";

    $stmt = mysqli_prepare($conexion, $sql_cliente);

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $nombre,
        $correo
    );

    if (!mysqli_stmt_execute($stmt)) {
        die("Error al crear el cliente: " . mysqli_error($conexion));
    }

    $id_cliente = mysqli_insert_id($conexion);

    mysqli_stmt_close($stmt);

} else {

    $id_cliente = $cliente["id_cliente"];
}


/*
 * Guardamos la solicitud.
 */
$sql = "INSERT INTO solicitudes
        (mensaje, fecha, id_producto, id_cliente, id_categoria)
        VALUES (?, ?, ?, ?, ?)";

$fecha = time();

$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "siiii",
    $mensaje,
    $fecha,
    $id_producto,
    $id_cliente,
    $id_categoria
);

if (mysqli_stmt_execute($stmt)) {

    echo "
    <h2>¡Solicitud enviada correctamente! ✅</h2>
    <p>Tu solicitud fue guardada en la base de datos.</p>
    <a href='index.php'>Volver al inicio</a>
    ";

} else {

    echo "Error al guardar la solicitud: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);

?>