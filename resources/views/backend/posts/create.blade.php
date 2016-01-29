@extends('master')
@section('title', 'Create A New Post')
@section('content')
<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Create a new post</h1>                                                
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
<input type="hidden" name="formtype" value="new">
<fieldset>

<div class="form-group">
<label for="title" class="col-lg-2 control-label">Title</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
</div>
</div>

<div class="form-group">
<label for="content" class="col-lg-2 control-label">Content</label>
<div class="col-lg-10">
<textarea class="form-control" rows="6" id="content"name="content" >{{ old('content') }}</textarea>
</div>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
</div>

<div class="form-group">
<label for="tags" class="col-lg-2 control-label">Tags</label>
<div class="col-lg-10">
<textarea class="form-control" rows="2" id="tags"name="tags" value="">{{ old('tags') }}</textarea>
</div>
</div>


<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">

<button type="submit" name="save" value="savedraft" class="btn btn-primary" >Save Draft/Preview</button>
<button type="submit" name="save" value="publish" class="btn btn-primary">Publish Post</button>
</div>
</div>
</fieldset>
</form>
</div>
@endsection