<?php
    // script para crear una conexión con la BD

    require_once 'constantes.php';
<<<<<<< HEAD
    
    echo '<br>Probando conexión con la BD 1...';


    function conexion()
=======

    function conectar()
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf
    {
        // Conexión con la BD
        $conexion = mysqli_connect(HOST, USER, PW, BD); 

        // Establecer conjunto de caracteres para el hosting
        mysqli_set_charset($conexion, 'utf8mb4'); 

        // Verificar la conexión con la BD

        if (!$conexion) 
        {
<<<<<<< HEAD
            die("La conexión con la BD falló: . ".mysqli_connect_error());  
=======
            die("<br>La conexión con la BD falló: ".mysqli_connect_error());  
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf
        }
        /*else
        {
            die("<br>Conexión a la BD exitosa!"); 
<<<<<<< HEAD
        }
        return $conexion;*/
    }
    //Probar conexión
    echo '<br>Probando conexión con la BD...';
    $con = conexion();
?>
=======
        }*/
        return $conexion;
    }

    // Probar conexion a BD
    echo '<br>Probando conexión con la BD...';
    $con = conectar();
?>
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf
