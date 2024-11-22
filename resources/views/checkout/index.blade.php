<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout - Toys Hobbies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-image: url('{{ asset('images/background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" alt="Toys Hobbies Logo" width="100" height="100" class="d-inline-block align-text-top">
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
                        <a class="nav-link" href="{{ url('/cart') }}">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/checkout') }}">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian Checkout -->
    <div class="container py-5">
    <h1 class="text-center mb-4">Checkout</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <h3>Ringkasan Pesanan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Form Checkout</h3>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

<h3></h3>
@if(session('latest_transaction'))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor Transaksi</th>
                <th>Telepon</th>
                <th>Kota</th>
                <th>Kurir</th>
                <th>Total</th>
                <th>Ongkir</th>
                <th>Bukti Transaksi</th>
                <th>Alamat</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ session('latest_transaction')->transaction_number }}</td>
                <td>{{ session('latest_transaction')->telepon }}</td>
                <td>{{ session('latest_transaction')->kota }}</td>
                <td>{{ session('latest_transaction')->kurir }}</td>
                <td>Rp {{ number_format(session('latest_transaction')->total, 2, ',', '.') }}</td>
                <td>Rp {{ number_format(session('latest_transaction')->ongkir, 2, ',', '.') }}</td>
                <td>
                    @if(session('latest_transaction')->bukti_transaksi)
                        <img src="{{ asset(session('latest_transaction')->bukti_transaksi) }}" alt="Bukti Transaksi" width="100">
                    @else
                        Tidak ada bukti transaksi
                    @endif
                </td>
                <td>{{ session('latest_transaction')->alamat }}</td>
                <td>{{ \Carbon\Carbon::parse(session('latest_transaction')->date)->format('d-m-Y') }}</td>
            </tr>
        </tbody>
    </table>
@else
    <p class="text-center"></p>
@endif
    @else
        <p class="text-center">Keranjang Anda kosong. Silakan tambahkan produk sebelum checkout.</p>
    @endif
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
