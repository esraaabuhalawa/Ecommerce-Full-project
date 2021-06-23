<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category_tbl;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responseadd-manufacture
     */
    public function add_category() /// get routes of the form add cateogry
    {
        return view('admin.categories.add-category');
    }
    public function index()
    {
        $categories = category_tbl::all();
        return view('admin.categories.all-category')->with(compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) /// post route data
    {
        $category = new category_tbl();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        if($request->get('publication_status') == 'on'){
            $category->publication_status = 1;
        }
        $category->save();
        return redirect()->intended(route('categories.index'))->with('success','Category create successfuly!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function delete($id)
    {
        //Db::table('category_tbl')->where('category_id',$id)->delete();
        $category = category_tbl::find($id); 
        $category->delete(); 
        return redirect()->intended(route('categories.index'))->with('success','Category Deleted successfuly!');
    }*/
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
    public function edit($id)
    {
        $category = category_tbl::find($id);
        return view('admin.categories.edit-category')->with(compact('category'));
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
        $category = category_tbl::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        if($request->get('publication_status') == 'on'){
            $category->publication_status = 1;
        }else{
            $category->publication_status = 0;
        }
        $category->update();
        return redirect()->intended(route('categories.index'))->with('success','Category updated successfuly!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category_tbl::find($id); 
        $category->delete(); 
        return redirect()->route('categories.index')->with('success','Category Deleted successfuly!');
    }
}