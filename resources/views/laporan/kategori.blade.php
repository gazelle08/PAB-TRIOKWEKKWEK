<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Kategori</title>
        <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        </style>
    </head>
<body>
    <h2>Data Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $kategori)
            <tr>
            <td>{{ $kategori->nama }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</h