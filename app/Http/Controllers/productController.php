<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category_tbl;
use App\manufactor_tbl;
use App\product_tbl;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function addProduct()
    {
        $categories = category_tbl::all();
        $brands = manufactor_tbl::all();
        return view('admin.products.add-product')->with(compact('categories','brands'));
    }
    public function allProducts()
    {
        $products = product_tbl::with('brand')->with('category')->get();
        return view('admin.products.all-products')->with(compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = new product_tbl();
        $product->product_name = $request->get('product_name');
        if($request->get('publication_status') == 'on'){
            $product->publication_status = 1;
        }
        $product->product_description = $request->get('product_description');
        $product->product_size = $request->get('product_size');
        $product->product_color = $request->get('product_color');
        $product->product_price = $request->get('product_price');
        $product->category_id = $request->get('category_id');
        $product->manufactor_id = $request->get('brand_id');
        $product->save();
        return redirect()->intended(route('products.index'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $product = product_tbl::where('product_id',$id)->with('category')->with('brand')->first();
        $categories = category_tbl::all();
        $brands = manufactor_tbl::all();
        return view('admin.products.edit-products')->with(compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product_tbl::where('product_id',$id)->first();
        $product->product_name = $request->get('product_name');
        if($request->get('publication_status') == 'on'){
            $product->publication_status = 1;
        } else {
            $product->publication_status = 0;
        }
        $product->product_description = $request->get('product_description');
        $product->product_size = $request->get('product_size');
        $product->product_color = $request->get('product_color');
        $product->product_price = $request->get('product_price');
        $product->category_id = $request->get('category_id');
        $product->manufactor_id = $request->get('brand_id');
        $product->update();
        return redirect()->intended(route('products.index'))->with('success','Product updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $brand = product_tbl::find($id); 
        $brand->delete(); 
        return redirect()->route('products.index')->with('success','Product Deleted successfuly!');
    }
}
