@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Inventory</h2>

    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search by name" value="{{ $search }}">
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-add">Add Product</a>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $p)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $p->image) }}" width="50" height="50" style="border-radius:5px;">
                </td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->stock }}</td>
                <td>₹{{ $p->price }}</td>
                <td>{{ $p->code }}</td>
                <td>
                    <a class="btn btn-view" href="{{ route('products.show', $p->id) }}">View</a>
                    <a class="btn btn-edit" href="{{ route('products.edit', $p->id) }}">Edit</a>

                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                        <button class="btn btn-delete">Delete</button>
                        @csrf @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>

@endsection
