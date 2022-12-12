<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productcategory;
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
        $products = Product::all();
        return view('products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Productcategory::all();
        return view('products.products_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $foto=$request->file('img');

        $fotoname = rand().'.'.$foto->extension();

        $product->title=$request->title;
        $product->description=$request->description;
        $product->img=$fotoname;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->productcategory_id=$request->productcategory_id;


        $foto->storeAs('images',$fotoname);
        $product->save();

        return redirect()->route('products')->with('message','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.product_details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Productcategory::all();
        return view('products.products_update',compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->file('img')!=null) {
            $foto = $request->file('img');

            $fotoname = rand() . '.' . $foto->extension();
            $foto->storeAs('images',$fotoname);
            $product->img=$fotoname;
        }

        $product->title=$request->title;
        $product->description=$request->description;
        $product->img=$fotoname;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->productcategory_id=$request->productcategory_id;


        $foto->storeAs('images',$fotoname);
        $product->save();

        return redirect()->route('products')->with('message','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully.');
    }
}
