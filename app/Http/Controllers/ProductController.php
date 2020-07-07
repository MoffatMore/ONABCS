<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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
        $products = Product::paginate(4);
        return view('welcome')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')){
            $file = $request->file('picture');

            Storage::putFile($file->getClientOriginalName(),$file);
            $product = Product::create([
                'name'=>$request->name,
                'description' =>$request->description,
                'price' => $request->price,
                'status' => 'Available',
                'picture'=>$file->getClientOriginalName()
            ]);
            return redirect()->route('admin.products')->with('success','Successfully added a new product');
        }else{
            $product = Product::create([
                'name'=>$request->name,
                'description' =>$request->description,
                'price' => $request->price,
                'status' => 'Available',
            ]);
            return redirect()->route('admin.new-product')->with('fail','Unsuccessfully added new product');
        }

        return redirect()->back()->with('fail','Unsuccessfully submitted request');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

       return view('product-details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
