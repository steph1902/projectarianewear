<?php

namespace App\Http\Controllers;

use App\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountsController extends Controller
{

    public function index()
    {

        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.is_discount','=','true')
        ->select('products.is_discount','products.price_after_discount','products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);



        return view('discount',compact('products'));
    }



}
