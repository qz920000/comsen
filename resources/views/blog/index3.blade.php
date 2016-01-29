@extends('master2')
@section('title', 'Blog2')
@section('content')
<div class="container col-md-8 col-md-offset-2">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<header class="" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@if ($posts->isEmpty())
<p> There is no post.</p>
@else
@foreach ($posts as $post)


<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    
                        <a href="{!! action('BlogController@show', $post->id) !!}">
                        <h2 class="post-title">
                            {!! $post->title !!}
                        </h2>
                        <h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#"> {!! $post->username !!}</a> on {!! $post->created_at->format('F d, Y H:i e') !!}</p>
                    <div class="panel-body">
                    @if ($post->filePath != "" )
                        <div >
                            <img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="300" width="100%" />
                        </div>
                    @endif
    
                    
                       <h4 class="post-subtitle">
                           {!! mb_substr($post->content,0,500) !!}
                        </h4>
                <hr>
                </div>
                <hr>
            </div>
                </div></div></div>
@endforeach
@endif

@endsection