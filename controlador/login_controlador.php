<?php
// Cargar el modelo del usuario
require_once __DIR__ . '/../modelo/usuario_modelo.php';

// Mostrar formulario de inicio de sesión
function mostrar_login() {
    require_once __DIR__ . '/../vista/login_vista.php';
}

// Procesar credenciales enviadas por POST
function autenticar() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
        $pass  = $_POST['password']; // Se unifica para usar el campo 'password' enviado por el formulario

        // Validar el usuario con la base de datos usando el modelo
        $usuario = validar_usuario($login, $pass);

        if ($usuario && $usuario['contar'] > 0) {
            // Redirigir al inicio del sistema si el inicio de sesión es exitoso
            header("Location: index.php");
            exit();
        } else {
            echo 'Credenciales incorrectas';
        }
    }
}
?>