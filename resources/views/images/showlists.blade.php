@extends('master')
@section('title', 'About')
@section('content')
<div class="container">
<div class="content">
<div class="title">Image Upload Page</div>
<div class="quote">Image upload page!</div>



<h1 class="well well-lg">Upload Image</h1>
    <h1 class="well well-lg">All Image List</h1>
@foreach( $images as $image )
    <div class="table table-bordered bg-success"><a href="{!! 'images/'.$image->filePath !!}">{{$image->filePath}}</a>
    
    </div>
<img src="{!! 'images/'.$image->filePath !!}" alt="ALT NAME" class="img-responsive" height="200" width="200" />

@endforeach



</div>
</div>
@endsection