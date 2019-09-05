<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\billing_details;
use Illuminate\Support\Facades\Auth;

class SpecialController extends Controller
{
    //
    // Controller for Customers

    public function customerOrder()
    {
        $email = Auth::user()->email;
        // $order = billing_details
        // $flights = App\Flight::where('active', 1)
        //        ->orderBy('name', 'desc')
        //        ->take(10)
        //        ->get();
        // $email = 'stephanus1902@gmail.com';
        $order = billing_details::where('email',$email)->get();

        // dd($order);

    //     #attributes: array:20 [▼
    //     "id" => 1
    //     "order_id" => "ORDER-yC0xe"
    //     "first_name" => "a"
    //     "last_name" => "a"
    //     "address" => "a"
    //     "provinces" => "14"
    //     "cities" => "371"
    //     "postal_code" => "74811"
    //     "email" => "stephanus1902@gmail.com"
    //     "phone" => "1223"
    //     "notes" => ""
    //     "product_name" => ""
    //     "product_colour" => ""
    //     "product_size" => ""
    //     "total_weight" => 600
    //     "total_price" => 1260000
    //     "status" => "pending"
    //     "snap_token" => null
    //     "created_at" => null
    //     "updated_at" => null
    //   ]

        return view('my-order',compact('order'));

    }

}
