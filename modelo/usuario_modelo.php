<?php
    require (__DIR__."/../config/conexion.php");
    
    // funcion para buscar un usuario por su login
    function validar_usuario($login, $password)
    {
        // Establecer conexión con la BD

        $conexion = conectar();

        echo "<br>función validar_usuario, del modelo, ejecutándose...";

        // Instruccion SQL para hacer la consulta a la BD
        $sql = "SELECT id_admin, nombre_admin, password_usuario, correo, COUNT(*) AS contar FROM admin WHERE id_admin = '$login' AND password_usuario = '$password'";

        // Ejecutar la consulta SQL a la BD
        $consulta = mysqli_query($conexion, $sql) or trigger_error("Error en la consulta MySql: ".mysqli_error($conexion));

        // Convertir consulta en array
        //$resultado = mysqli_fetch_array($consulta);
        $resultado = mysqli_fetch_assoc($consulta);

        // verificar si el usuario existe en la BD
        if($resultado['contar']>0)
        {
            echo '<br>El usuario existe en la BD';
            echo '<br>Usuario: '.$resultado['nombre_admin'];
            echo '<br>Id: '.$resultado['id_admin'];
            echo '<br>password: '.$resultado['password_usuario'];
            echo '<br>correo: '.$resultado['correo'];
        }
        else
        {
            echo '<br>El usuario no existe, o login o password incorrecto';
        }

        return $resultado;
    }

    
    // probar consulta a BD

<<<<<<< HEAD
    $user = '1';
=======
    $user = 'julian_sanchez';
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf
    $pass = 12345;

    echo 'Probando consulta...';
    echo '<br>'.$user;
    echo '<br>'.$pass;
    

    validar_usuario($user, $pass);

?>