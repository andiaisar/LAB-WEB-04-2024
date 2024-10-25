<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .hero-section {
            background-image: url(assets/img/uh.png);
            background-size: cover;
            color: white;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background-color: rgba(198, 46, 46); 
        }

        .nav-link{
            margin-left: 470px;
        }

        .footer {
            background-color: rgba(198, 46, 46); 
            color: white;
            padding: 5px 0; 
        }

        .footer a {
            color: #ddd; 
            text-decoration: none;
            display: block;
            margin: 5px 0; 
        }

        .footer a:hover {
            color: white; 
        }

        body {
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SI Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-light me-2">Login</a>
                    <a href="register.php" class="btn btn-outline-light">Register</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="container">
            <h2 class="display-4 mb-4">Selamat Datang di Sistem Informasi 23</h2>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="mt-4">
                <a href="https://www.instagram.com/sisfouh23/profilecard/?igsh=YWxha3YwbWl3OXZt">SISFOUH23</a>
                <small>&copy; 2024 Sistem Informasi Mahasiswa. All rights reserved.</small>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>