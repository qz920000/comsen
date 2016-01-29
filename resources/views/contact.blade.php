@extends('master')
@section('title', 'Contact Us')
@section('content')
       

 <header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Contact Us</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
@if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
    
        <form class="form-horizontal" method="post" >
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
  <div class="well well bs-component">
  
    
    
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<fieldset>

<div class="form-group">
<label for="name" class="col-lg-2 control-label">Name</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
</div>
</div>

<div class="form-group">
<label for="email" class="col-lg-2 control-label">Email</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="email" placeholder="Email" name="email"value="{{ old('email') }}">
</div>
</div>

<div class="form-group">
<label for="subject" class="col-lg-2 control-label">Subject</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="{{ old('subject') }}">
</div>
</div>


<div class="form-group">
<label for="content" class="col-lg-2 control-label ">Message</label>
<div class="col-lg-10">
    <textarea class="form-control" rows="3" id="content" name="content" value="{{ old('content') }}"></textarea>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
               // CKEDITOR.replace( 'content' );
            </script>
            
<span class="help-block"></span>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
    
<button type="submit" class="btn btn-primary">Send</button>
</div>
</div>

<div class="col-lg-10 col-lg-offset-2">
    <span class="glyphicon glyphicon-earphone"> Call us at this number: 800 number</span>
</div>

<div class="col-lg-10 col-lg-offset-2">
   <span class="glyphicon glyphicon-envelope"></span> You can email us at Admin@admin.com
</div>
</fieldset>
</form>
</div>
@endsection