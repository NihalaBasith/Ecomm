

<!DOCTYPE html>
<html lang="en">
<base href="/public">
  <head>
  @include('admin.header')
 
  </head>
  <style>

    .title{
        color:white; 
        padding-top:25px;
        font-size:25px;

    }
    .container-input{
        padding-top:10px
    }
    label{
        display:inline-block;
        width:200px
    }
    input{
        width:400px;
        color:black;
    }
    textarea{
        display:inline-block;
        width:400px

    }
 

  </style>
  <body>
  <div class="container-scroller">
  @include('admin.body')
@include('admin.sidebar')

@include('admin.navbar')
<div class="container-fluid page-body-wrapper">
<div class="container" align="center">
<h1 class="title">Update Product</h1>


@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}

</div>
@endif


<form action="{{url('updateoldproduct',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container-input">
        <label>Product Name</label>
        <input style=" color:black;" type="text" name="title" value="{{$data->title}}" required>

    </div>
    <div class="container-input">
        <label>Price</label>
        <input style=" color:black;" type="number" name="price" value="{{$data->price}}" required>

    </div>
    <div class="container-input">
    <label for="description">Product Description</label>
    <input style=" color:black;"  name="description" id="description" value="{{$data->description}}" required>
    <!-- <textarea style=" color:black;" name="description" id="description" value="{{$data->description}}" required></textarea> -->
</div>
    <div class="container-input">
        <label>Quantity</label>
        <input style=" color:black;"  type="text" name="quantity" value="{{$data->quantity}}" required>

    </div>
    <div style="padding:15px" class="container-input">
        <label>Old Photo</label>
        <img height="100" width="100" src="/productimage/{{$data->image}}">
       

    </div>
    <div class="container-input">
        <label>Change Photo</label>
        <input style=" color:black;" type="file" name="file" >

    </div>
    <div class="container-input button">

        <input class="btn btn-success" style="width:100px" type="submit">

    </div>

</form>
</div>
</div>


</div>
@include('admin.footer')
  </body>
</html>