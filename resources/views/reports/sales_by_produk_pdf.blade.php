<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan per Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px; /* Space for footer */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Laporan Penjualan per Produk</h2>
    
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

    <footer>
    <p>&copy; 2024 Toys Hobbies. Semua hak dilindungi.</p>
    <p>Email: info@toyshobbies.com | Telepon: (021) 123-4567</p>
    </footer>
</body>
</html>
