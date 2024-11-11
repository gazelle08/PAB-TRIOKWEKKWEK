@extends('layouts.app')

@section('content')
<div class="container">
    <div class="produk-detail">
        <img src="{{ $produk->image_url }}" alt="{{ $produk->name }}">
        <div class="produk-info">
            <h2>{{ $produk->name }}</h2>
            <p>{{ $produk->description }}</p>
            <p>Price: Rp {{ number_format($produk->price) }}</p>
            <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                @csrf
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
