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
        $order = billing_details::where('email',$email)->get();

        return view('my-order',compact('order'));

    }

}
