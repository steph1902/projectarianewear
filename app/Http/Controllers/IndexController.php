<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*

		Controller Frontend

    */




    public function indexView()
    {
    	return view('index');
    }


    public function productDetailView()
    {
    	return view('productdetail');
    }

}
