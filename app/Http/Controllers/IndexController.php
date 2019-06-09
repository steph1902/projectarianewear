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

      // $products = Products::paginate(15);
      // dd($products);

      //product name, product price, product images

      // $products = DB::table('products')
      //       ->join('contacts', 'users.id', '=', 'contacts.user_id')
      //       ->join('orders', 'users.id', '=', 'orders.user_id')
      //       ->select('users.*', 'contacts.phone', 'orders.price')
      //       ->get();

      // $products = DB::table('products')
      //             ->join('images','products.product_name' , '=' ,'images.product_name')
      //             ->join('colours','colours.product_name', '=', 'images.product_name')
      //             ->where('colours.colour_name' ,'=','images.colour_name')
      //             ->select('products.product_name','products.product_price','images.image_path','colours.colour_name')
      //             ->groupBy('products.product_name','products.product_price','images.image_path','colours.colour_name')
      //             ->get();

//       SELECT
// 	products.product_name, products.product_price,images.image_path,colours.colour_name
// FROM 
// 	products,
// 	images,
// 	colours
// WHERE
// 	products.product_name = images.product_name AND
//     products.product_name = colours.product_name AND
//     colours.colour_name = images.colour_name
// GROUP BY colours.colour_name,products.product_name

        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours', 'colours.product_name', '=', 'products.product_name')
        // ->join('colours','colours.colour_name', '=', 'images.colour_name')
        ->where('colours.colour_name', '=', 'images.colour_name')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->get();

        // $article = \App\Models\Article::with(['user','category'])->first();

        $products =  Products::with(['images','colours'])->get(); //product name
        $images = Images::with('colours')->get();
        dd($images);

        // $article->category->category_name
        // dd($products2);



                  // dd($products2->images->image_path);




      // $flights = App\Flight::where('active', 1)
      //          ->orderBy('name', 'desc')
      //          ->take(10)
      //          ->get();

      // $images = Images::all();


      return view('productlist',compact('products'));
    }

    public function productDetailView()
    {
    	return view('productdetail');
    }


}
