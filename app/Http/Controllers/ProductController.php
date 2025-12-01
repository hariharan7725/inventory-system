<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $products = Product::query()
        ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
        ->paginate(10); // instead of all()

    return view('products.index', compact('products', 'search'));
}
public function create()
    {
        return view('products.create');
    }

public function store(Request $request)
{
    // Validate input (no $product here)
    $validated = $request->validate([
        'code'  => 'required|string|max:50|unique:products,code',
        'name'  => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Generate filename: product name + .jpg
        $filename = strtolower(preg_replace('/\s+/', '_', $validated['name'])) . '.jpg';

        // Save file to storage/app/public/products
        $request->file('image')->storeAs('products', $filename, 'public');

        // Store filename in DB
        $validated['image'] = 'products/' . $filename;
    }

    // Create new product
    Product::create($validated);

    return redirect()->route('products.index')
                     ->with('success', 'Product created successfully!');
}

    public function show(Product $product)
{
    // Return a view with the product details
    return view('products.show', compact('product'));
}
    public function edit(Product $product)
{
    // Return a view with the product details
    return view('products.edit', compact('product'));
}
public function update(Request $request, Product $product)
{
    // Validate input
    $validated = $request->validate([
        'code'  => 'required|string|max:50|unique:products,code,' . $product->id,
        'name'  => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    // Update product
    $product->update($validated);

    // Redirect back to list with success message
    return redirect()->route('products.index')
                     ->with('success', 'Product updated successfully!');
}
public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Product deleted successfully!');
}
public function bulkInsert(Request $request)
{
    $request->validate([
        'products' => 'required|array',
        'products.*.code' => 'required|string',
        'products.*.name' => 'required|string',
        'products.*.price' => 'required|numeric',
        'products.*.stock' => 'required|numeric',
    ]);

    Product::insert($request->products);  // insert all at once

    return response()->json([
        'message' => 'Products inserted successfully'
    ]);
}


}
