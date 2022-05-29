<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate(
            [
                'name' => 'required|min:2',
                'description' => 'required|min:10',
                'price' => 'required|numeric|min:1',
                'image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if(isset($data['image'])){
            $img_product = Storage::put('img_products', $data['image']);
            $data['image'] = $img_product;
        }

        $product = new Product();
        $product->fill($data);
        $product->save();

        return redirect()->route('admin.products.index')->with('message', 'Product correctly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validation
        $request->validate(
            [
                'name' => 'required|min:2',
                'description' => 'required|min:10',
                'price' => 'required|numeric|min:1',
                'image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if(isset($data['image'])){
            $img_product = Storage::put('img_products', $data['image']);
            $data['image'] = $img_product;
        }

        $product->update($data);
        $product->save();

        return redirect()->route('admin.products.show', ['product' => $product->id])->with('message', 'Product correctly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', 'Product correctly deleted');
    }
}
