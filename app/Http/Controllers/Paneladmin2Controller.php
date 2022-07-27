<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paneladmin;
use App\models\User;
Use App\Models\Store;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;
use App\Models\Categury;
use App\repostory\PaneladminRepostory;

class Paneladmin2Controller extends Controller
{
    public function product_pendding(){
        $products = Product::where('review', 0 )->orderBy('created_at','desc')->paginate(50);
        return view('admin.backend.product_pendding',compact('products'));
    }

    public function product_delete(Product $product){
        if($product->delete()){
            flash('The product has been deleted successfully')->success();
        }else{
            flash('Something is wrong try again')->error();
        }
        return back();
    }

    public function product_edit(Product $product){
        $categury = Categury:: where('store_id', $product->store_id)->get();
        return view('admin.backend.edite_product',compact('product','categury'));
    }

    public function update_product(Product $product,Store $store){

        $datavalidation= request()-> validate([
            'name'=>'required|min:4',
            'price'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:10000',
            'gallery.*'=>'mimes:jpeg,png,jpg|max:10000',
            'discription'=>'required',
        ]);
        if(request()->hasFile('image')){
        $path='/storage/'.request()->file('image')->store('image_cat',['disk'=>'public']);
    }else{
        $path = $product->image;
    }

        $path2=array();
        $galleries = request()->gallery;
        if(count($galleries) > 0){
        for($i=0 , $imax = count($galleries) ; $i < $imax ; $i++){
        $path2[$i]='/storage/'.$galleries[$i]->store('image_cat',['disk'=>'public']);
        }
    }

        $product->name = request()->name;
        $product->price = request()->price;
        $product->discount = request()->discount;
        $product->image = $path;
        $product->gallery = $path2;
        $product->discription = request()->discription;
        $product->ship = request()->ship;
        $product->shipping_type = request()->shipping_type;
        $product->shipping_cost = request()->shipping_cost;
        $product->Inventory = request()->Inventory;
        $product->discription_long = request()->discription_long;
        $product->feature = request()->feature;
        $product->unity = request()->unity;
        $product->qyt = request()->qyt;
        $product->cat_id = request()->cat_id;
        $product->bloack = request()->block ;

        if(empty(request(['block'])))
            $product->bloack = 0;

        if(isset(request()->review)){
            $product->review = 0 ;
        }else{
            $product->review = 1 ;
        }

        if(empty(request(['feature']))){
            $product->feature='0';
        }else{
            $product->feature='1';
        }

        if(empty(request(['best']))){
            $product->best_sellary = '0';
        }else{
            $product->best_sellary = '1';
        }

        if(request('shipping_type') == ['free']){
            $product->shipping_cost = 0;
        }


        if($product->save()){
            flash('Product updated successfully')->success();
        }else{
            flash('Something went wrong, try again')->warning();
        }

        return redirect()->route('admin.productpendding');

    }

    public function product_publish(){
        $products = Product::where([
                    ['review',1],
                    ['bloack',0]
            ])->orderBy('created_at','desc')->paginate(50);
        return view('admin.backend.product_publish',compact('products'));
    }

    public function product_bloack(){
        $products = Product::where('bloack', 1 )->orderBy('created_at','desc')->paginate(50);
        return view('admin.backend.product_pendding',compact('products'));
    }

    public function all_order(){

        if(request()->ajax()){
                $sort = '';
                if(request()->sort != null){
                $sort = request()->sort;
        }

            if($sort == 'all'){
                $order = Order::orderBy('created_at','desc')->paginate(50);
            }elseif($sort == 'Deliverd'){
                $order = Order:: where('shipping','delivered')->orderBy('created_at','desc')->paginate(50);

            }elseif ($sort == 'Way') {
                $order = Order:: where('shipping','On the way')->orderBy('created_at','desc')->paginate(50);
            }elseif ($sort == 'Success') {
                $order = Order:: where('status','succeeded')->orderBy('created_at','desc')->paginate(50);
            }

            return view ('admin.backend.modules.order_ajax',compact('order'));
        }

        $order = Order::orderBy('created_at','desc')->paginate(50);
        return view('admin.backend.all_order',compact('order'));
    }


}
