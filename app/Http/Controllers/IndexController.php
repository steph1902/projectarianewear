<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Images;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    /*

		Controller Frontend

    */




    public function indexView()
    {
    	return view('index');
    }

    public function productListView()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);

      return view('productlist',compact('products'));
    }

    public function productDetailView($id,$productColour)
    {
      /*
      SELECT
        colours.colour_name,
        products.product_name,
        products.product_description,
        products.product_wash_instruction,
        products.product_price,
        images.image_path,
        sizes.size_name
      FROM
          products,
          images,
          sizes,
          colours
      WHERE
	        products.product_name = images.product_name AND
          products.product_name = sizes.product_name AND
          products.product_name = colours.product_name AND
          images.product_name = sizes.product_name AND
          images.colour_name = colours.colour_name
      GROUP BY
          products.product_name,
          colours.colour_name,
          sizes.size_name
        */
        // dd($id);
        // $productName = $productName;
        // $productColour = $productColour;

        // '+"colour_name": "Green"
        // +"product_name": "ABBY TOP"'

        $productDetails = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('sizes', 'sizes.product_name', '=', 'products.product_name')
        ->join('colours', 'colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.product_name','sizes.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.id','=',$id) //->where('products.product_name','=',$productName)
        ->where('colours.colour_name','=',$productColour)
        ->select(
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

        dd($productDetails);

        // dd($productDetails);

    	return view('productdetail',compact('productDetails'));
    }


}
