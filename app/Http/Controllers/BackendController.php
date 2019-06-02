<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    public function getBackIndexPageView()
    {
    	return view('backend_index');
    }
    public function getBackAddProductView()
    {
    	return view('backend_addproduct');
    }
}
