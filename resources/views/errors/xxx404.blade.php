@extends('master')
@section('title', '404 error')
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
                        <p>  <h1 class="page-header">Error Page</h1>                                                
                        <span class="subheading"> The Page you are trying to access does not exist n this server. Please try again</span>
                        </p>
                </div>
        </header>
     </div>
@endsection