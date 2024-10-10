<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'description' => 'nullable|string|max:255',
        'retail_price' => 'required|numeric|min:1|max:999999',
        'wholesale_price' => 'required|numeric|min:1|max:999999|lte:retail_price',
        'min_wholesale_qty' => 'required|integer|min:10|lte:quantity',
        'quantity' => 'required|integer|min:0',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    // Handle file upload
    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('photos', 'public');
    }

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'description' => 'nullable|string|max:255',
        'retail_price' => 'required|numeric|min:1|max:999999',
        'wholesale_price' => 'required|numeric|min:1|max:999999|lte:retail_price',
        'min_wholesale_qty' => 'required|integer|min:10|lte:quantity',
        'quantity' => 'required|integer|min:0',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    // Handle file upload
    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }
        $data['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
