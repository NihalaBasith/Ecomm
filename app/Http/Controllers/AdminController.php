<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blogs;

class AdminController extends Controller
{
  public function product()
  {
    if (Auth::id()){
      if(Auth::user()->usertype=="1"){
        return view ('admin.products');

      } 
      else {
        return redirect()->back();
      }
      

    }
    else{
      return redirect('login');
    }


  }
  public function uploadproduct(Request $request)
  {
   $data = new product;

   $image = $request->file('file');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $request->file('file')->move('productimage', $imagename);
    $data->image = $imagename;

    $data->title = $request->input('title');
    $data->price = $request->input('price');
    $data->description = $request->input('description');
    $data->quantity = $request->input('quantity');
    $data->save();

   return redirect()->back()->with('message','Product added Successfully!');
   
   

  }

  public function showproduct()
  {
    $data= Product::all();
    return view ('admin.showproducts',compact('data'));

  }
  public function deleteproduct($id)
  {
    $data= Product::find($id);
    $data->delete();
    return redirect()->back()->with('message','Product deleted Successfully!');

  }
  public function updateproduct($id)
  {
    $data= Product::find($id);

    return view ('admin.updateproducts',compact('data'));

  }
  public function updateoldproduct(Request $request ,$id)
  {
    $data= Product::find($id);
    $image = $request->file('file');
    if($image){
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->file('file')->move('productimage', $imagename);
      $data->image = $imagename;

    }
 

    $data->title = $request->input('title');
    $data->price = $request->input('price');
    $data->description = $request->input('description');
    $data->quantity = $request->input('quantity');
    $data->save();

    return redirect()->back()->with('message','Product updated Successfully!');

  }
  public function showorders()
  {
    $data= Order::all();
    return view ('admin.showorders',compact('data'));

  }
  public function updatestatus($id)
  {
    $order= Order::find($id);
    $order->status='Delivered';
    $order->save();
    return redirect()->back()->with('message','Order Delivered Successfully!');
    

  }

 

  public function  Addblogs()
  {
    if (Auth::id()){
      if(Auth::user()->usertype=="1"){
        return view ('admin.Addblogs');
  
      } 
      else {
        return redirect()->back();
      }
      
  
    }
    else{
      return redirect('login');
    }

  }
  

  public function  uploadblog(Request $request)
  {
    $data = new blogs;

    $image = $request->file('file');
     $imagename = time() . '.' . $image->getClientOriginalExtension();
     $request->file('file')->move('productimage', $imagename);
     $data->image = $imagename;
 
     $data->title = $request->input('title');
     $data->author = $request->input('author');
     $data->description = $request->input('description');
     $data->save();
 
    return redirect()->back()->with('message','Product added Successfully!');

  }
  public function  showblogs()
  {
    $data= blogs::all();
    return view ('admin.showblogs',compact('data'));
    

  }
  
 
}
