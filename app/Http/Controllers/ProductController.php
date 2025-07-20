<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductForm;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Services\ImageUploader;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('product.index', compact('products'));
    }

    public function store(ProductForm $request, ImageUploader $uploader)
    {
        $imagePath = $uploader->handleUpload($request);

        try {
            Products::create([
                'name' => $request->name,
                'description' => $request->description,
                'qty' => $request->quantity,
                'price' => $request->price,
                'supplier_id' => $request->supplier_id ?? null,
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
    }

    public function update(ProductForm $request, ImageUploader $uploader)
    {
        try {
            $product = Products::findOrFail($request->id);

            $imagePath = $product->image;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imagePath = $uploader->handleUpload($request);
            }

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'qty' => $request->quantity,
                'price' => $request->price,
                'supplier_id' => $request->supplier_id,
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update product. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to delete product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete product. Please try again.');
        }
    }
}
