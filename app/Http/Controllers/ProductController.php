<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::with('category')->get();

        // Return the view with the products data
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        // Return the view with the product data
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Fetch all products from the database
        $product = Product::findOrFail($id);
        $categories = Category::all();

        // Return the view with the products data
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function create()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the categories data
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new product in the database
        Product::create($request->all());

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}
