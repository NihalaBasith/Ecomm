<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if ($usertype == '1'){
            return view ('admin.home');
        }
        else{
            $data= Product::paginate(3);
            return view ('user.home',compact('data'));
        }

    }
    public function index(){
        if (Auth::id()){
            return view ('redirect');
        }
        else {
            $data= Product::paginate(3);
            return view ('user.home',compact('data'));

        }
      


    }
    public function search(Request $request){

        $search = $request->input('search');
        if($search==''){
            $data= Product::paginate(3);
            return view ('user.home',compact('data'));

        } 
        $data=Product::where('title','like','%'.$search.'%')->get();
        return view ('user.home',compact('data'));



    }
    public function addtocart(Request $request, $id){
        if(Auth::id()){
            $user=auth()->user();
            $product = Product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart-> address = $user->address;
            $cart->product_title =$product->title;
            $cart->quantity =$request->quantity;
            $cart->price =$product->price;
            $cart->save();

            return redirect()->back()->with('message','Successfully added to Cart!');
        }
        else{
            return redirect('login');
        }

     

    }

}
