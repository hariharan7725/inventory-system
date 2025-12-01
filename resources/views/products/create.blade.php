@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <label>Price</label>
        <input type="number" step="0.01" name="price" required>

        <label>Code</label>
        <input type="text" name="code" required>

        <label>Image</label>
        <input type="file" name="image">

        <button class="btn btn-submit" style="margin-top:20px;">Save</button>
    </form>
</div>

@endsection
