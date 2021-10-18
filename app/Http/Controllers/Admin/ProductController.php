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
use App\Models\Color;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    
    //
    public function products(){
        $products = Product::where('products.status','<',5)->take(30)->get();
        

        return view('products',compact('products'));

    }
    public function update_status(Request $request){
        
        $result = DB::table('products')
              ->where('id', $request->product_id)
              ->update(['status' => $request->status ]);

        return $result;
    }

    public function new(){
        $categories = Category::all();

        return view('new_product',compact('categories'));
    }
    public function store(Request $request){

        $imageName1 = "";
        $imageName2 = "";
        $imageName3 = "";

        if($request->file('image1')){
            $imageName1 = Session::get('user')->id."-".time().'.'.$request->image1->extension();  
			$request->image1->move(public_path('products'), $imageName1);

        }
        if($request->file('image2')){
            $imageName2 = Session::get('user')->id."-".time().'.'.$request->image2->extension();  
			$request->image2->move(public_path('products'), $imageName2);

        }
        if($request->file('image3')){
            $imageName3 = Session::get('user')->id."-".time().'.'.$request->image3->extension();  
			$request->image3->move(public_path('products'), $imageName3);

        }
 
      $product_id = DB::table('products')->insertGetId(
        [
            'image_1'=> $imageName1,
            'image_2'=> $imageName2,
            'image_3'=> $imageName3, 
            'category_id'=> $request->category,
            'name'=>  $request->name,
            'price'=>  $request->price,
            'inventory'=>  $request->inventory,
            'description'=>  $request->description,
            'slug' => str_slug( $request->name, "-"),

        ]
    );
        /*
        $data = Product::create([

            'image_1'=> $imageName1,
            'image_2'=> $imageName2,
            'image_3'=> $imageName3, 
            'category_id'=> $request->category,
            'name'=>  $request->name,
            'price'=>  $request->price,
            'inventory'=>  $request->inventory,
            'description'=>  $request->description

        ]);
        */
        return back()->with("success","Product Inserted");
         
    }


}
