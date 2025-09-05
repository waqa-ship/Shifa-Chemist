<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MedicineCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(5);
         
        return view('products.index', compact('products'));
    }

    // Show create form
    public function create()

    {
          $categories = MedicineCategory::all();
        return view('products.create', compact('categories'));
    }

    // Store product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'barcode' => 'nullable|unique:products',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity_in_stock' => 'required|integer',
            'minimum_stock_alert' => 'required|integer',
            'manufacture_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'storage_requirements' => 'nullable|string',
            'prescription_required' => 'boolean',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('product_image')) {
            $validated['product_image'] = $request->file('product_image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
       $categories = MedicineCategory::all();
    return view('products.edit', compact('product', 'categories'));
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    // Update product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity_in_stock' => 'required|integer',
            'minimum_stock_alert' => 'required|integer',
            'manufacture_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'storage_requirements' => 'nullable|string',
            'prescription_required' => 'boolean',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('product_image')) {
            $validated['product_image'] = $request->file('product_image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
