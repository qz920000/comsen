@extends('master')
@section('title', 'Edit A Post')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Edit post</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif



  <div class="well well bs-component">
<form class="form-horizontal" method="post">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="formtype" value="edit">
<fieldset>

<div class="form-group">
<label for="title" class="col-lg-2 control-label">Title</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}">
</div>
</div>
<div class="form-group">
<label for="content" class="col-lg-2 control-label">Content</label>
<div class="col-lg-10">
<textarea class="form-control" rows="6" id="content"name="content">{!! $post->content !!}</textarea>
</div>
</div>

<div class="form-group">
<label for="tags" class="col-lg-2 control-label">Tags</label>
<div class="col-lg-10">
    <textarea class="form-control" rows="2" id="tags"name="tags">{!! $post->tagtext !!}</textarea>
</div>
</div>


<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">

 <a href="{{ URL::route('home') }}" class="btn btn-default btn-raised">Do this later</a>
<button type="submit"  class="btn btn-primary" >Update Post</button>

</div>
</div>


</fieldset>
</form>
  </div>
@endsection