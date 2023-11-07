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
}
