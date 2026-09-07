<?php
// Iniciar sesión para controlar el acceso
session_start();

// Definir si hay una sesión activa de administrador
$logged_in = isset($_SESSION['username']);
$admin_name = $logged_in ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Sistema de Gestión</title>
    <!-- Tailwind CSS (Usado en tus archivos HTML) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconos Lucide modernos -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col font-sans">

    <!-- Barra de navegación (Basada exactamente en tu header de index.html) -->
    <header class="bg-slate-950 text-white shadow-lg">
        <nav class="max-w-6xl mx-auto px-6 py-4" aria-label="Navegación principal">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Logo / Inicio -->
                <a href="index.html" class="text-xl font-bold hover:text-indigo-400 transition">
                    conóceme
                </a>
                <!-- Menú de Navegación -->
                <ul class="flex flex-wrap items-center gap-4" role="list">
                    <li>
                        <a href="index.html" class="hover:text-indigo-400 transition px-2 py-1">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="presentacion.html" class="hover:text-indigo-400 transition px-2 py-1">
                            Presentación
                        </a>
                    </li>
                    <li>
                        <a href="proyectos.html" class="hover:text-indigo-400 transition px-2 py-1">
                            Proyectos
                        </a>
                    </li>
                    <li>
                        <a href="contacto.html" class="hover:text-indigo-400 transition px-2 py-1">
                            Contacto
                        </a>
                    </li>
                    <?php if ($logged_in): ?>
                        <!-- Si está logueado, se muestra el estado administrativo en el menú -->
                        <li class="border-l border-slate-700 pl-4 flex items-center gap-3">
                            <span class="text-xs bg-indigo-500/20 text-indigo-300 px-2 py-1 rounded font-semibold">
                                Admin: <?php echo htmlspecialchars($admin_name); ?>
                            </span>
                            <a href="modelo/cerrar_sesion.php" class="bg-red-600 hover:bg-red-700 text-xs text-white px-3 py-1.5 rounded-lg transition font-semibold">
                                Cerrar Sesión
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Contenido principal con distribución adaptable (Grid) -->
    <main class="flex-grow flex items-center justify-center p-6 my-8">
        <div class="max-w-6xl w-full mx-auto">

            <?php if (!$logged_in): ?>
                <!-- ================= VISTA PÚBLICA (LOGIN INTEGRADO) ================= -->
                <div class="grid md:grid-cols-12 gap-8 items-center">
                    
                    <!-- Lado Izquierdo: Presentación del Sistema de Gestión -->
                    <div class="md:col-span-7 space-y-6">
                        <span class="text-indigo-600 font-bold tracking-wider text-sm uppercase">Sistema de Digitalización</span>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 tracking-tight leading-tight">
                            Desarrollo Web & Gestión de Información
                        </h1>
                        <p class="text-slate-600 text-lg leading-relaxed">
                            Bienvenido al sistema digital de gestión de tu proyecto **Bimestral 3**. Esta plataforma permite automatizar procesos manuales, organizar bases de datos y facilitar el control de manera segura y eficiente. [1, 2]
                        </p>
                        
                        <!-- Características del Sistema (Basado en tus Épicas) -->
                        <div class="grid sm:grid-cols-2 gap-4 pt-2">
                            <div class="flex items-start gap-3">
                                <span class="bg-indigo-100 p-2 rounded-lg text-indigo-600 mt-1">
                                    <i data-lucide="database" class="w-5 h-5"></i>
                                </span>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Base de Datos Central</h4>
                                    <p class="text-slate-500 text-xs">Almacenamiento seguro de registros y consultas rápidas.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="bg-indigo-100 p-2 rounded-lg text-indigo-600 mt-1">
                                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                                </span>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Control de Acceso</h4>
                                    <p class="text-slate-500 text-xs">Restricción de vistas y protección de datos administrativos.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lado Derecho: Tarjeta de Inicio de Sesión (Inspirada en index.html) -->
                    <div class="md:col-span-5 flex justify-center">
                        <section class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md border border-slate-200">
                            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                                <i data-lucide="lock" class="w-8 h-8"></i>
                            </div>

                            <h2 class="text-2xl font-bold text-center text-slate-800 mb-2">Iniciar Sesión</h2>
                            <p class="text-sm text-slate-500 text-center mb-6">Accede para gestionar la base de datos de empleados y servicios.</p>

                            <!-- Formulario que conecta con el Controlador -->
                            <form action="controlador/login_controlador.php" method="POST" class="space-y-4">
                                <div>
                                    <label for="login" class="block text-sm font-semibold text-slate-700 mb-1">ID Administrador / Usuario</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                            <i data-lucide="user" class="w-4 h-4"></i>
                                        </span>
                                        <input type="text" name="login" id="login" required placeholder="Ej: 1" 
                                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none text-slate-800">
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Contraseña</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                            <i data-lucide="key" class="w-4 h-4"></i>
                                        </span>
                                        <input type="password" name="password" id="password" required placeholder="••••••••" 
                                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none text-slate-800">
                                    </div>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-indigo-200 hover:shadow-xl transition flex items-center justify-center gap-2 mt-2">
                                    <span>Ingresar al Sistema</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </section>
                    </div>

                </div>

            <?php else: ?>
                <!-- ================= VISTA PRIVADA (DASHBOARD ADMINISTRATIVO) ================= -->
                <div class="space-y-8">
                    
                    <!-- Banner de Bienvenida -->
                    <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="space-y-2">
                            <span class="text-xs bg-indigo-500/30 text-indigo-300 px-3 py-1 rounded-full font-bold uppercase tracking-wider">Sesión Activa</span>
                            <h2 class="text-3xl font-extrabold tracking-tight">¡Bienvenido de nuevo, <?php echo htmlspecialchars($admin_name); ?>!</h2>
                            <p class="text-slate-300 text-sm">Has iniciado sesión correctamente. Como Administrador, puedes consultar o registrar nuevos datos en el sistema.</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="modelo/consulta_empleados.php" class="bg-white text-slate-900 hover:bg-slate-100 font-bold px-5 py-3 rounded-xl transition flex items-center gap-2 text-sm">
                                <i data-lucide="users" class="w-4 h-4"></i>
                                Consultar Empleados
                            </a>
                            <a href="registrar_empleado.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-5 py-3 rounded-xl transition flex items-center gap-2 text-sm">
                                <i data-lucide="user-plus" class="w-4 h-4"></i>
                                Registrar Empleado
                            </a>
                        </div>
                    </div>

                    <!-- Tarjetas de Métricas del Sistema -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                                <i data-lucide="database" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="block text-slate-500 text-xs uppercase font-bold tracking-wider">Base de Datos</span>
                                <span class="text-xl font-black text-slate-800 text-emerald-600">En Línea</span>
                            </div>
                        </div>
                        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                            <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-xl flex items-center justify-center">
                                <i data-lucide="server" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="block text-slate-500 text-xs uppercase font-bold tracking-wider">Servidor</span>
                                <span class="text-xl font-black text-slate-800">Local (Host)</span>
                            </div>
                        </div>
                        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="block text-slate-500 text-xs uppercase font-bold tracking-wider">Seguridad</span>
                                <span class="text-xl font-black text-slate-800">Protegida</span>
                            </div>
                        </div>
                        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center">
                                <i data-lucide="briefcase" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="block text-slate-500 text-xs uppercase font-bold tracking-wider">Esquema BD</span>
                                <span class="text-xl font-black text-slate-800">Codex BD</span>
                            </div>
                        </div>
                    </div>

                    <!-- Secciones de Operación y Avance de Épicas (README) -->
                    <div class="grid md:grid-cols-2 gap-6">
                        
                        <!-- Panel de Acciones Rápidas -->
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                            <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                                <i data-lucide="cpu" class="text-indigo-600 w-5 h-5"></i>
                                Acceso Directo a Operaciones
                            </h3>
                            <p class="text-sm text-slate-500">Usa las herramientas correspondientes para interactuar con la base de datos centralizada.</p>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="modelo/consulta_empleados.php" class="p-4 bg-slate-50 hover:bg-indigo-50 border border-slate-200 hover:border-indigo-200 rounded-xl transition text-center space-y-2 group">
                                    <i data-lucide="eye" class="w-6 h-6 mx-auto text-slate-600 group-hover:text-indigo-600 transition"></i>
                                    <span class="block text-sm font-bold text-slate-700 group-hover:text-indigo-800">Ver Empleados</span>
                                </a>
                                <a href="registrar_empleado.php" class="p-4 bg-slate-50 hover:bg-indigo-50 border border-slate-200 hover:border-indigo-200 rounded-xl transition text-center space-y-2 group">
                                    <i data-lucide="plus-circle" class="w-6 h-6 mx-auto text-slate-600 group-hover:text-indigo-600 transition"></i>
                                    <span class="block text-sm font-bold text-slate-700 group-hover:text-indigo-800">Nuevo Empleado</span>
                                </a>
                            </div>
                        </div>

                        <!-- Estado del Proyecto (Visualización de Épicas) -->
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                            <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                                <i data-lucide="clipboard-list" class="text-indigo-600 w-5 h-5"></i>
                                Estado del Proyecto (Épicas)
                            </h3>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                                        <span>Épica 1: Desarrollo del Sitio Web</span>
                                        <span class="text-emerald-600">Completado 100%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-emerald-500 h-full w-full"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                                        <span>Épica 2: Gestión de Usuarios (Login/Sesiones)</span>
                                        <span class="text-emerald-600">Completado 100%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-emerald-500 h-full w-full"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                                        <span>Épica 3: Base de Datos & Registros</span>
                                        <span class="text-indigo-600">Fase de Pruebas 90%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-indigo-500 h-full w-[90%]"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php endif; ?>

        </div>
    </main>

    <!-- Pie de página (Diseño coordinado con index.html) -->
    <footer class="bg-slate-950 text-slate-400 py-6 mt-auto border-t border-slate-800">
        <div class="max-w-6xl mx-auto px-6 text-center text-sm space-y-2">
            <p>&copy; <?php echo date('Y'); ?> Bimestral 3 - Digitalización de Procesos. Todos los derechos reservados.</p>
            <p>Desarrollado por <span class="text-indigo-400 font-semibold">Óscar Sánchez</span> - Estudiante de Ingeniería de Sistemas</p>
        </div>
    </footer>

    <!-- Script para cargar los iconos -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>