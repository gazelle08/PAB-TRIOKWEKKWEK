<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan per Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Laporan Penjualan per Produk</h2>
    
    <!-- Button to download the PDF -->
    <a href="{{ route('sales-by-produk.pdf') }}" class="btn">Cetak Laporan PDF</a>

    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Nama Kategori</th>
                <th>Total Penjualan</th>
                <th>Total Kuantitas</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td>{{ $data->produk_nama }}</td>
                    <td>{{ $data->kategori_nama }}</td>
                    <td>{{ $data->total_sales }}</td>
                    <td>{{ $data->total_quantity }}</td>
                    <td>Rp {{ number_format($data->total_revenue, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

<footer>
        <p>&copy; 2024 Toys Hobbies. Semua hak dilindungi.</p>
        <p>Email: info@toyshobbies.com | Telepon: (021) 123-4567</p>
    </footer>
</html>
