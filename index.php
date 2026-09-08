<?php

// ======================================================
// CONEXIÓN CON LA BASE DE DATOS
// ======================================================

require_once __DIR__ . '/config/conexion.php';

$conexion = conectar();


// ======================================================
// VARIABLES
// ======================================================

$totalProductos = 0;
$totalCategorias = 0;
$totalClientes = 0;
$totalSolicitudes = 0;



// ======================================================
// CONSULTAR PRODUCTOS
// ======================================================

$sqlProductos = "SELECT COUNT(*) AS total FROM producto";

$resultadoProductos = mysqli_query($conexion, $sqlProductos);

if ($resultadoProductos) {
    $fila = mysqli_fetch_assoc($resultadoProductos);
    $totalProductos = $fila['total'];
}


// ======================================================
// CONSULTAR CATEGORÍAS
// ======================================================

$sqlCategorias = "SELECT COUNT(*) AS total FROM categoria";

$resultadoCategorias = mysqli_query($conexion, $sqlCategorias);

if ($resultadoCategorias) {
    $fila = mysqli_fetch_assoc($resultadoCategorias);
    $totalCategorias = $fila['total'];
}


// ======================================================
// CONSULTAR CLIENTES
// ======================================================

$sqlClientes = "SELECT COUNT(*) AS total FROM cliente";

$resultadoClientes = mysqli_query($conexion, $sqlClientes);

if ($resultadoClientes) {
    $fila = mysqli_fetch_assoc($resultadoClientes);
    $totalClientes = $fila['total'];
}


// ======================================================
// CONSULTAR SOLICITUDES
// ======================================================

$sqlSolicitudes = "SELECT COUNT(*) AS total FROM solicitudes";

$resultadoSolicitudes = mysqli_query($conexion, $sqlSolicitudes);

if ($resultadoSolicitudes) {
    $fila = mysqli_fetch_assoc($resultadoSolicitudes);
    $totalSolicitudes = $fila['total'];
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CODEX - Inicio</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-slate-100 min-h-screen">


<!-- ======================================================
     HEADER
======================================================= -->

<header class="bg-slate-950 text-white shadow-lg">

    <nav class="max-w-6xl mx-auto px-6 py-4">

        <div class="flex flex-col md:flex-row
                    md:items-center
                    md:justify-between
                    gap-4">


            <!-- LOGO -->

            <a href="index.php"
               class="text-xl font-bold
                      hover:text-indigo-400
                      transition">

                CODEX

            </a>


            <!-- MENÚ -->

            <ul class="flex flex-wrap gap-4">

                <li>

                    <a href="index.php"
                       class="text-indigo-400
                              font-semibold
                              px-2 py-1">

                        Inicio

                    </a>

                </li>


                <li>

                    <a href="presentacion.html"
                       class="hover:text-indigo-400
                              transition
                              px-2 py-1">

                        Presentación

                    </a>

                </li>


                <li>

                    <a href="proyectos.html"
                       class="hover:text-indigo-400
                              transition
                              px-2 py-1">

                        Proyectos

                    </a>

                </li>


                <li>

                    <a href="contacto.html"
                       class="hover:text-indigo-400
                              transition
                              px-2 py-1">

                        Contacto

                    </a>

                </li>

            </ul>

        </div>

    </nav>

</header>



<!-- ======================================================
     CONTENIDO PRINCIPAL
======================================================= -->

<main class="flex justify-center p-6">

    <div class="max-w-5xl w-full">


        <!-- ==================================================
             TARJETA PRINCIPAL
        =================================================== -->

        <section class="bg-white
                        rounded-2xl
                        shadow-xl
                        p-8
                        text-center
                        mb-8">


            <!-- ICONO -->

            <div class="text-6xl mb-4">

                💻

            </div>


            <!-- TÍTULO -->

            <h1 class="text-4xl
                       md:text-5xl
                       font-bold
                       text-slate-800
                       mb-3">

                CODEX

            </h1>


            <!-- SLOGAN -->

            <p class="text-xl
                      font-semibold
                      text-indigo-600
                      mb-4">

                Soluciones digitales a tu alcance

            </p>


            <!-- DESCRIPCIÓN -->

            <p class="text-slate-600
                      leading-relaxed
                      max-w-2xl
                      mx-auto">

                Descubre nuestros proyectos y soluciones
                tecnológicas. Encuentra diferentes opciones
                de desarrollo de software adaptadas a tus
                necesidades.

            </p>


            <!-- BOTONES -->

            <div class="flex flex-col
                        sm:flex-row
                        justify-center
                        gap-4
                        mt-6">


                <a href="proyectos.html"
                   class="bg-indigo-600
                          text-white
                          px-6
                          py-3
                          rounded-lg
                          font-semibold
                          hover:bg-indigo-700
                          transition">

                    Ver proyectos

                </a>


                <a href="contacto.html"
                   class="border
                          border-slate-300
                          text-slate-700
                          px-6
                          py-3
                          rounded-lg
                          font-semibold
                          hover:bg-slate-100
                          transition">

                    Contactar

                </a>

            </div>

        </section>



        <!-- ==================================================
             INFORMACIÓN DE LA BASE DE DATOS
        =================================================== -->

        <section class="mb-8">


            <h2 class="text-3xl
                       font-bold
                       text-slate-800
                       text-center
                       mb-3">

                Información de CODEX

            </h2>


            <p class="text-center
                      text-slate-600
                      mb-8">

                Información obtenida directamente desde
                nuestra base de datos.

            </p>



            <div class="grid
                        grid-cols-1
                        md:grid-cols-2
                        lg:grid-cols-4
                        gap-6">


                <!-- PRODUCTOS -->

                <article class="bg-white
                                rounded-2xl
                                shadow-lg
                                p-6
                                text-center
                                border
                                border-slate-200
                                hover:shadow-xl
                                transition">

                    <div class="text-4xl mb-3">

                        💻

                    </div>


                    <h3 class="text-lg
                               font-bold
                               text-slate-700
                               mb-2">

                        Productos

                    </h3>


                    <p class="text-4xl
                              font-bold
                              text-indigo-600">

                        <?php echo $totalProductos; ?>

                    </p>


                    <p class="text-sm
                              text-slate-500
                              mt-2">

                        Registrados

                    </p>

                </article>



                <!-- CATEGORÍAS -->

                <article class="bg-white
                                rounded-2xl
                                shadow-lg
                                p-6
                                text-center
                                border
                                border-slate-200
                                hover:shadow-xl
                                transition">

                    <div class="text-4xl mb-3">

                        🗂️

                    </div>


                    <h3 class="text-lg
                               font-bold
                               text-slate-700
                               mb-2">

                        Categorías

                    </h3>


                    <p class="text-4xl
                              font-bold
                              text-sky-600">

                        <?php echo $totalCategorias; ?>

                    </p>


                    <p class="text-sm
                              text-slate-500
                              mt-2">

                        Disponibles

                    </p>

                </article>



                <!-- CLIENTES -->

                <article class="bg-white
                                rounded-2xl
                                shadow-lg
                                p-6
                                text-center
                                border
                                border-slate-200
                                hover:shadow-xl
                                transition">

                    <div class="text-4xl mb-3">

                        👥

                    </div>


                    <h3 class="text-lg
                               font-bold
                               text-slate-700
                               mb-2">

                        Clientes

                    </h3>


                    <p class="text-4xl
                              font-bold
                              text-amber-600">

                        <?php echo $totalClientes; ?>

                    </p>


                    <p class="text-sm
                              text-slate-500
                              mt-2">

                        Registrados

                    </p>

                </article>



                <!-- SOLICITUDES -->

                <article class="bg-white
                                rounded-2xl
                                shadow-lg
                                p-6
                                text-center
                                border
                                border-slate-200
                                hover:shadow-xl
                                transition">

                    <div class="text-4xl mb-3">

                        📩

                    </div>


                    <h3 class="text-lg
                               font-bold
                               text-slate-700
                               mb-2">

                        Solicitudes

                    </h3>


                    <p class="text-4xl
                              font-bold
                              text-emerald-600">

                        <?php echo $totalSolicitudes; ?>

                    </p>


                    <p class="text-sm
                              text-slate-500
                              mt-2">

                        Registradas

                    </p>

                </article>

            </div>

        </section>



        <!-- ==================================================
             SECCIÓN EXPLORA
        =================================================== -->

        <section class="mb-8">


            <h2 class="text-3xl
                       font-bold
                       text-slate-800
                       text-center
                       mb-3">

                Explora CODEX

            </h2>


            <p class="text-center
                      text-slate-600
                      mb-8">

                Conoce las diferentes secciones de nuestro sitio.

            </p>



            <div class="grid
                        grid-cols-1
                        md:grid-cols-3
                        gap-6">


                <!-- PRESENTACIÓN -->

                <a href="presentacion.html"
                   class="bg-white
                          rounded-2xl
                          shadow-lg
                          p-6
                          text-center
                          border
                          border-slate-200
                          hover:shadow-xl
                          hover:-translate-y-1
                          transition">


                    <div class="text-4xl mb-4">

                        👤

                    </div>


                    <h3 class="text-xl
                               font-bold
                               text-indigo-600
                               mb-2">

                        Presentación

                    </h3>


                    <p class="text-slate-600">

                        Conoce más sobre CODEX
                        y sus objetivos.

                    </p>

                </a>



                <!-- PROYECTOS -->

                <a href="proyectos.html"
                   class="bg-white
                          rounded-2xl
                          shadow-lg
                          p-6
                          text-center
                          border
                          border-slate-200
                          hover:shadow-xl
                          hover:-translate-y-1
                          transition">


                    <div class="text-4xl mb-4">

                        🖥️

                    </div>


                    <h3 class="text-xl
                               font-bold
                               text-sky-600
                               mb-2">

                        Proyectos

                    </h3>


                    <p class="text-slate-600">

                        Explora los diferentes proyectos
                        y soluciones disponibles.

                    </p>

                </a>



                <!-- CONTACTO -->

                <a href="contacto.html"
                   class="bg-white
                          rounded-2xl
                          shadow-lg
                          p-6
                          text-center
                          border
                          border-slate-200
                          hover:shadow-xl
                          hover:-translate-y-1
                          transition">


                    <div class="text-4xl mb-4">

                        📬

                    </div>


                    <h3 class="text-xl
                               font-bold
                               text-amber-600
                               mb-2">

                        Contacto

                    </h3>


                    <p class="text-slate-600">

                        Ponte en contacto para obtener
                        más información.

                    </p>

                </a>

            </div>

        </section>



        <!-- ==================================================
             SOBRE CODEX
        =================================================== -->

        <section class="bg-white
                        rounded-2xl
                        shadow-xl
                        p-8
                        mb-8">


            <h2 class="text-2xl
                       font-bold
                       text-slate-800
                       text-center
                       mb-4">

                Sobre CODEX

            </h2>


            <p class="text-slate-600
                      leading-relaxed
                      text-center
                      max-w-3xl
                      mx-auto">

                CODEX es una plataforma orientada al desarrollo
                de soluciones tecnológicas. En ella se pueden
                administrar productos, categorías, clientes
                y solicitudes mediante una base de datos
                MySQL.

            </p>

        </section>



        <!-- ==================================================
             ESTADO DE CONEXIÓN
        =================================================== -->

        <div class="bg-emerald-50
                    border
                    border-emerald-200
                    rounded-xl
                    p-4
                    text-center
                    mb-8">

            <p class="text-emerald-700
                      font-semibold">

                ✓ Conectado correctamente a la base de datos
                <strong>codex</strong>

            </p>

        </div>


    </div>

</main>



<!-- ======================================================
     FOOTER
======================================================= -->

<footer class="bg-slate-950
               text-slate-400
               text-center
               py-6
               mt-8">


    <p>

        © <?php echo date("Y"); ?> CODEX

    </p>


    <p class="text-sm mt-1">

        Soluciones digitales a tu alcance

    </p>


</footer>


</body>

</html>