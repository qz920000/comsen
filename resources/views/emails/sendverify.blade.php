@extends('master')
@section('name', 'Resend Email Verification')
@section('content')
<div class="container col-md-6 col-md-offset-3">
<div class="well well bs-component">

    
    <div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Send Email Verification </div>
<div class="panel-body">
    @if (session('status'))
      <div class="alert alert-success">
             {{ session('status') }}
      </div>
    @endif
   {{ 'usera' }} lllll;xccc
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

<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('send_link') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="email" value="{{ $email }}">

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
         Send Verification Link 
</button>
    {{ $email}}
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>

    
    
</div>
</div>
@endsection