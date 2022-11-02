<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ชื่อสินค้า' => ['required', 'max:30'],
            'ราคาสินค้าต่อหน่วย' => ['required', 'integer', 'min:1'],
            'จำนวนสินค้าคงคลัง' => ['required', 'integer', 'min:0'],
        ]);
        $product = new Product();
        $product->ชื่อสินค้า = $request->input('ชื่อสินค้า');
        $product->ราคาสินค้าต่อหน่วย = $request->input('ราคาสินค้าต่อหน่วย');
        $product->จำนวนสินค้าคงคลัง = $request->input('จำนวนสินค้าคงคลัง');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->ชื่อสินค้า = $request->input('ชื่อสินค้า');
        $product->ราคาสินค้าต่อหน่วย = $request->input('ราคาสินค้าต่อหน่วย');
        $product->จำนวนสินค้าคงคลัง = $request->input('จำนวนสินค้าคงคลัง');
        $product->จำนวนสินค้าที่ถูกจอง = $request->input('จำนวนสินค้าที่ถูกจอง');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::searchProduct($search)->get();
        return view('products.search', ['products' => $products]);
    }
}
