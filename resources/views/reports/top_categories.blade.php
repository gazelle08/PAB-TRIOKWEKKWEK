@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Penjualan per Produk</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Total Penjualan</th>
                <th>Jumlah Terjual</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->category_name }}</td>
                    <td>{{ $data->total_sales }}</td>
                    <td>{{ $data->total_quantity }}</td>
                    <td>Rp {{ number_format($data->total_revenue) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
