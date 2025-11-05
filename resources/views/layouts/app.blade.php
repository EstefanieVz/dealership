<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Concesionaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Concesionaria</a>
            <div>
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-light me-2">Clientes</a>
                <a href="{{ route('autos.index') }}" class="btn btn-outline-light">Autos</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
