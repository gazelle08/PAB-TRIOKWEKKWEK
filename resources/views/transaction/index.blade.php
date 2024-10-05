<!-- resources/views/transaction/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body>
    <h1>Daftar Transaksi</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
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
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->userid }}</td>
                    <td>{{ $transaction->transaction_number }}</td>
                    <td>{{ $transaction->telepon }}</td>
                    <td>{{ $transaction->kota }}</td>
                    <td>{{ $transaction->kurir }}</td>
                    <td>{{ $transaction->total }}</td>
                    <td>{{ $transaction->ongkir }}</td>
                    <td>{{ $transaction->bukti_transaksi }}</td>
                    <td>{{ $transaction->alamat }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
