<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Products;
use App\Images;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /*

		Controller Frontend

    */

    public function rajaOngkir()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array
        (
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                        "key: e33a9c5190a759d73f9036c2f3756589"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $provinceObj = json_decode($response,true);
        $provinces = array();
        foreach($provinceObj['rajaongkir']['results'] as $province)
        {
            $provinces[] =  $province;
        }

        curl_close($curl);

        if ($err)
        {
            echo "cURL Error #:" . $err;
        }
        else
        {
            // echo ($response);
            // var_dump();
            // die();

        }


    }

    public function testGuzzle()
    {
        //request url
        $url = 'https://stackoverflow.com/feeds/tag?tagnames=php&sort=newest';
        $url = 'https://api.rajaongkir.com/starter/province?id=12';


        //create new instance of Client class
        $client = new Client(
            ['header' =>
                [
                    'key' => 'e33a9c5190a759d73f9036c2f3756589',
                ]
            ]
            );

        //send get request to fetch data
        $response = $client->request('GET', $url);

        //check response status ex: 200 is 'OK'
        if ($response->getStatusCode() == 200)
        {
            //header information contains detail information about the response.
            if ($response->hasHeader('Content-Length'))
            {
                //get number of bytes received
                $content_length = $response->getHeader('Content-Length')[0];
                echo '<p> Download '. $content_length. ' of data </p>';
            }

            //get body content
            $body = $response->getBody();

            //convert response to XML Element object
            $xml = new \SimpleXmlElement($body);

            //loop each item and display result
            foreach($xml->entry as $item)
            {
                echo '<h3> Question By: ' . $item->author->name . '</h3>';
                echo '<p> Question: '. $item->summary . '</p>';
            }
        }
    }

    public function topProduct()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_name','like','%top%')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        return view('topproduct',compact('products'));

    }
    public function dressProduct()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_name','like','%dress%')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        return view('dressproduct',compact('products'));
    }
    public function outerProduct()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_name','like','%outer%')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        return view('outerproduct',compact('products'));


    }
    public function jumpsuitProduct()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_name','like','%jump%')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        return view('jumpsuitproduct',compact('products'));


    }
    //obtain product category set
    public function setProduct()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_name','like','%set%')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        // dd($products);

        return view('setproduct',compact('products'));

    }




    public function newArrival()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_new_arrival_flag','true')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        // dd($products);
        return view('newarrival',compact('products'));
    }
    public function bestSeller()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_best_seller_flag','true')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//
        // dd($products);

        return view('bestseller',compact('products'));
    }
    public function mustHaves()
    {
        $products = DB::table('products')
        ->join('images', 'images.product_name', '=', 'products.product_name')
        ->join('colours','colours.product_name', '=', 'products.product_name')
        ->whereColumn('images.colour_name','colours.colour_name')
        ->where('products.product_must_haves_flag','true')
        ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
        ->groupBy('colours.colour_name', 'products.product_name')
        ->paginate(20);// ->get();//

        return view('musthaves',compact('products'));
    }

    public function aboutMe()
    {
        return view('about');
    }

    public function indexView()
    {
    	return view('index');
    }


    public function example()
    {
        $analyticsData = Analytics::performQuery(Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:country, ga:region, ga:city, ga:date, ga:browser,ga:operatingSystem'
            ]
        );

        $data = array();
        $data = $analyticsData['rows'];

        /*
            need to be change/update with the correct url_id
         */
        $url_id = 1;

        /**
         * assigned each data and bulk insert to db
         */

        foreach ($data as $key => $value)
        {
            $data['country'] = $value[0];
            $data['region'] = $value[1];
            $data['city'] = $value[2];
            $data['date'] = $value[3];
            $data['browser'] = $value[4];
            $data['operatingSytem'] = $value[5];
            $data['visitor'] = $value[6];

            DB::table('analytics')->insert(
                [
                    'url_id' => $url_id,
                    'country' => $data['country'],
                    'region' => $data['region'],
                    'city' => $data['city'],
                    'date' => $data['date'],
                    'browser' => $data['browser'],
                    'operatingSystem' => $data['operatingSytem'],
                    'visitor' => $data['visitor']
                ]);
        }
    }
    public function checkoutPage()
    {
        $provinces = DB::table('provinces')->get();
        $cities = DB::table('cities')->get();

        // dd($provinces);
        $provinces = json_decode($provinces,true);
        $cities = json_decode($cities,true);

        return view('checkout',compact('provinces','cities'));

    }
    public function populateDataProvinceAndCities()
    {
        // get province start
        $curl = curl_init();
        curl_setopt_array($curl, array
        (
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("key: e33a9c5190a759d73f9036c2f3756589"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $provinceObj = json_decode($response,true);
        $provinces = array();
        $provinces = $provinceObj['rajaongkir']['results'];
        // dd($provinces);
        // foreach($provinces as $key => $value)
        // {
        //     $provinces['province_id'] = $value['province_id'];
        //     $provinces['province'] = $value['province'];

        //     DB::table('provinces')->insert(
        //         [
        //             'province_id' => $provinces['province_id'],
        //             'province' => $provinces['province']
        //         ]);
        // }
        // dd('check db');

        foreach($provinceObj['rajaongkir']['results'] as $province)
        {
            $provinces[] =  $province;
        }
        curl_close($curl);
        // get province end

        // dd($provinces);

        // get cities start
        $curl2 = curl_init();
        curl_setopt_array($curl2, array
        (
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("key: e33a9c5190a759d73f9036c2f3756589"),
        ));
        $response = curl_exec($curl2);
        $err = curl_error($curl2);
        $citiesObj = json_decode($response,true);
        $cities = array();
        $cities = $citiesObj['rajaongkir']['results'];
        foreach($cities as $key => $value)
        {
            $cities['city_id'] = $value['city_id'];
            $cities['province_id'] = $value['province_id'];
            $cities['province'] = $value['province'];
            $cities['type'] = $value['type'];
            $cities['city_name'] = $value['city_name'];
            $cities['postal_code'] = $value['postal_code'];

            DB::table('cities')->insert(
                [
                    'city_id' => $cities['city_id'],
                    'province_id' => $cities['province_id'],
                    'province' => $cities['province'],
                    'type' => $cities['type'],
                    'city_name' => $cities['city_name'],
                    'postal_code' => $cities['postal_code']
                ]);
        }
        dd('check db');



        foreach($citiesObj['rajaongkir']['results'] as $city)
        {
            $cities[] =  $city;
        }
        curl_close($curl2);
        // get cities end
        dd($cities);





        return view('checkout',compact('provinces','cities'));
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


    public function addToCart(Request $request, $url)
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

        $size = $request->input('size_name');
        $quantity = $request->input('quantity');

        // dd($quantity);

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
                    "product_quantity" => $quantity,
                    "product_price" => $productDetails[0]->product_price,
                    "product_image" => $productDetails[0]->image_path,
                    "product_size" => $size,
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
         $cart[$url] = [
            "product_name" => $productDetails[0]->product_name,
            "product_quantity" => $quantity,
            "product_price" => $productDetails[0]->product_price,
            "product_image" => $productDetails[0]->image_path,
            "product_size" => $size,
            "product_colour" => $productDetails[0]->colour_name,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function productDetailView($url)
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
        // dd($productDetails);
        // $productDetails =
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
