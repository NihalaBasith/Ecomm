<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <title>Sixteen Clothing HTML Template</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>


    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  



    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
              @if (Route::has('login'))
  
                    @auth
                    <li class="nav-item">
                <a class="nav-link active" href="{{url('showcart')}}"><i class="fas fa-shopping-cart" style="color: #c80913;"></i>Cart[{{$count}}]</a>
              </li>
                        <x-app-layout>
                        </x-app-layout>
                    @else
                    <li> <a class="nav-link" href="{{ route('login') }}" >Log in</a></li>

                        @if (Route::has('register'))
                        <li>   <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth

            @endif
            </li>
            </ul>
          </div>
        </div>
      </nav>

    </header>

    <div style=" padding:100px" align="center">


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

<form action="{{url('order')}}" method="POST">
  @csrf

    <table >

    <tr >
        <td style="padding:20px;">Product</td>
        <td style="padding:20px">Quantity</td>
        <td style="padding:20px">Price</td>
        <td style="padding:20px;">Action</td>
        <td style="padding:20px"></td>

    </tr>
    @foreach($cart as $carts)
    <tr   align="center">
        <td >
          <input type="text" name="productname[]" value="{{$carts ->product_title}}" hidden="">
          {{$carts ->product_title}}</td>

        <td > <input type="number" name="quantity[]" value="{{$carts ->quantity}}" hidden="">{{$carts ->quantity}}</td>
        <td><input type="number" name="price[]" value="{{$carts ->price}}" hidden="">{{$carts ->price}}</td>
        <td><a class="btn btn-danger" href="{{url('deleteitem',$carts->id)}}">Delete</a></td>
        <td><a class="btn btn-primary" href="">Update</a></td>



    </tr>
   
    @endforeach
    
</table><br>
<tr align="center"><td class="btn btn-primary">Grand Total = {{$grandTotal}} AED</td></tr><br>
<div class="confirm-class" style="padding-top:20px">

<button class="btn btn-success">Confirm Order</button></div>
      </form>

</div>

    
 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
