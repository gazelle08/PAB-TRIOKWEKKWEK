<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Medan Toys Hobbies</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <h1>Toko Medan Toys Hobbies</h1>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>
                <li><a href="{{ route('checkout') }}">Checkout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Toko Medan Toys Hobbies. All rights reserved.</p>
    </footer>
</body>
</html>
