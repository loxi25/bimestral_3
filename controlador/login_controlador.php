<?php
<<<<<<< HEAD
    require_once '../modelo/usuario_modelo.php';

    //Mostrar formulario
    function mostrar_login()
    {
        require_once '../vista/login_vista.php';
    }

    // Procesar credenciales
    function autenticar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $login =$_POST['login'];
            $pass =$_POST['password'];
=======
    require_once'../modelo/usuario_modelo.php';

    //mostrar funcion
    function mostrar_login()
    {
        require_once'../vista/login_vista.php';
    
    }

    // procesar credenciales
    function autenticar()
    {
        if($_SERVER['REQUEST_METHOB'] == 'POST')
        {
            $login = $_POST['login'];
            $pass = $_POST['password_admin'];
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf

            $usuario = validar_usuario($login, $pass);

            if($usuario)
            {
<<<<<<< HEAD
                header("Location: index.php");
            }
            else
            {
                echo 'Credenciales incorrectas';
            }
        }
    }
=======
                header("location: index.php");
            }
            else
            {
                echo 'credenciales incorrectas';
            }
        }
    }
?>
>>>>>>> 9085e2ad91d87eac00d33f0951f2362025c5b0cf
