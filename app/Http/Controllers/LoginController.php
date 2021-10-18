<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Cookie;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index(){
 
        if (Session::get('user')) {

            return Redirect('/admin/dashboard');
           
        }else{

            return view('login-2');

        }
        
    }

    public function dashboard(Request $request){

        if( $request->from != "" && $request->to != ""){

        $orders = Order::join('products','products.id','orders.product_id')
        ->select('orders.*','products.*','orders.created_at as order_created')
        ->whereBetween('orders.created_at', [date_format(date_create($request->from), 'Y-m-d')." 00:00:00", date_format(date_create($request->to), 'Y-m-d')." 23:59:59"])
        ->get();
        
        }else{
            $orders = Order::join('products','products.id','orders.product_id')
            ->select('orders.*','products.*','orders.created_at as order_created')
            ->get();

        }
 
        $products = Product::all();

        return view('index',compact('products','orders'));
    }

    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
        ->where('status',1)
        ->first();  
           
              if ($user){

                if(!Hash::check($request->password, $user->password))
                {

                   return back()->with('error', 'Email or Password is incorrect!'); 

               }
                else{ 

                        if($request->remember_me == 1){
                            Cookie::queue(cookie('email', $request->email, Time()*3600000)); 
                            Cookie::queue(cookie('password', $request->password, Time()*3600000)); 
                            Cookie::queue(cookie('remember', 'checked', Time()*3600000)); 
                        }else{
                            Cookie::queue(cookie('email', '',Time()*1)); 
                            Cookie::queue(cookie('password','', Time()*1)); 
                            Cookie::queue(cookie('remember', '', Time()*1)); 
                        }

                         
                        Session::put('user', $user);
                    
                     //   return view('index')->cookie('email', 'password');
                    
                        return redirect('/admin')->cookie('email', 'password');
                    
            }
           } 
           else{  
           
                return back()->with('error', 'Incorrect Email Address!'); 
            }
 
    }

    public function store(Request $request)
    { 
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
            'email' => 'required',
        ]);
             
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->created_by = Session::get('user')->admin_id;
        $user->save();

        if($user){
            return back()->with('success','user created successfully');
        }else{
            return back()->with('error','Please Provide Complete Information');
        }

        
    }
}
