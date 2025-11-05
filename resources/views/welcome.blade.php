<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Concesionaria - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Concesionaria</a>
            <div>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-light me-2">Clientes</a>
                <a href="{{ route('autos.index') }}" class="btn btn-outline-light">Autos</a>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1 class="display-5 fw-bold mb-4">Bienvenido al Sistema de Concesionaria 🚗</h1>
        <p class="lead text-secondary mb-5">
            Administra tus clientes y vehículos de manera sencilla y eficiente.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-lg px-4">Ver Clientes</a>
            <a href="{{ route('autos.index') }}" class="btn btn-success btn-lg px-4">Ver Autos</a>
        </div>
    </div>

    <footer class="text-center text-muted mt-5 mb-3">
        <small>© {{ date('Y') }} Concesionaria — Todos los derechos reservados</small>
    </footer>

</body>
</html>
