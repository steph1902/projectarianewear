<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Products;
use App\Images;
use App\billing_details;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;


class IndexController extends Controller
{
    /*

		Controller Frontend

    */


    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }



    public function thankyouPage()
    {
        return view('thankyou');
    }

    public function toPayment(Request $request)
    {
        $firstName = $this->request->firstname;
        $lastName = $this->request->lastname;
        $address = $this->request->address;
        $province = $this->request->province;
        $city = $this->request->city;
        $postalCode = $this->request->postal_code;
        $email = $this->request->email;
        $phone = $this->request->phone;
        $notes = $this->request->notes;
        $delivery = $this->request->delivery;
        $weight = session()->get('total_weight');

        // dd($request->all());

        $CURLOPT_POSTFIELDS_STRING =  "origin=155&destination=".$city."&weight=".$weight."&courier=jne";

        $curl = curl_init();

        curl_setopt_array($curl, array
        (
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $CURLOPT_POSTFIELDS_STRING,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: e33a9c5190a759d73f9036c2f3756589"
        ),
        ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);


            // $provinceObj = json_decode($response,true);
            // $provinces = array();
            // $provinces = $provinceObj['rajaongkir']['results'];
            $SHIPPING_COST = 0;
            $costObj = json_decode($response,true);
            $costs = array();
            $costsOKE = $costObj['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']; //OKE
            $costsREG = $costObj['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']; //REG
            // $oke = $costsOKE[0]['value'];

            // $sessionShippingCost = session()->get('shipping_cost');
            // session()->put('shipping_cost',$cart);

            // dd($delivery);

            if($delivery == 'OKE')
            {
                $SHIPPING_COST = $costsOKE;
                session()->put('shipping_cost',$SHIPPING_COST);
            }
            else if($delivery == 'REG')
            {
                $SHIPPING_COST = $costsREG;
                session()->put('shipping_cost',$SHIPPING_COST);
            }

            $sessioncost = session()->get('shipping_cost');


            session()->put('first_name',$firstName);
            session()->put('last_name',$lastName);
            session()->put('address',$address);
            session()->put('province',$province);
            session()->put('city',$city);
            session()->put('postal_code',$postalCode);
            session()->put('email',$email);
            session()->put('phone',$phone);
            session()->put('notes',$notes);
            session()->put('delivery',$delivery);

            $provinces = DB::table('provinces')->get();
            $cities = DB::table('cities')->get();

        // dd($provinces);
            $provinces = json_decode($provinces,true);
            $cities = json_decode($cities,true);

            return view('checkout',compact('provinces','cities'));







    }

    public function orderDetails(Request $request)
    {


        $firstName = $this->request->firstname;
        $lastName = $this->request->lastname;
        $address = $this->request->address;

        $province = $request->session()->get('province');
        $city = $request->session()->get('city');
        $postalCode = $request->session()->get('postal_code');
        $email = $request->session()->get('email');
        $phone = $request->session()->get('phone');
        $notes = $request->session()->get('notes');



        $strRand = str_random(5);
        $orderId = 'ORDER-'.$strRand;

        $sessionData = $request->session()->all();

        $totalWeight = $request->session()->get('total_weight');
        $totalPrice = $request->session()->get('total_price');

        $sessionDataCart = $sessionData['cart'];
        $cart = session()->get('cart');

        if(!$cart)
        {
            return view('productlist')->with('success','Your cart is still empty, please add some product first to cart.');
        }
        else
        {
            DB::table('billing_details')->insert(
                [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'address' => $address,
                    'provinces' => $province,
                    'cities' => $city,
                    'postal_code' => $postalCode,
                    'email' => $email,
                    'phone' => $phone,
                    'order_id' => $orderId,
                    'total_weight' => $totalWeight,
                    'total_price' => $totalPrice
                ]
            );

        }


        $id =  current(array_keys($sessionDataCart));

         $payload = [
            'transaction_details' =>
            [
                'order_id'      => $orderId,
                'gross_amount'  => $totalPrice,
            ],
            'customer_details' =>
            [
                'first_name'    => $firstName,
                'email'         => $email,
                // 'phone'         => '08888888888',
                // 'address'       => '',
            ],
            'item_details' =>
            [
                [
                    'id'       => $id,
                    'price'    => $totalPrice,
                    'quantity' => 1,
                    'name'     => $orderId
                ]
            ]
        ];

        $snapToken = Veritrans_Snap::getSnapToken($payload);
        $this->response['snap_token'] = $snapToken;
        return response()->json($this->response);
    }

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $billingDetails = billng_details::findOrFail($orderId);

          if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $billingDetails->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $billingDetails->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $billingDetails->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $billingDetails->setSuccess();
              }

            }

          } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $billingDetails->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $billingDetails->setSuccess();

          } elseif($transaction == 'pending'){

            // TODO set payment status in merchant's database to 'Pending'
            // $billingDetails->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $billingDetails->setPending();

          } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $billingDetails->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $billingDetails->setFailed();

          } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $billingDetails->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $billingDetails->setExpired();

          } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $billingDetails->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $billingDetails->setFailed();

          }

        });

        return;
    }

    public function searchProduct(Request $request)
    {
        if($request->has('search'))
        {
            $searchValue = $request->get('search');

            $products = DB::table('products')
            ->join('images', 'images.product_name', '=', 'products.product_name')
            ->join('colours','colours.product_name', '=', 'products.product_name')
            ->where('products.product_name', 'like' , '%'.$searchValue.'%' )
            ->whereColumn('images.colour_name','colours.colour_name')
            ->select('products.product_name','products.product_price','images.image_path','colours.colour_name','colours.product_url')
            ->groupBy('colours.colour_name', 'products.product_name')
            ->paginate(20);// ->get();//
        }
            return view('searchresult',compact('products'));
    }

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

    public function getshippingcost(Request $request)
    {
        // origin	String	ID kota/kabupaten asal
        // destination	String	ID kota/kabupaten tujuan
        // weight	Int	Berat kiriman
        // courier	String	Kode kurir yang dipakai

        $province_id = Input::get('province_id');
        $city_id = Input::get('city_id');
        $weight = session()->get('total_weight');
        $province = $this->request->province;
        $city = $this->request->city_id;

        $city = '457';


        $CURLOPT_POSTFIELDS_STRING =  "origin=155&destination=".$city."&weight=".$weight."&courier=jne";

        $curl = curl_init();

        curl_setopt_array($curl, array
        (
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $CURLOPT_POSTFIELDS_STRING,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: e33a9c5190a759d73f9036c2f3756589"
        ),
        ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

        if ($err)
        {
            echo "cURL Error #:" . $err;
        }
        else
        {
            return response()->json($response);
        }


    }


    public function getcities()
    {
        $province_id = Input::get('province_id');
        $cities = DB::table('cities')->where('province_id','=',$province_id)->get();
        // dd($cities);
        // console.log($cities);
        return response()->json($cities);


    }

    public function getpostalcode()
    {
        $city_id = Input::get('city_id');
        $postal_code = DB::table('cities')->where('city_id','=',$city_id)->get();
        // console.log($postal_code);
        return response()->json($postal_code);
    }

    public function preCheckoutPage()
    {
        $provinces = DB::table('provinces')->get();
        $cities = DB::table('cities')->get();

        // dd($provinces);
        $provinces = json_decode($provinces,true);
        $cities = json_decode($cities,true);

        return view('precheckout',compact('provinces','cities'));

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
              'products.product_weight',
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
                    'product_weight' => $productDetails[0]->product_weight,
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
            'product_weight' => $productDetails[0]->product_weight,
            "product_colour" => $productDetails[0]->colour_name,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function removeCart(Request $request)
    {
        // dd($request->url);
        if($request->url)
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->url]))
            {
                unset($cart[$request->url]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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

        $productImages = DB::table('products')
        ->join('images','images.product_name' ,'=','products.product_name')
        ->join('colours','colours.product_name','=','images.product_name')
        ->where('colours.product_url','=',$url)
        ->whereColumn('images.colour_name','colours.colour_name')
        ->select('images.image_path')
        // ->take(4)
        ->get();
        // SELECT
	    // images.image_path
        // FROM products JOIN images ON products.product_name = images.product_name

        // dd($productImages);

    	return view('productdetail',compact('productDetails','productImages'));
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
