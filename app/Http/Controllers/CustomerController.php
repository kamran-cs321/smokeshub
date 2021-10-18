<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::where('deleted',0)->get();

        return view('customers',compact('customers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //soft delete 
        // $customer = Customer::find($request->customer_id);

        // $customer->status = $request->status;

        // $customer->save();
        $result = Customer::where('id', $request->customer_id)
                ->update(['deleted' => $request->status]);
        if($result > 0){
            return 1;
        }else{
            return 0;
        }
        

    }

    public function show_orders(Request $request){
        $customer_orders = Customer::join('orders','orders.customer_id','customers.id')
        ->join('products','products.id','orders.product_id')
        ->where('customers.deleted',0)
        ->where('customers.id', $request->customer_id  )
        ->get();
    //    dd($customer_orders);
//incomplete
        return view('ajax.customer_orders_info',compact('customer_orders'));

    }

    public function messages()
    {
        //contact_us
        $messages =  DB::table('contact_us')->get();
       

        return view('messages',compact('messages'));
        
    }
}
