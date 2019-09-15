<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Products;
use App\Images;
use App\billing_details;
use App\coupons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use App\Notifications\OutOfStock;
use App\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $billing_details = DB::table('billing_details')->where('customer_id', $id)->get();
        return view('home',compact('billing_details'));
    }
}
