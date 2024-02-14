

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
<h1 class="title" style="font-size:50px">Blogs</h1>
<div class="text-left mb-3">
            <a href="{{ url('addblogs') }}" class="btn btn-success">Add New Blog</a>
        </div>

<table style="background-color:grey;">
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}

</div>
@endif
    <tr>
        <td style="padding:20px">Date</td>
        <td style="padding:20px">Title</td>
        <td style="padding:20px">Author</td>
        <td style="padding:20px">Image</td>
        <td style="padding:20px">Update</td>
        <td style="padding:20px">Delete</td>

    </tr>
    @foreach($data as $blog)
    <tr   align="center" style="background-color:black">
    <td>{{ optional(\Carbon\Carbon::parse($blog->date))->format('d-m-Y') }}</td>
        <td>{{ Str::limit($blog->title, 50) }}</td>
        <td >{{$blog ->author}}</td>
        <td ><img height="100" width="100" src="/productimage/{{$blog ->image}}"></td>
        
    </tr>
    @endforeach
</table>






</div>
</div>


</div>
@include('admin.footer')
  </body>
</html>