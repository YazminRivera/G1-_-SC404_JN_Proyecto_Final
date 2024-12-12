<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Gourmet</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545 !important;
        }
        .hero {
            background: url('assets/img/Banner.jpg') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Restaurante Gourmet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menú</a>
                    </li>
                </ul>
                <button class="btn btn-outline-danger" onclick="location.href='pages/login/login.php'">Login</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="text-center">
            <h1>Bienvenido a Restaurante Gourmet</h1>
            <p>Descubre sabores únicos y experiencias inolvidables.</p>
            <a href="#menu" class="btn btn-danger btn-lg">Ver Menú</a>
        </div>
    </div>

    <!-- Sección Nosotros -->
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Imagen -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="assets/img/personal.jpg" alt="Equipo del restaurante" class="img-fluid rounded shadow-sm">
            </div>
            <!-- Texto -->
            <div class="col-md-6">
                <h2 class="fw-bold text-danger">Sobre Nosotros</h2>
                <p class="text-muted">
                    En <strong>Restaurante Gourmet</strong>, llevamos años dedicados a brindar experiencias culinarias únicas, combinando ingredientes frescos y de alta calidad con técnicas innovadoras y tradicionales. Nuestra misión es ofrecer un ambiente cálido y acogedor donde nuestros clientes puedan disfrutar de los mejores platos.
                </p>
                <p class="text-muted">
                    Nos enorgullece trabajar con un equipo apasionado de chefs y personal comprometido que comparte nuestra visión de excelencia. Ya sea para una cena especial, un almuerzo rápido o una reunión con amigos, siempre buscamos superar tus expectativas.
                </p>
                <a href="#menu" class="btn btn-danger">Conoce nuestro menú</a>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-5 shadow-sm">
        <p class="mb-0">© 2024 Restaurante Gourmet. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
