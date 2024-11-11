@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to Medan Toys Hobbies</h2>
    <div class="produk-grid">
        @foreach($produks as $produk)
            <div class="produk-card">
                <img src="{{ $produk->image_url }}" alt="{{ $produk->name }}">
                <h3>{{ $produk->name }}</h3>
                <p>Rp {{ number_format($produk->price) }}</p>
                <a href="{{ route('produk.show', $produk->id) }}" class="btn">Lihat produk</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
