<?php

namespace App\repostory;
use GuzzleHttp\Client;
use App\Models\Store;
use App\Http\Requests;
use Session ;
class orderRepostory{

    public function getChargeRequest($lastname,$name, $email, $number , $store){
        $totals =0;
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
        }
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'
        ];

        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
            'headers' => $headers,
            'form_params' => [
                'amount' => $totals,
                'currency' => 'USD',

                'customer' => [
                    'first_name' => $name,
                    'last_name'=> $lastname,
                    'email' => $email,
                    'phone' => [
                        'country_code' => '971',
                        'number' => $number,
                    ]
                    ],

                'source' => ['id' => 'src_sa.mada'],
                'redirect'=> ['url' =>'http://localhost:8000/order/'.$store.'/chargeupdate'],
                ],

        ]);


       $info = json_decode($response->getBody(), true);

        return $info['transaction']['url'];
    }

    public function validateRequest($id,$cartItems,$totals){

        $client = \Auth::guard('client')->user('id');
        $totals = \Cart::getTotal();
        $cartItems = \Cart::getContent();

            $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'
        ];

        $response = $client->request('GET', $id,[
            'headers' => $headers,
            ]);
        $info = json_decode($response->getBody(), true);

        return $info;

    }
}

?>
