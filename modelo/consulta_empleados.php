<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Importar la conexión limpia desde config
require_once __DIR__ . '/../config/conexion.php';
session_start();

if(isset($_SESSION['username'])) {
    $nombre_usuario = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Empleados</title>
    <!-- Tailwind CSS para mantener el diseño visual limpio -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6 border border-slate-200">
        <h1 class="text-2xl font-bold text-slate-800 mb-4">Consulta de Empleados</h1>
        
        <div class="mb-6 text-sm text-slate-600">
            <strong>Administrador activo:</strong> <?php echo htmlspecialchars($nombre_usuario); ?>
        </div>

        <?php 
        if(isset($_SESSION['username'])) {
            $conexion = conectar(); // Llamada a la conexión limpia
            
            // Consulta corregida para apuntar a la tabla correcta
            $query = "SELECT * FROM empleado";
            $resultado = mysqli_query($conexion, $query) or trigger_error("Error en la consulta: " . mysqli_error($conexion));
            
            echo "<div class='overflow-x-auto rounded-xl border border-slate-200'>";
            echo "<table class='min-w-full divide-y divide-slate-200 text-sm text-left'>";
            echo "<thead class='bg-slate-50 text-slate-700 uppercase text-xs font-bold'>";
            echo "<tr>";
            echo "<th class='px-6 py-4'>Id Empleado</th>";
            echo "<th class='px-6 py-4'>Nombre</th>";
            echo "<th class='px-6 py-4'>Apellidos</th>";
            echo "<th class='px-6 py-4'>Departamento ID</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='divide-y divide-slate-200 bg-white text-slate-700'>";
            
            // Recorrer filas trayendo las columnas reales de la tabla de la BD
            while($fila = mysqli_fetch_array($resultado)) {
                echo "<tr class='hover:bg-slate-50 transition'>";
                echo "<td class='px-6 py-4 font-semibold'>" . htmlspecialchars($fila['id_empleado']) . "</td>";
                echo "<td class='px-6 py-4'>" . htmlspecialchars($fila['nombre_empleado']) . "</td>";
                echo "<td class='px-6 py-4'>" . htmlspecialchars($fila['apellidos_empleado']) . "</td>";
                echo "<td class='px-6 py-4 text-indigo-600 font-medium'>" . htmlspecialchars($fila['id_departamento']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            header('location: ../index.php');
            exit();
        }
        ?>
        
        <div class="mt-6">
            <a href="../index.php" class="inline-block bg-slate-800 hover:bg-slate-900 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                Volver al Panel
            </a>
        </div>
    </div>
</body>
</html>