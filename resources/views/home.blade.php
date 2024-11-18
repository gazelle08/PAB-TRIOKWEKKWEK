<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Toys Hobbies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Toys Hobbies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/produk') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/checkout') }}">Checkout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="{{ url('/admin/login') }}">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-light py-5">
        <div class="container text-center">
            <h1>Welcome to Toys Hobbies</h1>
            <a href="{{ url('/produk') }}" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Fast Delivery</h5>
                        <p class="card-text">Get your products delivered in no time. 
                            We understand that when you order something, you want it as quickly as possible. 
                            That's why we partner with reliable shipping services to ensure that your items arrive at your doorstep promptly.
                             Whether it's a last-minute gift or a special treat for yourself, 
                            our efficient logistics system is designed to meet your needs without delay.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Best Quality</h5>
                        <p class="card-text">We ensure top-notch quality in all our offerings. 
                            Our products are carefully selected and tested to meet the highest standards. 
                            We believe that quality is paramount, which is why we work with trusted manufacturers and suppliers who share our commitment to excellence. 
                            From toys to hobbies, each item is crafted with care, ensuring durability and safety for our customers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Customer Support</h5>
                        <p class="card-text">24/7 support to assist you at any time. Our dedicated customer service team is always ready to help you with any inquiries or issues you may have.
                             Whether you need assistance with your order, have questions about a product, or require support after your purchase, we are just a call or click away. 
                            Your satisfaction is our priority, and we strive to provide a seamless shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Toys Hobbies. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
