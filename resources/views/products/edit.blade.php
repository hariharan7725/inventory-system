@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <label>Name</label>
        <input value="{{ $product->name }}" type="text" name="name">

        <label>Stock</label>
        <input value="{{ $product->stock }}" type="number" name="stock">

        <label>Price</label>
        <input value="{{ $product->price }}" type="number" step="0.01" name="price">

        <label>Code</label>
        <input value="{{ $product->code }}" type="text" name="code">

        <label>Image</label>
        <input type="file" name="image">

        <button class="btn btn-edit" style="margin-top:20px;">Update</button>
    </form>
</div>

@endsection
