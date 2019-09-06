<?php

namespace App\Http\Controllers;

use App\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checkpoint
        // return view('backend_discount');
        $products = DB::table('products')
        ->join('discounts','discounts.product_id','=','products.id')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url','discounts.discount_percentage','discounts.discount_until')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//


        // $productDetails = DB::table('products')
        // ->join('images', 'images.product_name', '=', 'products.product_name')
        // ->join('sizes', 'sizes.product_name', '=', 'products.product_name')
        // ->join('colours', 'colours.product_name', '=', 'products.product_name')
        // ->whereColumn('images.product_name','sizes.product_name')
        // ->whereColumn('images.colour_name','colours.colour_name')
        // ->where('colours.product_url','=',$url)
        // // ->where('products.product_name','=',$productName) //->where('products.id','=',$id)
        // // ->where('colours.colour_name','=',$productColour)
        // ->select(
        //       'colours.colour_name',
        //       'products.product_name',
        //       'products.product_description',
        //       'products.product_wash_instruction',
        //       'products.product_price',
        //       'products.product_weight',
        //       'images.image_path',
        //       'sizes.size_name')
        // ->groupBy(
        //       'products.product_name',
        //       'colours.colour_name',
        //       'sizes.size_name')
        // ->get();

        return view('discount',compact('products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function show(Discounts $discounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Discounts $discounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discounts $discounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discounts $discounts)
    {
        //
    }
}
