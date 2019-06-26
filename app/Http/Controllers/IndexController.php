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

    public function frontPage()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->take(6)
        ->get();
        // ->paginate(20);// ->get();//
        // dd($products);
        return view('welcome',compact('products'));
    }

    public function productListView()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        // dd($products);


      return view('productlist',compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCartExample($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function addToCart($url)
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

        // dd($productDetails);

        if(!$productDetails)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart)
        {
            $cart =[
                $url =>[
                    "product_name" => $productDetails[0]->product_name,
                    "product_quantity" => 1,
                    "product_price" => $productDetails[0]->product_price,
                    "product_image" => $productDetails[0]->image_path,
                    "product_size" => $productDetails[0]->size_name,
                    "product_colour" => $productDetails[0]->colour_name,
                ]
            ];

            session()->put('cart',$cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // dd($cart);

        // if cart not empty then check if this product exist then increment quantity
         if(isset($cart[$url]))
         {

            $cart[$url]['product_quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

         // if item not exist in cart then add to cart with quantity = 1
         $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function productDetailView($url)
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
        // $productName = "ABBY TOP";
        // $productColour = "Green";

        // '+"colour_name":
        // +"product_name":

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
        // dd($productDetails);
        $productString = $productDetails['0']->product_name.' '.$productDetails['0']->colour_name;
        $url = \str_slug($productString);
        // dd($url);

        // dd($productDetails);

    	return view('productdetail',compact('productDetails'));
    }

    /**
     * to fix product detail url feature
     */
    public function insertURL()
    {

        $productColour = DB::table('colours')->select('product_name','colour_name')->get();

        $data = array();
        $data = $productColour;


        foreach($data as $d)
        {
            $data['product_name'] = $d->product_name;
            $data['colour_name'] = $d->colour_name;
            $data['product_url'] = \str_slug($d->product_name.' '.$d->colour_name);
            // dd($data['product_url']);

            DB::table('colours')
                ->where( 'product_name', $data['product_name'] )
                ->where( 'colour_name', $data['colour_name'] )
                ->update(
                [
                    'product_url' => $data['product_url']
                ]
            );

        }



    }


}
