

<!DOCTYPE html>
<html lang="en">
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
<h1 class="title">Add New Blog</h1>
<div class="text-left mb-3">
            <a href="{{ url('showblogs') }}" class="btn btn-primary">Back</a>
</div>


@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}

</div>
@endif


<form action="{{url('uploadblog')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container-input">
        <label>Title</label>
        <input style=" color:black;" type="text" name="title" placeholder="title" required>

    </div>
    <div class="container-input">
        <label>Author</label>
        <input style=" color:black;" type="text" name="author" placeholder="author" required>

    </div>
    <div class="container-input">
    <label for="description">Content</label>
    <textarea style=" color:black;" name="description" id="description" placeholder="Enter product description" required></textarea>
</div>

    <div class="container-input">
        <label>Upload Photo</label>
        <input style=" color:black;" type="file" name="file" required>

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