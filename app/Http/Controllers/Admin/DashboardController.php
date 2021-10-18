<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Cookie;
use DB;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    public function orders(){
       $orders = Order::select('customers.*','customers.name as customer_name','customers.order_number as order_number','orders.*','products.*','orders.id as order_id','orders.status as order_status','products.name as product_name','products.id as product_id')
       ->join('products','products.id','orders.product_id')
       ->join('customers','customers.id','orders.customer_id')
       ->where('orders.status','<',5)
       ->get();
       
        return view('orders',compact('orders'));

    }
    public function canceled(){
        $orders = Order::select('orders.*','products.*','orders.id as order_id','orders.status as order_status','products.name as product_name','products.id as product_id')
        ->join('products','products.id','orders.product_id') 
        ->where('orders.status',5)
        ->get();
 
         return view('orders',compact('orders'));
 
     }

    public function update_status(Request $request){
        
        $result = DB::table('orders')
              ->where('id', $request->order_id)
              ->update(['status' => $request->status ]);
        return $result;
    }

    public function update_password(Request $request){

        $user_id = Session::get('user')->admin_id; 
        $db_password = Session::get('user')->password; 
        $form_password = $request->password; 
        $old_password = $request->old_password; 
       $rules = [
                    'password' => 'required',
                    'old_password' => 'required',
                    'username' => 'required',
                    'email' => 'required'
                ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails() ) {
              
            return 0;

        }else{

                $status = DB::table('admin_users')
                ->where('admin_id', $user_id)
                ->update([
                    'password' =>  Hash::make($form_password),
                    'username' =>$request->username,
                    'email' =>$request->email
                ]); 

           if( $status){
                return 1;
           } 
           
        }
       
        
    }

}
