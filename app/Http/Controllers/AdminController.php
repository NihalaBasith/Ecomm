<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
  public function product()
  {
    return view ('admin.products');

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
  
  
}
