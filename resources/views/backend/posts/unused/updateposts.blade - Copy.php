@extends('master')
@section('title', 'Update post')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
<div class="content">
<h2 class="header">{!! $post->title !!}</h2>

@foreach( $images as $image )

    <div class="table table-bordered bg-success"><a href="{!! url('/').'/images/'.$image->filePath !!}">{!! asset('/images/'.$image->filePath)!!}</a>   
 <a href="{!! URL::route('listimage'), $image->filePath !!}">{{$image->filePath}}</a>   
 <img src="{!! URL::route('listimage'),$image->filePath !!}" alt="ALT NAME" class="img-responsive" height="200" width="200" />
 <img src="{!! asset('/images/'.$image->filePath) !!}" alt="ALT NAME" class="img-responsive" height="auto" width="100%" />
<a href="{!! URL::route('listimage'), $image->filePath !!}">{{$image->filePath}}</a> 
<br><a href="{!! URL::route('listimage'), $image->id !!}">Delete Image {{$image->id}}</a>
</div>
@endforeach

<em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
          by {!! $post->username !!} -- p count is:{!! $post::with("id")->count() !!} --- img count is:{!! $images->count() !!} 
<p> {!! $post->content !!} </p>

</div>
<div class="clearfix"></div>
</div>
@foreach($updp as $updatepost)
<div class="well well bs-component">
<div class="content">
{!! $updatepost->content !!}
</div>
</div>
@endforeach
<div class="well well bs-component">
<form class="form-horizontal" method="post" action={{ URL::route('updateposts'), $post->id }}>
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif


<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="post_id" value="{!! $post->id !!}">
<input type="hidden" name="post_type" value="App\Post">
<fieldset>
<legend>Update Post</legend>

<div class="form-group">
<div class="col-lg-12">
<textarea class="form-control" rows="3" id="content" name="content"></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="reset" class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-primary">Post</button>
</div>
</div>
</fieldset>
</form>
  @if( $images->count() < 3 )
  
 

    
     
      <form action="{{route('uploadimage', [])}}" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{!! $post->id !!}">
        <input type="submit">
    </form>
@else
   <div class="title">Upload Image </div>
   <div class="quote">You have uploaded the maximum number of images.!<br>
   You can delete some images</div>
@endif
</div>
</div>
@endsection