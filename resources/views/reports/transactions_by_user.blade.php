@extends('layouts.app')

@section('content')
    <h1>Laporan Transaksi per Pengguna</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Total Transaksi</th>
                <th>Total Produk</th>
                <th>Total Belanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userTransactions as $transaction)
                <tr>
                    <td>{{ $transaction->usernama }}</td>
                    <td>{{ $transaction->total_transactions }}</td>
                    <td>{{ $transaction->total_products }}</td>
                    <td>{{ number_format($transaction->total_spent, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p>Generated on {{ date('Y-m-d') }}</p>
    </footer>
@endsection
