<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
    	return view('admin.dashboard');
    }
      public function showLogin()
    {
    	
    	return view('admin_login');
    }
}
