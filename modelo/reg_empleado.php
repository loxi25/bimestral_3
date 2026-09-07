<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Importar la conexión global limpia
require_once __DIR__ . '/../config/conexion.php';
session_start();

if(isset($_SESSION['username'])) {
    $conexion = conectar(); // Establecer conexión con la BD

    // Sanitizar los datos enviados por el formulario
    $id_emp           = mysqli_real_escape_string($conexion, $_POST['id_empleado']);
    $nombre_emp       = mysqli_real_escape_string($conexion, $_POST['nombre_empleado']);
    $apellidos_emp    = mysqli_real_escape_string($conexion, $_POST['apellidos_empleado']);
    $departamento_emp = mysqli_real_escape_string($conexion, $_POST['departamento']);

    // Insertar en la tabla 'empleado' (en minúsculas para coincidir con el SQL de creación)
    $query = "INSERT INTO empleado (id_empleado, nombre_empleado, apellidos_empleado, id_departamento) 
              VALUES ('$id_emp', '$nombre_emp', '$apellidos_emp', '$departamento_emp')";
              
    $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

    if($insercion) {
        echo '<script type="text/javascript">
            alert("¡Empleado registrado con éxito!");
            window.location.href = "../registrar_empleado.php";
        </script>';
    } else {
        header('location: ../index.php');
        exit();
    }
} else {
    header('location: ../index.php');
    exit();
}
?>
