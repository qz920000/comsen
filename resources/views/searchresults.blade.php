@extends('master')
@section('title', 'Search Result')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Search results</h1>                                                
                        <span class="subheading">Your search for <B>"{{ $rr }}"</b> returned {{ $posts->total() }} results. </span>
                        <span class="subheading">Now displaying {{ $posts->count() }} out of {{ $posts->total() }} results. </span>
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

   


@if ($posts->isEmpty())
<p> There are no results for your search .</p>
@else

 

                   <!-- Blog Entries Column -->
    @include('showresults')
            <!-- EndBlog Entries Column -->
@endif

@endsection