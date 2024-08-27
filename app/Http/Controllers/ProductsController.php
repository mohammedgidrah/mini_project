<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Product;use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::all(); // Assuming you have a Category model

        return view('Product.create', compact('categories'));
        // return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_name' => 'required|max:255|string',
            'product_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048', // Adding max size for better validation
            'product_price' => 'required|numeric',
        ]);
    
        $filename = null; // Initialize filename as null
    
        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/product/';
            $file->move(public_path($path), $filename);
        }
    
        // Create a new product with or without the image
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'category_id' => $request->category_id, // Save the selected category ID
            'image' => $filename ? $path . $filename : null,
            'product_price' => $request->product_price,
        ]);
    
        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }
    
    
    
//     public function store(Request $request)
// {
//     // Validate the incoming request data
//     $request->validate([
//         'product_name' => 'required|max:255',
//         'product_description' => 'required',
//         'product_price' => 'required|numeric',
//         'category_name' => 'required|max:255',
//         'category_description' => 'required',
//     ]);

//     // Extract request data
//     $category_name = $request->input('category_name');
//     $category_description = $request->input('category_description');
//     $product_name = $request->input('product_name');
//     $product_description = $request->input('product_description');
//     $product_price = $request->input('product_price');

//     // Create the category first
//     $category = Category::create([
//         'category_name' => $category_name,
//         'category_description' => $category_description,
//     ]);

//     // Create the product with the newly created category ID
//     Product::create([
//         'product_name' => $product_name,
//         'product_description' => $product_description,
//         'product_price' => $product_price,
//         'category_id' => $category->id,  // Assign the created category's ID
//     ]);

//     // Redirect back to the product index with a success message
//     return redirect()->route('product.index')->with('success', 'Product added successfully.');
// }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::onlyTrashed()->get();
        return view('product.softdelete', compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
    
        // Fetch all categories
        $categories = categories::all();
    
        // Pass the product and categories to the view
        return view('product.edit', compact('product', 'categories'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:255|string',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
    
        $filename = $product->image; // Keep current image if no new image is uploaded
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/product/';
            $file->move(public_path($path), $filename);
            $filename = $path . $filename;
        }
    
        $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
            'image' => $filename,
        ]);
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('product.index')->with('success', 'product deleted successfully.');
    }
}
