<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manufactor_tbl;

class manufacturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function addBrand()
    {
        return view('admin.brands.add-manufacture');
    }
    public function allBrand()
    {
        $brands = manufactor_tbl::all();
        return view('admin.brands.all-manufacture')->with(compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brand = new manufactor_tbl();
        $brand->manufactor_name = $request->get('manufactor_name');
        $brand->manufactor_description = $request->get('manufactor_description');
        if($request->get('publication_status') == 'on'){
            $brand->publication_status = 1;
        }
        $brand->save();
        return redirect()->intended(route('brands.index'));
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
    public function edit(Request $request ,$id)
    {
        $brand = manufactor_tbl::find($id);
        return view('admin.brands.edit-manufacture')->with(compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        $brand = manufactor_tbl::find($id);
        $brand->manufactor_name = $request->get('manufactor_name');
        $brand->manufactor_description = $request->get('manufactor_description');
        if($request->get('publication_status') == 'on'){
            $brand->publication_status = 1;
        }else{

            $brand->publication_status = 0;
        }
        $brand->update();

        return redirect()->intended(route('brands.index'))->with('success','Brand updated successfuly!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = manufactor_tbl::find($id); 
        $brand->delete(); 
        return redirect()->route('brands.index')->with('success','Brand Deleted successfuly!');
    }
}
