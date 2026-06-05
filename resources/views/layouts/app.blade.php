<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miniminds</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #C4B5E8 0%, #D8D0F0 50%, #E8D5F0 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #4A4063;
        }
        .navbar-miniminds {
            background: rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.5);
        }
        .navbar-brand {
            font-weight: bold;
            color: #4A4063 !important;
            font-size: 1.4rem;
        }
        .nav-link {
            color: #4A4063 !important;
            font-weight: 500;
        }
        .btn-acento {
            background-color: #F5A623;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
        }
        .btn-acento:hover {
            background-color: #e09520;
            color: white;
        }
        .card-miniminds {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-miniminds">
        <div class="container">
            <a class="navbar-brand" href="/">Miniminds!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Información</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Neur@desarrollo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Citas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ayuda</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-cog"></i>
                    <i class="fas fa-user-circle fa-lg"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>