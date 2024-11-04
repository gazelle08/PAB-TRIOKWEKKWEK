<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Transaksi</title>
        <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        </style>
    </head>
<body>
    <h2>Laporan transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>kode transaksi</th><th>telepon</th><th>nomor resi</th><th>kurir</th><th>kota</th><th>ongkir</th><th>total</th><th>alamat</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $transaksi)
            <tr>
            <td>{{ $transaksi->transaction_number }}</td>
            <td>{{ $transaksi->telepon }}</td>
            <td>{{ $transaksi->no_resi }}</td>
            <td>{{ $transaksi->kurir }}</td>
            <td>{{ $transaksi->kota}}</td>
            <td>{{ $transaksi->ongkir }}</td>
            <td>{{ $transaksi->total }}</td>
            <td>{{ $transaksi->alamat }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</h
