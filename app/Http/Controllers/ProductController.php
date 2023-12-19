<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Product::all();
       return Inertia::render("Products/index", [
        'products' => $products

       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render("Products/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    
        public function store(Request $request)

        {
            $request->validate([
                'item_name' => 'required',
                'item_detail'=>'required',
                'item_price'=>'required',
                'warranty_period'=>'required'
            ]);
            
     
            Product::create($request->all());
            return redirect(route('products.index'));
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {
            $products = Product::find($id);
            return Inertia::render("Products/edit", [
                'products' => $products
            ]);
        }
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->update($request->all());
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect(route('products.index'));
    }
}
