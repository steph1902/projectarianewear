<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class BackendController extends Controller
{
    //
    // public

    public function getSitemapView()
    {
        return view('backend_sitemap');
    }

    public function getBackIndexPageView()
    {
    	return view('backend_index');
    }
    public function getBackAddProductView()
    {

    	return view('backend_addproduct');
    }
    public function backendPostProduct(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'product_name' => 'required|unique:Products|max:255',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_stock' => 'required',
            'product_weight' => 'required',
            'product_colour' => 'required'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $form_data = $request->all();

        $new_arrival = false;
        $best_seller = false;
        $must_haves = false;
        $now = now();

        $product_url = \str_slug($form_data['product_name'].' '.$form_data['product_colour']);

        if($request->exists('special_category'))
        {
            if(in_array('new_arrival',$form_data['special_category']))
            {
                $new_arrival = 'true';
            }
            if(in_array('best_seller',$form_data['special_category']))
            {
                $best_seller = 'true';
            }
            if(in_array('must_haves',$form_data['special_category']))
            {
                $must_haves = 'true';
            }
        }
        else
        {
            $new_arrival = false;
            $best_seller = false;
            $must_haves = false;
        }

        DB::table('products')->insert(
            [
                'product_name' => $form_data['product_name'],
                'product_price' => $form_data['product_price'],
                'product_size_in_cm' => $form_data['product_size_in_cm'],
                'product_material' => $form_data['product_material'],
                'product_description' => $form_data['product_description'],
                'product_wash_instruction' => $form_data['product_wash_instruction'],
                'product_new_arrival_flag' => $new_arrival,
                'product_best_seller_flag' => $best_seller,
                'product_must_haves_flag' => $must_haves,
                'product_stock' => $form_data['product_stock'],
                'product_weight' => $form_data['product_weight'],
                'created_at' => $now,
                'updated_at' => $now
            ]
        );

        // 'product_colour' => $
        DB::table('colours')->insert(
            [
                'colour_name' => $form_data['product_colour'],
                'product_name' => $form_data['product_name'],
                'product_url' => $product_url,
                'created_at' => $now,
                'updated_at' => $now
            ]);

        dd('check db');






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
        /**
         * PRODUCT TABLE
         */
            $name = $request->input('product_name'); //product
            $price = $request->input('product_price'); //product
            $size = $request->input('product_size_in_cm'); //product
            $material = $request->input('product_material'); //product
            $description = $request->input('product_description'); //product
            $wash = $request->input('product_wash_instruction'); //product
            $stock = $request->input('product_stock'); //product
            //product_weight
            // $updatedAt = Carbon\Carbon::now();

            // colour table
            $colour_name = $request->input('colour_name');
            $product_url = \str_slug($name.' '.$colour_name);


            DB::table('products')
            ->where('product_name', $name)
            ->update(
                [
                    'product_name' => $name,
                    'product_price' => $price,
                    'product_size_in_cm' => $size,
                    'product_material' => $material,
                    'product_description' => $description,
                    'product_wash_instruction' => $wash,
                    'product_stock' => $stock,
                    // 'updated_at' => $updatedAt
                ]
            );

            return redirect()->back()->with('success', 'Product updated successfully!');

        /**
         * COLOUR TABLE
         */
            // colour_name
            // product_name
            // product_url

            // e.g. abby-top-armygreen


            // $data['product_name'] = $d->product_name;

            // DB::table('colours')->




            // $productUrl = $request->input('product_url'); //product




            // DB::table('sizes')
            //     ->where('product_name',$name)
            //     ->update(
            //         [
            //             'product_size_in_cm' => $size
            //         ]);

            // DB::table('sizes')
            // ->where('product_name',$name)
            // ->update(
            //     [
            //         'product_size_in_cm' => $size
            //     ]);




    }

}
