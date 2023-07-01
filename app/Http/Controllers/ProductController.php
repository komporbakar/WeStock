<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'categories' => Category::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'date_in' => ['required'],
            'storage_location' => ['nullable'],
            'description' => ['min:5'],
            // 'image' => [],
        ]);
        $validate['image'] = 'default.jpg';


        $data = Product::create($validate);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product.edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'date_in' => ['required'],
            'storage_location' => ['nullable'],
            'description' => ['min:5'],
            // 'image' => [],
        ]);
        if (!$request->image) {
            $validate['image'] = 'default.jpg';
        } else {
            $request['image'] = $request->image();
        }

        $update = Product::findOrFail($id)->update($validate);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
