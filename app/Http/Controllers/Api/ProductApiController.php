<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function bulkInsert(Request $request)
    {
        $validated = $request->validate([
            'products'             => 'required|array|min:1',
            'products.*.name'      => 'required|string|max:255',
            'products.*.stock'     => 'required|integer|min:0',
            'products.*.price'     => 'required|numeric|min:0',
            'products.*.code'      => 'required|string|max:255|unique:products,code',
            'products.*.image'     => 'nullable|string',  // assuming you send an URL or base64
        ]);

        foreach ($validated['products'] as $data) {
            Product::create([
                'name'  => $data['name'],
                'stock' => $data['stock'],
                'price' => $data['price'],
                'code'  => $data['code'],
                'image' => $data['image'] ?? null,
            ]);
        }

        return response()->json([
            'message' => 'Bulk insert completed successfully.',
            'count'   => count($validated['products']),
        ], 201);
    }
}
