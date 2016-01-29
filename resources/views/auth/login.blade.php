@extends('master')
@section('name', 'Login')
@section('content')


     <header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Login</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

    @if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
 @foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach

 
   

<div class="well well bs-component">

<form role="form" method="post">
    {!! csrf_field() !!}
  <div class="form-group">
         <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
   <button type="submit" class="btn btn-primary">Login</button>
<a href={{ URL::route('get_reset_password') }}>Reset Password</a>
</form>




</div>
    

@endsection