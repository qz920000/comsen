@extends('master')
@section('title', 'Edit A Post')
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
    <h1>{{ config('comsenblog.title') }}</h1>
    
    <hr>
    <ul>
      @foreach ($posts as $post)
      

        <li>
          <a href="{!! action('PostsController@edit', $post->id) !!}">{!! $post->title !!} </a>
          <em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
          {!! $post->slug !!}{!! $post->user_id!!} {!! $post->username !!}{!! $post->updated_at !!}
          <p>
            {{ str_limit($post->content) }}
          </p>
        </li>
      @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
  </div>


@endsection