<?php

namespace App\Http\Controllers;

use App\category_tbl;
use App\manufactor_tbl;
use App\product_tbl;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('auth')->except('index','shop');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.homepage');
    }
    public function product()
    {
        return view('pages.product-details');
    }
    public function checkout()
    {
        return view('pages.checkout');
    }
    public function cart()
    {
        return view('pages.cart');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function shop()
    {
        return view('pages.shop');
    }
    
    public function blog()
    {
        return view('pages.blog');
    }
    public function blogSingle()
    {
        return view('pages.blog-single');
    }
    public function contact()
    {
        return view('pages.contactUs');
    }
}

