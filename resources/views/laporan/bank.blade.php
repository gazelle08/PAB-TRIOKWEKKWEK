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
    <h2>Data bank</h2>
    <table>
        <thead>
            <tr>
                <th>Nomor Akun</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $bank)
            <tr>
            <td>{{ $bank->account_number }}</td>
            <td>{{ $bank->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</h