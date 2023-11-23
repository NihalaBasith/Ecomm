<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if ($usertype == '1'){
            return view ('admin.home');
        }
        else{
            $data= Product::paginate(3);
            $user=auth()->user();
            $count = Cart::where('phone', $user->phone)->sum('quantity');
            return view ('user.home',compact('data','count'));
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
            $user = auth()->user();
            $product = Product::find($id);
            $quantity = $request->quantity;

            $existingCart = Cart::where('phone', $user->phone)
                ->where('product_title', $product->title)
                ->first();
    
            if ($existingCart) {
                $existingCart->quantity += $quantity;

                $existingCart->price = $product->price * $existingCart->quantity;
    
                $existingCart->save();
            } else {
                $cart = new Cart;
    
                $cart->name = $user->name;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_title = $product->title;
                $cart->quantity = $quantity;
                
                $cart->price = $product->price * $quantity;
    
                $cart->save();
            }
    
            return redirect()->back()->with('message','Successfully added to Cart!');
        } else {
            return redirect('login');
        }
    }
    

     



    public function showcart(){
        $user=auth()->user();
        $count=Cart::where('phone',$user->phone)->sum('quantity');
        $cart=Cart::where('phone',$user->phone)->get();
        $grandTotal = $cart->sum('price');
        return view ('user.showcart',compact('count','cart','grandTotal'));

}
public function deletecartitem($id){
    $data=Cart::find($id);
    $data->delete();

    return redirect()->back()->with('message','Successfully Deleted!');

}
public function confirmorder(Request $request){
    $user=auth()->user();
    $name =$user->name;
    $phone =$user->phone;
    $address =$user->address;

    foreach($request->productname as $key => $productName) {
        $order = new Order;
        $order->product_name= $request->productname[$key];
        $order->quantity= $request->quantity[$key];
        $order->price= $request->price[$key];
        $order->name=$name;
        $order->phone=$phone;
        $order->address=$address;
        $order->status='Not Delivered';
        $order->save();

}     
    DB::table('Carts')->where('phone',$phone)->delete();

    return redirect()->back()->with('message','Order Placed Successfully !');
}
}