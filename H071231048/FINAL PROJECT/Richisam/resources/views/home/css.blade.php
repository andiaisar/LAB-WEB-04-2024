<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Richisam</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<style>
    :root {
        --primary: #9B2C2C; /* Deeper burgundy red */
        --secondary: #C53030; /* Muted red */
        --dark: #742A2A; /* Dark burgundy */
        --light: #FFF5F5; /* Light pink background */
        --accent: #FC8181; /* Soft coral for highlights */
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--light);
    }

    /* Navbar Styles */
    .navbar {
        background-color: white;
        padding: 1rem 0;
        box-shadow: 0 2px 15px rgba(155, 44, 44, 0.1);
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--primary) !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .nav-link {
        font-weight: 600;
        color: var(--dark) !important;
        margin: 0 10px;
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: var(--secondary) !important;
    }

    .nav-link:hover::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--accent);
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
        color: white;
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('/api/placeholder/1920/600') center/cover;
        opacity: 0.1;
    }

    .hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    /* Menu Categories */
    .menu-category {
        padding: 4rem 0;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(155, 44, 44, 0.15);
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(155, 44, 44, 0.25);
    }

    .category-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .category-card:hover img {
        transform: scale(1.05);
    }

    .category-content {
        padding: 1.5rem;
        text-align: center;
    }

    .category-content h3 {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .price {
        color: var(--primary);
        font-size: 1.2rem;
        font-weight: bold;
    }

    .order-btn {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(155, 44, 44, 0.2);
    }

    .order-btn:hover {
        background: linear-gradient(to right, var(--secondary), var(--primary));
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(155, 44, 44, 0.3);
    }

    /* Special Offers */
    .special-offers {
        background-color: #FFF1F1;
        padding: 4rem 0;
    }

    .offer-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, var(--accent), var(--primary));
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(155, 44, 44, 0.2);
    }
    .login-btn {
        background: transparent;
        border: 2px solid var(--primary);
        border-radius: 20px;
        padding: 5px 20px !important;
        color: var(--primary) !important;
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        background: var(--primary);
        color: white !important;
    }

    .register-btn {
        background: transparent;
        border: 2px solid var(--secondary);
        border-radius: 20px;
        padding: 5px 20px !important;
        color: var(--secondary) !important;
        transition: all 0.3s ease;
    }

    .register-btn:hover {
        background: var(--secondary);
        color: white !important;
    }

    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .modal-header .close {
        color: white;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid rgba(155, 44, 44, 0.2);
        padding: 10px 15px;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(155, 44, 44, 0.25);
    }

    .modal-body .text-primary {
        color: var(--primary) !important;
    }

    .modal-body .text-primary:hover {
        color: var(--secondary) !important;
        text-decoration: none;
    }
</style>