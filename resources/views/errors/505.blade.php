@extends('master')
@section('title', 'Unauthorized')
@section('content')

  @foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
    
     <div class="post-preview  text-center">
     <header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Unauthorized</h1>                                                
                        <span class="subheading"> You are not authorized to view this page</span>
                        </p>
                </div>
        </header>
     </div>
@endsection