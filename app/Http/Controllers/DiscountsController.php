<?php

namespace App\Http\Controllers;

use App\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountsController extends Controller
{

    public function index()
    {
        //checkpoint
        // return view('backend_discount');
        $products = DB::table('products')
        ->join('discounts','discounts.product_id','=','products.id')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->where('products.is_discount','=','true')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('products.price_after_discount','products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url','discounts.discount_percentage','discounts.discount_until')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);

        return view('discount',compact('products'));
    }



}
