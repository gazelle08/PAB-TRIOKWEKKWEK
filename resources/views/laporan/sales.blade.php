<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Sales</title>
        <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        </style>
    </head>
<body>
    <h2>Laporan Sales</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>ID Produk</th><th>Quantity</th><th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $sales)
            <tr>
            <td>{{ $sales->id }}</td>
            <td>{{ $sales->produk_id }}</td>
            <td>{{ $sales->quantity }}</td>
            <td>{{ $sales->sale_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</h