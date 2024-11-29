<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Produk Berdasarkan Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        footer {
            margin-top: 20px;
            text-align: right;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 20px 0;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Laporan Stok Produk Berdasarkan Kategori</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Total Produk Terjual</th>
                <th>Total Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokProdukKategori as $row)
                <tr>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->total_produk }}</td>
                    <td>{{ number_format($row->total_stock) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        Total Stok Keseluruhan: {{ number_format($stokProdukKategori->sum('total_stock')) }}
    </footer>
</body>
</html>
