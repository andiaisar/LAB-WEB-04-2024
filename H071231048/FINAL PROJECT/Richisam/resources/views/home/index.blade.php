<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-drumstick-bite mr-2"></i>
                Richisam
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promotions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link login-btn" data-toggle="modal" data-target="#loginModal">
                            <i class="fas fa-user mr-1"></i> Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Horizontal Carousel -->
                    <div id="horizontalCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('images/img02.jpg') }}" class="mx-2" alt="Slide 1">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/img06.jpg') }}" class="d-block w-20" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/img03.jpg') }}" class="d-block w-20" alt="Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/img04.jpg') }}" class="d-block w-20" alt="Slide 4">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/img05.jpg') }}" class="d-block w-20" alt="Slide 5">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#horizontalCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#horizontalCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Categories -->
    <section class="menu-category">
        <div class="container">
            <h2 class="text-center mb-5">Our Menu</h2>
            <div class="row">
                <!-- Original Crispy -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="{{ asset('images/img0.jpg') }}" alt="Original Crispy">
                        <div class="category-content">
                            <h3>Original Crispy</h3>
                            <p>Our classic crispy chicken with perfect seasoning</p>
                            <p class="price">From $8.99</p>
                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>
                
                <!-- Spicy Crispy -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="{{ asset('images/img0.jpg') }}" alt="Spicy Crispy">
                        <div class="category-content">
                            <h3>Spicy Crispy</h3>
                            <p>Hot and crispy with our special spice blend</p>
                            <p class="price">From $9.99</p>
                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>
                <!-- Family Bucket -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="{{ asset('images/img0.jpg') }}" alt="Family Bucket">
                        <div class="category-content">
                            <h3>Family Bucket</h3>
                            <p>Perfect for sharing with family and friends</p>
                            <p class="price">From $24.99</p>
                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>
                <!-- Family Bucket -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="{{ asset('images/img0.jpg') }}" alt="Family Bucket">
                        <div class="category-content">
                            <h3>Family Bucket</h3>
                            <p>Perfect for sharing with family and friends</p>
                            <p class="price">From $24.99</p>
                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>
                <!-- Family Bucket -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="{{ asset('images/img0.jpg') }}" alt="Family Bucket">
                        <div class="category-content">
                            <h3>Family Bucket</h3>
                            <p>Perfect for sharing with family and friends</p>
                            <p class="price">From $24.99</p>
                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="special-offers">
        <div class="container">
            <h2 class="text-center mb-5">Special Offers</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="category-card">
                        <div class="offer-badge">20% OFF</div>
                        <img src="/api/placeholder/400/300" alt="Student Meal">
                        <div class="category-content">
                            <h3>Student Meal</h3>
                            <p>Show your student ID and get 20% off</p>
                            <button class="order-btn">Claim Offer</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-card">
                        <div class="offer-badge">NEW</div>
                        <img src="/api/placeholder/400/300" alt="Family Weekend">
                        <div class="category-content">
                            <h3>Family Weekend</h3>
                            <p>Buy 2 buckets get 1 free drink</p>
                            <button class="order-btn">Claim Offer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade" id="loginModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login to Richisam</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-block order-btn">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" class="text-primary">Forgot password?</a>
                            <p class="mt-2">Don't have an account? <a href="#" class="text-primary">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade" id="registerModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Account</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Create password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="terms">
                                <label class="form-check-label" for="terms">I agree to the Terms & Conditions</label>
                            </div>
                            <button type="submit" class="btn btn-block order-btn">Register</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="#" class="text-primary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add this before closing body tag -->
    <div class="zoom-container" id="imageZoom">
        <img src="" alt="Zoomed Image" id="zoomedImage">
    </div>

    {{-- <script>
        // Image zoom functionality
        document.addEventListener('DOMContentLoaded', function() {
            const zoomContainer = document.getElementById('imageZoom');
            const zoomedImage = document.getElementById('zoomedImage');
            
            // Add click event to all product images
            document.querySelectorAll('.category-card img, #horizontalCarousel img').forEach(img => {
                img.addEventListener('click', function() {
                    zoomedImage.src = this.src;
                    zoomContainer.style.display = 'flex';
                });
            });

            // Close zoomed image when clicking outside
            zoomContainer.addEventListener('click', function() {
                this.style.display = 'none';
            });
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
</html>
