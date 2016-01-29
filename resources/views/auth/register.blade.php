@extends('master')
@section('name', 'Register')
@section('content')




<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Register an account</h1>                                                
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
    <fieldset>
        {!! csrf_field() !!}
<div class="form-group">
<label for="name" class="col-lg-2 control-label">UserName</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
</div>
</div>

<div class="form-group">
<label for="email" class="col-lg-2 control-label">Email</label>
<div class="col-lg-10">
<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
</div>
</div>
<div class="form-group">
<label for="password" class="col-lg-2 control-label">Password</label>
<div class="col-lg-10">
<input type="password" class="form-control" name="password">
</div>
</div>
<div class="form-group">
<label for="password" class="col-lg-2 control-label">Confirm password</label>
<div class="col-lg-10">
<input type="password" class="form-control" name="password_confirmation">
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="reset" class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</fieldset>
</form>
</div>

@endsection