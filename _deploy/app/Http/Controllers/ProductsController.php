<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

/*
    BACKEND CONTROLLER
*/


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend_addproduct');

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

        $request->validate(
            [
                // '' => '',
                'product_name' => 'required',
                'product_price' => 'required',
                'product_stock' => 'required',
                'product_size_in_cm' => 'required',
                'product_material' => 'required',
                'product_colour' => 'required',
                'product_description' => 'required',
                'product_wash_instruction' => 'required',
                'product_size' => 'required',

            ]);

        $product = new Products(
            [
                'product_name' => $request->get('product_name'),
                'product_price' => $request->get('product_price'),
                'product_stock' => $request->get('product_stock'),
                'product_size_in_cm' => $request->get('product_size_in_cm'),
                'product_material' => $request->get('product_material'),
                
                'product_description' => $request->get('product_description'),
                'product_wash_instruction' => $request->get('product_wash_instruction'),
                

            ]);
        $product->save();

        $product_name = $request->get('product_name');
        $product_id = Products::where('product_name',$product_name)->get();
        dd($product_id);

        // $colour = new Colours(
        //     [

        //     ]);

        // 'product_colour' => $request->get('product_colour'),//database color
        // 'product_size' => $request->get('product_size'), //different database

        




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
