@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    <table class="cart-table">
        <thead>
            <tr>
                <th>produk</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->produk->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->produk->price) }}</td>
                    <td>Rp {{ number_format($item->quantity * $item->produk->price) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('checkout') }}" class="btn">Proceed to Checkout</a>
</div>
@endsection
