<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\Profit;
use Session;
use Auth;
use Illuminate\Support\Facades\Mail;
class PaytabsController extends Controller
{
    public function paypage(Store $store){
        $validate = Session::put('charge',[
            $name = \Auth::guard('client')->user()->id,
            $lastname = \Auth::guard('client')->user()->fullname,
            $email = \Auth::guard('client')->user()->email ,
            $phone = \Auth::guard('client')->user()->phone,
        ]);

        $totals =0;
        $cartItems = \Cart::getContent();

        foreach($cartItems as $key => $item){
            $totals += $item->price*$item->quantity + $item->shipping ;
        }
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://secure-global.paytabs.com/payment/request',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => env('Paytabs_server_key')
        ];

        $response = $client->request('POST', 'https://secure-global.paytabs.com/payment/request', [
            'headers' => $headers,
            'form_params' => [
                'profile_id'=>env('Paytabs_profile_id'),
                "tran_type" => "sale",
                "tran_class" => "ecom",
                "cart_currency" => "USD",
                "cart_id"=>"4244b9fd-c7e9-4f16-8d3c-4fe7bf6c48ca",
                "cart_description"=>"Dummy Order 35925502061445345",
                "cart_amount" => $totals,
                'customer_details'=>[
                //'name' => 'asdasda',
                'name'=> 'asdasdsa',
                'email' => 'asdsd@gmail.com',
                //'phone' => '56985116',
            ],
            'return'=>'http://localhost:8000/order/success/'.$store->id,
        ]
        ]);

        return json_encode($response);
    }
}
