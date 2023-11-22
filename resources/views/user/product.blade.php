

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
              
              <form action="{{url('search')}}" method="get" class="form-inline" style="float:right;padding:10px">
              @csrf
              <input class="form-control" name="search" type="search" placeholder="Search">
              <input class="btn btn-success" type="submit" value="Search" >

              </form>
            </div>
          </div>


       @foreach($data as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="/productimage/{{$product->image}}" alt="" width="400" height="300"></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>{{$product->price}}</h6>
                <p>{{$product->description}}</p>
                <form action="{{url('addtocart',$product->id)}}" method="post">
                  @csrf
                  <input type="number" value="1" min="1" class="form-control" style="width:80px" name="quantity"><br>
                  <input class="btn btn-primary" value="Add To Cart" type="submit">

                </form>
              </div>
            </div>
          </div>
        @endforeach
        @if(method_exists($data,'links'))
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}

        </div>
        @endif
        </div>
  
      </div>
    </div>