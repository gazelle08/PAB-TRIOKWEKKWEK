<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Keranjang - Toys Hobbies</title>
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
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/cart') }}">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/checkout') }}">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian Keranjang -->
    <div class="container py-5">
        <h1 class="text-center mb-4">Keranjang Belanja Anda</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $item['image']) }}" width="100" alt="{{ $item['name'] }}">
                                {{ $item['name'] }}
                            </td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control" style="width: 80px;">
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h4>Total: Rp {{ number_format(array_reduce($cart, fn($carry, $item) => $carry + $item['price'] * $item['quantity'], 0), 0, ',', '.') }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proses Pembayaran</a>
            </div>
        @else
            <p class="text-center">Keranjang Anda kosong.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Toys Hobbies. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
