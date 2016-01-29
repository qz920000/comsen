@extends('master')
@section('title', 'Update post')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Add Update to Post</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

 
@if(session('status'))
<div class="alert alert-success">
    
<h3 class="header">{{ session('status') }}</h2>
</div>
@endif
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach


  <div class="post-preview">
      
<h2 class="header">{!! $post->title !!}</h2>
@foreach( $images as $image )

    <div class="table table-bordered bg-success">
 <img src="{!! asset('/images/'.$image->filePath) !!}" alt="" class="img-responsive" height="auto" width="100%" />

<br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
</div>
@endforeach

<em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
          by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
<p> {!! $post->content !!} </p>



@foreach($updp as $updatepost)

    <h4 class="header">Post Update</h4>
  <span class="text-right"><em>updated added on {{ $updatepost->created_at->format('M jS Y g:ia') }}</em>
      by {!! $post->username !!}</span>
<div class="content">
{!! $updatepost->content !!}
</div>

@endforeach
<div>
<legend></legend>
<p><h4>Add Update</h4>
<div class="well well bs-component">
    
<form class="form-horizontal" method="post" action={{ URL::route('updateposts'), $post->id }}>
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach



<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="post_id" value="{!! $post->id !!}">
<input type="hidden" name="post_type" value="App\Post">
<fieldset>
<div class="form-group">
<div class="col-lg-12">
<textarea class="form-control" rows="3" id="content" name="content"></textarea>
</div>
</div>
<div class="form-group">
<div >

<button type="submit" class="btn btn-primary">Update Post</button>
</div>
</div>
</fieldset>
</form>
    
</div></p>

<h4>Add Image</h4>  
@if( $images->count() < 2 )
<div class="well well bs-component">      

    
      <form class="form-inline" action="{{route('uploadimage', [])}}" method="post" enctype="multipart/form-data" role="form">
          <div class="form-group">
    <label for="image"></label>
   
    <input type="file"  class="form-control" name="image">
  </div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{!! $post->id !!}">
        
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>
    </div>
@else
  
   <div class="quote"><p>You have uploaded the maximum number of images.!<br>
           You can delete some images</p></div>
@endif

</div>
</div>
@endsection