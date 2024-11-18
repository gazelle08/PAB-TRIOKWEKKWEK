<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kategori Terlaris</title>
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
    <h2>Laporan Kategori Terlaris</h2>
    <a href="{{ route('top-categories.pdf') }}" class="btn">Cetak Laporan PDF</a>
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Total Terjual</th>
                <th>Jumlah Produk Terjual</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topCategories as $category)
                <tr>
                    <td>{{ $category->kategori_nama }}</td>
                    <td>{{ $category->total_quantity_sold }}</td>
                    <td>{{ $category->total_products_sold }}</td>
                    <td>Rp {{ number_format($category->total_revenue) }}</td>
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