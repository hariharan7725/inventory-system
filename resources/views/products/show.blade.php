@extends('layouts.app')

@section('content')

<div class="card">
    <h2>{{ $product->name }}</h2>

    <img src="{{ asset('storage/' . $product->image) }}" width="180" style="border-radius:10px;">

    <p><b>Stock:</b> {{ $product->stock }}</p>
    <p><b>Price:</b> ₹{{ $product->price }}</p>
    <p><b>Code:</b> {{ $product->code }}</p>

    <a href="/products" class="btn btn-view">Back</a>
</div>

@endsection
