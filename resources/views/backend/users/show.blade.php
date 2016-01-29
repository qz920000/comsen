@extends('master')
@section('title', 'User Profile')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{!! $user->name !!} Page</h1>                                                
                        <span class="subheading">Member since {{ $user->created_at }} of {{ $selectedRoles }} </span>
                        </p>
                        <span class="subheading">{!! $user->name !!} has {{ $posts->total() }} 
                            posts and {{ $comments->count() }} comments </span>
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



<div><p>
    Send a message to {!! $user->name !!}</p>
@include('backend.users.contactform')
    </div>
 <p> 
 <h3 class="page-header"> {!! $user->name !!}'s Posts</h3>    </p>
@if ($posts->isEmpty())
<p> There is no post.</p>
@else

 

                   <!-- Blog Entries Column -->
    @include('showresults')
            <!-- EndBlog Entries Column -->
@endif

@endsection