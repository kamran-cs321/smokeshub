<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Cookie;
use DB;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::where('status','!=',3)->take(20)
        ->get();
        
        $categories = Category::all();
        return view('store.index',compact('products','categories'));
    }

    public function products(){
        $products = Product::where('products.status','<',5)->get();
        
        $colors = Color::all();
        $categories = Category::all();

        return view('store.products',compact('products','colors','categories'));

    }

    public function search_products(Request $request){
        $products = Product::where('status','!=',3)
        ->where('name','like','%'.$request->name.'%')
        ->get();
        
        $categories = Category::all();
       
        return view('store.ajax.search',compact('products','categories'));



    }

    public function order_now( Request $request){

        $customer_id = DB::table('customers')->insertGetId(
            [
                'name'=> $request->username, 
                'contact'=> $request->phone, 
                'order_number'=> $request->order_number, 
                'city'=> $request->city, 
                'address'=> $request->address, 
            ]
        );

        for ($i=0; $i < sizeof($request->product_id) ; $i++) { 
            # code...
              
             
        $order_id = DB::table('orders')->insertGetId(
            [
                'order_number'=> $request->order_number, 
                'quantity'=> $request->quantity[$i], 
                'product_id'=> $request->product_id[$i],  
                'customer_id' => $customer_id ,
            ]
        );
 
       }
       Session::forget('cart');

       return redirect('/')->with('Success','Order Has been Placed');
        

    }

    public function add_To_Cart($product_id){

        $product = Product::findOrFail($product_id);

        $cart = session()->get('cart', []);
        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "product_id" => $product_id,
                "image" => $product->image_1
            ];
        }
        session()->put('cart', $cart);
 
        return 1;

    }
    
    public function remove_product_Cart($product_id){
//  incomplete
        // foreach (session()->get('cart') as $keys =>$values){

        //     if($values["product_id"] == $product_id){

        //         unset(session()->get('cart')[$product_id]);
        //         session()->put('cart', session()->get('cart'));
        //     return session()->get('cart');
        //     return 1;
        //     }
        // }
        // return 0;
        $cart = session()->get('cart');

        if(isset($cart[$product_id])) {

            unset($cart[$product_id]);

            session()->put('cart', $cart);
            return 1;
        }
    //    session()->flash('success', 'Product removed successfully');
    

    }
    
    public function remove_from_Cart($product_id){

        $product = Product::findOrFail($product_id);

        $cart = session()->get('cart', []);
        if(isset($cart[$product_id])) {

            $cart[$product_id]['quantity']--;

        } else {
            // $cart[$product_id] = [
            //     "name" => $product->name,
            //     "quantity" => 1,
            //     "price" => $product->price,
            //     "product_id" => $product_id,
            //     "image" => $product->image_1
            // ];
        }
        session()->put('cart', $cart);
 
        return 1;

    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image1
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    
    public function show_Cart(){
        
        $categories = Category::all();

        return view('store.ajax.show_cart',compact('categories'));

    }

    public function show_product_info(Request $request){
        $product = Product::findOrFail($request->product_id);

        return view('store.ajax.product_detail_info',compact('product'));

    }
    public function product_info($slug){

        $product = Product::where('slug',$slug)->first();

        return view('store.product_details',compact('product'));

    }

    public function checkout(){
        $categories = Category::all();

        return view('store.shoping-cart',compact('categories'));

    }
    public function order_view(){
        $categories = Category::all();

        return view('store.checkout-cart',compact('categories'));

    }
    

    public function subscribe(Request $request){

       
        $subscriber_id = DB::table('subscribers')->insertGetId(
            [
                'email'=> $request->email, 
            ]
        );

        if($subscriber_id > 0){
            return 1;
        }else{
            return 0;
        }
 
    }

    public function contact(Request $request){

       
        $subscriber_id = DB::table('contact_us')->insertGetId(
            [
                'name'=> $request->username,
                'email'=> $request->user_email, 
                'phone'=> $request->user_phone, 
                'message'=> $request->user_message, 
            ]
        );

        if($subscriber_id > 0){
            return 1;
        }else{
            return 0;
        }
 
    }


    public function show_category_product($category){

        $products = Product::select('products.*','categories.*','categories.name as cate_name','products.name as name','categories.id as cate_id','products.id as id')->join('categories','categories.id','products.category_id')
        ->where('products.status','!=',3)
        ->where('categories.name','like','%'.$category.'%')
        ->get();
        $categories = Category::all();

        return view('store.products',compact('products','categories'));
      
    }
}
