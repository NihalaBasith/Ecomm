

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
<h1 class="title" style="font-size:50px">Orders</h1>
<table style="background-color:grey;">
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}

</div>
<script>
        setTimeout(function(){
            location.reload();
        }, 3000); 
    </script>
@endif
    <tr>
        <td style="padding:20px">Name</td>
        <td style="padding:20px">Phone</td>
        <td style="padding:20px">Address</td>
        <td style="padding:20px">Product</td>
        <td style="padding:20px">Quantity</td>
        <td style="padding:20px">Price</td>
        <td style="padding:20px">status</td>
        <td style="padding:20px">Action</td>

    </tr>
    @foreach($data as $order)
    <tr   align="center" style="background-color:black">
    <td style="padding:20px" >{{$order ->name}}</td>
    <td  style="padding:20px">{{$order ->phone}}</td>
    <td  style="padding:20px">{{$order ->address}}</td>
        <td style="padding:20px" >{{$order ->product_name}}</td>
        <td style="padding:20px">{{$order ->quantity}}</td>
        <td style="padding:20px">{{$order ->price}}</td>
        <td style="padding:20px">{{$order ->status}}</td>
       <td style="padding:20px">
       @if($order->status != 'Delivered')
        <a class="btn btn-success" href="{{url('updatestatus', $order->id)}}">Delivered</a>
    @endif
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