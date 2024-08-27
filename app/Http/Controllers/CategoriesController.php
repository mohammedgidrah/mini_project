<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Product;
use File;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categories::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255|string',
            'category_description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048', // Adding max size for better validation
        ]);
    
        $filename = null; 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'upload/category/';
            $file->move(public_path($path), $filename);
        }
    
        categories::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'image' => $filename ? $path . $filename : null,
        ]);

    

    
        return redirect()->route('category.index')->with('success', 'category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $categories = categories::onlyTrashed()->get();
        return view('category.softdelete' , compact('categories')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = categories::find($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => ['required'],
            'category_description' => ['required'],
            'image' => ['required'],
        ]);
    
        $categories = categories::find($id);
    
        $filename = $categories->image; 
        $path = 'upload/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path($path), $filename);
            
            if (File::exists(public_path($categories->image))) {
                File::delete(public_path($categories->image));
            }
        }

        $categories->category_name = $request->input('category_name');
        $categories->category_description = $request->input('category_description');
        $categories->image = $filename ? $path . $filename : $categories->image;  // Update image path if a new image was uploaded
        $categories->save();
    
        return redirect()->route('category.index')->with('success', 'category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = categories::find($id);
        $categories->delete();
    
        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}
