<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Richisam</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        padding: 3rem 0;
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

    #horizontalCarousel .carousel-inner {
        position: relative;
    }

    #horizontalCarousel .carousel-item {
        transition: transform 0.6s ease-in-out;
    }

    #horizontalCarousel .carousel-inner .carousel-item {
        flex: 0 0 33.33%; 
        max-width: 33.33%;
    }

    /* Carousel Styling */
    #horizontalCarousel .carousel-item img {
        width: 100%;
        height: 600px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    #horizontalCarousel .carousel-item img:hover {
        transform: scale(1.03);
    }

    .carousel-control-prev, .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(155, 44, 44, 0.8);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(155, 44, 44, 0.8);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.8;
    }
    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
    }

    .carousel-indicators {
        bottom: 20px;
    }

    .carousel-indicators li {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .carousel-indicators .active {
        background-color: white;
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
        position: relative;
        overflow: hidden;
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(155, 44, 44, 0.25);
    }

    .category-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .category-card:hover img {
        transform: scale(1.1);
        filter: brightness(1.1);
    }

    .category-content {
        padding: 1.5rem;
        text-align: center;
        background: rgba(255, 255, 255, 0.95);
        position: relative;
        z-index: 1;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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

    /* Image Overlay Effect */
    .category-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(0deg, rgba(155, 44, 44, 0.2) 0%, rgba(0,0,0,0) 50%);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .category-card:hover::after {
        opacity: 1;
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

    /* Image Zoom Styles */
    .zoom-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        cursor: pointer;
    }

    .zoom-container img {
        max-width: 90%;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }

    /* Updated Grid Layout */
    .menu-category .row {
        margin: -15px;
    }

    .menu-category .col-md-4 {
        padding: 15px;
    }

    /* Carousel Improvements */
    .carousel-inner {
        padding: 20px 0;
    }

    .carousel-item img {
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .category-card img {
            height: 200px;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }
    }
</style>