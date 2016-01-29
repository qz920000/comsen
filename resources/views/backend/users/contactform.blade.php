
<header class="" style="">    
                  <div class="">
                        <p>  <h3 class="page-header">Send a message to {!! $user->name !!}</h3>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>
  
<div class="well well bs-component">
<form class="form-horizontal" method="post" >
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
  
     
    
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="user_to_name" value="{!! $user->name !!}">
<input type="hidden" name="user_to_email" value="{!! $user->email !!}">
<fieldset>

<div class="form-group">
<label for="name" class="col-lg-2 control-label">Name</label>
<div class="col-lg-10">
    <input type="text" class="form-control col-xs-2" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
</div>
</div>

<div class="form-group">
<label for="email" class="col-lg-2 control-label">Email</label>
<div class="col-lg-10">
    <input type="text" class="form-control col-xs-2" id="email" placeholder="Email" name="email"value="{{ old('email') }}">
</div>
</div>


<div class="form-group">
<label for="content" class="col-lg-2 control-label ">Message</label>
<div class="col-lg-10">
    <textarea class="form-control" rows="3" id="content" col-xs-2 name="content" value="{{ old('content') }}"></textarea>
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


</fieldset>
</form>
</div>