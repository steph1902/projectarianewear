<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use File;
use App\Images;
use App\Coupon;
use Illuminate\Support\Facades\Auth;


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

    // coupon
    public function getBackCouponView()
    {
        $coupons = Coupon::all();
        return view('backend_viewcoupon',compact('coupons'));
    }
    public function getBackPostCouponView()
    {
        return view('backend_addcoupon');
    }
    public function getBackPostCoupon(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'coupon_code' => 'required|unique:Coupons',
            'coupon_expiry' => 'required',
            'coupon_discount_value' => 'required|min:1|max:99'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $now = now();
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_expiry = $request->coupon_expiry;
        $coupon->coupon_discount_value = $request->coupon_discount_value;
        $coupon->created_at = $now;
        $coupon->updated_at = $now;
        $coupon->save();

        return back()->with('success', 'Congratulations! your coupon has successfully been added!');



    }
    // edit coupon
    public function getBackEditCouponView($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        return view('backend_editcoupon',compact('coupon'));
    }
    public function backendEditCoupon(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'coupon_code' => 'required',
            'coupon_expiry' => 'required',
            'coupon_discount_value' => 'required|min:1|max:99'
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        $now = now();
        $coupon_code = $request->input('coupon_code'); //product

        // $coupon = Coupon::find($id);
        // $coupon->coupon_code = $request->coupon_code;
        // $coupon->coupon_expiry = $request->coupon_expiry;
        // $coupon->coupon_discount_value = $request->coupon_discount_value;
        // $coupon->updated_at = $now;
        // $coupon->save();

        Coupon::where('coupon_code', $coupon_code)
          ->update(
              [
                  'coupon_code' => $request->coupon_code,
                  'coupon_expiry' => $request->coupon_expiry,
                  'coupon_discount_value' => $request->coupon_discount_value,
                  'updated_at' => $now

                ]);

        // $form_data = $request->all();

        // DB::table('coupons')
        // ->where('id', $id)
        // ->update(
        //     [
        //         'coupon_code' => $form_data['coupon_code'],
        //         'coupon_expiry' => $form_data['coupon_expiry'],
        //         'coupon_discount_value' => $form_data['coupon_discount_value'],
        //         'updated_at' => $now
        //         // 'updated_at' => $updatedAt
        //     ]
        // );

        return back()->with('success', 'Congratulations! your coupon has successfully been edited!');

    }
    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        $coupons = Coupon::all();
        return view('backend_viewcoupon',compact('coupons'));

    }
    // coupon

    public function getBackLoginView()
    {
        return view('backend_login');
    }
    public function getBackPostLogin(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return view('backend_sitemap');
        }
        else
        {
            // return back()->withInput()->withFlashMessage('Wrong password or this account not approved yet.');
            return back()->withInput()->with('message','Wrong password.');
        }
    }
    public function backendLogout()
    {
        Auth::logout();
        return view('backend_login');
    }

    // add product to db
    public function backendPostProduct(Request $request)
    {

        // controller to add product data to database

        $validator = Validator::make($request->all(),
        [
            'product_name' => 'required|unique:Products|max:255',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_stock' => 'required',
            'product_weight' => 'required',
            'product_colour' => 'required',
            'product_size' => 'required'
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
        $size = '';

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

        DB::table('colours')->insert(
            [
                'colour_name' => $form_data['product_colour'],
                'product_name' => $form_data['product_name'],
                'product_url' => $product_url,
                'created_at' => $now,
                'updated_at' => $now
            ]);

        if($request->exists('product_size'))
        {

                if(in_array('ALL SIZE',$form_data['product_size']))
                {
                    DB::table('sizes')->insert(
                        [
                            'size_name' => 'ALL SIZE',
                            'product_name' => $form_data['product_name'],
                            'created_at' => $now,
                            'updated_at' => $now
                        ]);
                }
                else
                {
                    if(in_array('S',$form_data['product_size']))
                    {
                        DB::table('sizes')->insert(
                            [
                                'size_name' => 'S',
                                'product_name' => $form_data['product_name'],
                                'created_at' => $now,
                                'updated_at' => $now
                            ]);
                    }

                    if(in_array('M',$form_data['product_size']))
                    {
                        DB::table('sizes')->insert(
                            [
                                'size_name' => 'M',
                                'product_name' => $form_data['product_name'],
                                'created_at' => $now,
                                'updated_at' => $now
                            ]);
                    }

                    if(in_array('L',$form_data['product_size']))
                    {
                        DB::table('sizes')->insert(
                            [
                                'size_name' => 'L',
                                'product_name' => $form_data['product_name'],
                                'created_at' => $now,
                                'updated_at' => $now
                            ]);
                    }

                }

        }


            // size_name
            // product_name
            // timestamp



        // return view('')

        // upload images
        $this->validate($request,
        [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg'

        ]);
        //C:\laragon\www\projectariane\public\images\Foto Produk Ariane Wear\Abby Top\ArmyGreen

        if($request->hasfile('filename'))
        {

           foreach($request->file('filename') as $image)
           {
               $name=$image->getClientOriginalName();
               $image_path = public_path().'\\images\\Foto Produk Ariane Wear\\'. $form_data['product_name'] .'\\'. $form_data['product_colour'];
               $image_path_to_db = 'images\\Foto Produk Ariane Wear\\'. $form_data['product_name'] .'\\'. $form_data['product_colour'].'\\'.$name;
               $image->move($image_path,$name);
            //    $data[] = $name;


                $form = new Images();
                // $form->image_path=json_encode($data);
                $form->image_path = $image_path_to_db;
                $form->product_name = $form_data['product_name'];
                $form->colour_name = $form_data['product_colour'];
                $form->created_at = $now;
                $form->updated_at = $now;
                $form->save();

            }
        }

        // dd('check db, check folder');

       return back()->with('success', 'Congratulations! your product has successfully been added!');





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




    }

}
