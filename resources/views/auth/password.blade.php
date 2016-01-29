@extends('master')
@section('name', 'Reset password')
@section('content')

      <header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Reset Password</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>

    @if (session('status'))
      <div class="alert alert-success">
             {{ session('status') }}
      </div>
    @endif

    @if (count($errors) > 0)
       <div class="alert alert-danger">
       <strong>Whoops!</strong> There were some problems with your input.<br><br>
       <ul>
           @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
           @endforeach
        </ul>
        </div>
      @endif

<div class="well well bs-component">
<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('get_reset_password') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label class="col-md-4 control-label">E-Mail Address</label>
<div class="col-md-6">
<input type="email" class="form-control" name="email" value="{{ old('email') }}">
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
         Send Password Reset Link
</button>
</div>
</div>
</form>
</div>
@endsection