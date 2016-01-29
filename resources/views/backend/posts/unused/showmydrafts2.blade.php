@extends('master')
@section('title', 'My Draft')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
<form class="form-horizontal" method="post">
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif


  <title>{{ config('comsenblog.title') }}</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>My Drafts</h1>
    @if ($posts->isEmpty())
<p> You have no drafts.</p>
@else
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
      @foreach ($posts as $post)
      

        <li>
          <a href="{!! action('PostsController@edit', $post->id) !!}">{!! $post->title !!} </a>
          <em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
          by {!! $post->username !!}
          
          <p>
            {{ str_limit($post->content) }}
          </p>
          <p>
              
              
              .... {!!($post->status )!!}
              @if($post->status != "1")
              <BR>Your post is still in draft stages. Click below to continue editing your post.<BR>
              <a href ="{!! action('PostsController@showPreview', $post->id) !!}" > preview post </a> &nbsp;
             <a href="{!! action('PostsController@edit', $post->id) !!}">Continue Editing Your Post </a>
             
              @else
              <a href ="{!! action('BlogController@show', $post->id) !!}" > view post </a> &nbsp;
              <a href ="{!! action('UpdatePostsController@updatePost', $post->id) !!}" > update post </a>
              @endif

          </p>
        </li>
      @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
    @endif
    
  </div>


@endsection