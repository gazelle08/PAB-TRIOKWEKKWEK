<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h2>Laporan Kategori Terlaris</h2>
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
    <footer>
        <p>Total Data: {{ $topCategories->count() }} kategori</p>
        <p>© 2024 Toys Hobbies. All rights reserved.</p>
        <p>Email: info@toyshobbies.com | Phone: (021) 123-4567</p>
    </footer>
</body>
</html>
