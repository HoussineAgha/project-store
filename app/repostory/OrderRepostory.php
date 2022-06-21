<?php

namespace App\repostory;
use GuzzleHttp\Client;
use App\Models\Store;
use App\Models\Product;
use App\Http\Requests;
use Session ;
use Illuminate\support\Facades\Auth;
class orderRepostory{

    public function getChargeRequest($lastname,$name, $email, $number, $store ){
        $totals =0;
        $cartItems = \Cart::getContent();

        foreach($cartItems as $key => $item){
            $totals += $item->price*$item->quantity + $item->shipping ;

            $product_id = $item->id;
            $product_name = $item->name;
            $product_price = $item->price;
            $product_quantity = $item->quantity;
            $product_shipping =  $item->shipping;
            $product_shipping_type = $item->shipping_type;
            $product_image = $item->attributes['image'];

        }

        $shipping = session::get('select_shipping');
            $shipping_id = session('select_shipping')['shipping_id'];
            $email = session('select_shipping')['email'];
            $phone = session('select_shipping')['phone'];
            $country = session('select_shipping')['country'];
            $state = session('select_shipping')['state'];
            $address = session('select_shipping')['address'];

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.env('Mada_Secret_API_Key')
        ];

        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
            'headers' => $headers,
            'form_params' => [
                'amount' => $totals,
                'currency' => 'USD',

                'metadata'=>[
                    /*
                    'product'=> \Cart::getContent(),
                    */
                    'id'=>$product_id,
                    'name' => $product_name,
                    'price' => $product_price,
                    'quantity' => $product_quantity,
                    'shipping' => $product_shipping,
                    'shipping_type' => $product_shipping_type,
                    'image' => $product_image,

                    'shipping_id'=>$shipping_id,
                    'email'=>$email,
                    'phone'=>$phone,
                    'country'=>$country,
                    'state'=>$state,
                    'address'=>$address,

                ],
                'customer' => [
                    'first_name' => $name,
                    'last_name'=> $lastname,
                    'email' => $email,
                    'phone' => [
                        'country_code' => '971',
                        'number' => $number,
                        ],

                    ],

                'source' => ['id' => 'src_sa.mada'],
                'redirect'=> ['url' =>'http://localhost:8000/order/'.$store.'/chargeupdate'],
                ],

        ]);

       $info = json_decode($response->getBody(), true);

        return $info['transaction']['url'];
    }

    public function validateRequest($id){

            $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.env('Mada_Secret_API_Key')
        ];

        $response = $client->request('GET', $id,[
            'headers' => $headers,

            ]);
        $info = json_decode($response->getBody(), true);

        return $info;

    }
}

?>
