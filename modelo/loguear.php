

<?php
    require 'conexion.php';

    // iniciar sesión para guardar los datos del usuario
    session_start();

    $usuario = $_POST['email'];
    $password = $_POST['password'];

    $query_1 = "SELECT email, COUNT(*) AS contar FROM Usuario WHERE email = '$usuario' AND password = '$password'";

    $consulta = mysqli_query($conexion, $query_1) or trigger_error("Error en la consulta MySQL:  " + mysqli_error($conexion));

    $resultado = mysqli_fetch_array($consulta);

    if($resultado['contar']>0)
    {
        $_SESSION['username'] = $usuario;

        // redirigir el usuario a su pagina
        header("location: ../pagina_usuario.php");

        /*echo "El usuario existe en la BD<br>";
        echo $resultado['email'];*/
    }
    else
    {
        echo "El usuario no existe, o usuario o contraseña incorrecta";
    }
?>
