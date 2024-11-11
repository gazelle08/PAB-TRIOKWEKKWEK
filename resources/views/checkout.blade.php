@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>
    <form action="{{ route('checkout.process') }}" method="POST" class="checkout-form">
        @csrf
        <label for="address">Shipping Address</label>
        <textarea name="address" required></textarea>

        <label for="phone">Phone Number</label>
        <input type="text" name="phone" required>

        <button type="submit" class="btn">Place Order</button>
    </form>
</div>
@endsection
