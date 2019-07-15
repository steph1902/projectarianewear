<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getBackProductView()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select(
        'products.id',
        'products.product_name',
        'products.product_price',
        'products.product_material',
        'products.product_description',
        'products.product_wash_instruction',
        'products.product_stock',
        'products.product_weight',
        'colours.colour_name',
        'colours.product_url'
        )
        ->groupBy('colours.colour_name', 'products.product_name')
        ->orderBy('products.product_name')
        ->get();// ->get();//

        // dd($products);


    //   return view('productlist',compact('products'));
        return view('backend_viewproduct',compact('products'));
    }

    public function getBackEditProductView($url)
    {
        $productDetails = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('sizes', 'sizes.product_name', '=', 'products.product_name')
        ->join('colours', 'colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.product_name','sizes.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('colours.product_url','=',$url)
        // ->where('products.product_name','=',$productName) //->where('products.id','=',$id)
        // ->where('colours.colour_name','=',$productColour)
        ->select(
              'products.product_material',
              'products.product_size_in_cm',
              'products.product_stock',
              'colours.product_url',
              'colours.colour_name',
              'products.product_name',
              'products.product_description',
              'products.product_wash_instruction',
              'products.product_price',
              'images.image_path',
              'sizes.size_name')
        ->groupBy(
              'products.product_name',
              'colours.colour_name',
              'sizes.size_name')
        ->get();

        return view('backend_editproduct',compact('productDetails'));
    }

    public function backendEditProduct(Request $request)
    {
            $name = $request->input('product_name'); //product
            $price = $request->input('product_price'); //product
            $stock = $request->input('product_stock'); //product
            $size = $request->input('product_size_in_cm'); //size
            $material = $request->input('product_material'); //material
            $colour = $request->input('product_colour'); //colour
            $wash = $request->input('product_wash_instruction'); //product
            $imageUrl = $request->input('product_url'); //images

            DB::table('products')
                ->where('product_name', $name)
                ->update(
                    [
                        'product_name' => $name,
                        'product_price' => $price,
                        'product_stock' => $stock,
                        'product_wash_instruction' => $wash
                    ]
                );

            // DB::table('sizes')
            //     ->where('')
            //     ->update(
            //         [

            //         ]);



    }

}
