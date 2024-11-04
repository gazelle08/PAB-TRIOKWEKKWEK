<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Produk</title>
        <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        </style>
    </head>
<body>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th>kategori</th><th>nama</th><th>deskripsi</th><th>stock</th><th>harga</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $produk)
            <tr>
            <td>{{ $produk->kategori }}</td>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->deskripsi }}</td>
            <td>{{ $produk->stock }}</td>
            <td>{{ $produk->harga }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</h