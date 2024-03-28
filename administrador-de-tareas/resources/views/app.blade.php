<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>

    <!-- Enlace al archivo CSS compilado -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


<body>

    <!-- Encabezado -->
    <header>
    <nav style="background-color: #2563EB; color: white; padding: 20px;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <img src="{{ asset('img/logo_task-admin.png') }}" alt="Logotipo de la aplicación">
            <a href="{{ route('logout') }}" style="color: white; text-decoration: none; font-weight: bold;">Logout</a>
        </div>
    </nav>
    </header>

    <!-- Área de contenido -->
    <main>
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer>
        <!-- Agrega contenido del pie de página -->
    </footer>

    <!-- Scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
</div>
