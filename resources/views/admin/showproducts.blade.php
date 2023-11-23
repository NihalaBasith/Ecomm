

<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.header')
  </head>

  <body>
  <div class="container-scroller">
  @include('admin.body')
@include('admin.sidebar')

@include('admin.navbar')
<div style="padding-bottom:30px" class="container-fluid page-body-wrapper">
<div class="container" align="center">
<h1 class="title" style="font-size:50px">Products</h1>
<table style="background-color:grey;">
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}

</div>
@endif
    <tr>
        <td style="padding:20px">Title</td>
        <td style="padding:20px">Description</td>
        <td style="padding:20px">Quantity</td>
        <td style="padding:20px">Price</td>
        <td style="padding:20px">Image</td>
        <td style="padding:20px">Update</td>
        <td style="padding:20px">Delete</td>

    </tr>
    @foreach($data as $product)
    <tr   align="center" style="background-color:black">
        <td >{{$product ->title}}</td>
        <td>{{$product ->description}}</td>
        <td >{{$product ->quantity}}</td>
        <td>{{$product ->price}}</td>
        <td ><img height="100" width="100" src="/productimage/{{$product ->image}}"></td>
        <td>
            <a class="btn btn-primary" href="{{url('updateproduct',$product ->id)}}">Update</a>
        </td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item ??')" href="{{url('deleteproduct',$product ->id)}}">Delete</a>
        </td>

    </tr>
    @endforeach
</table>






</div>
</div>


</div>
@include('admin.footer')
  </body>
</html>