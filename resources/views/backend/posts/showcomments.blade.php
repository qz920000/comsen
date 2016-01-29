@extends('master')
@section('title', 'My Comments')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">My Comments</h1>                                                
                        <span class="subheading">Page {{ $comments->currentPage() }} of {{ $comments->lastPage() }} </span>
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


  
  


@if ($comments->isEmpty())
<p> There are no comments.</p>
@else
<!-- Blog Entries Column -->
                   
                   
                               <div class="post-preview">
@foreach ($comments as $comment)
                <!-- First Blog Post -->
                 <p>
                     <span><h2>
                   Post Title: <a href="{!! action('BlogController@show', $comment->post_id) !!}">{!! $comment->post->title !!} </a>
                                </h2> </p>
                <p class="lead">
                    Post created by:  <a href={{ URL::route('userprofile', $comment->post->username) }}>{!! $comment->post->username !!}</a>
                </p>
                <span class="glyphicon glyphicon-time"></span> Comment posted on {!! $comment->updated_at->format('F d, Y H:i e') !!} by  {!! $comment->username !!}             
                              
                    <p> {{ $comment->content }}  </p>
                       <hr>  
  
              
            @endforeach
            {!! $comments->render() !!}
                </div>
                   
                   
            <div class="post-preview">
      @foreach ($comments as $comment)
               <li><a href="{!! action('BlogController@show', $comment->post_id) !!}">{!! $comment->post->title !!} </a>
          <a href="{!! action('UpdatePostsController@updatePost', $comment->post_id) !!}">{!! $comment->post_id !!} </a>
          has {!! $comment->post_id !!} created on 
          <em>({{ $comment->created_at->format('M jS Y g:ia') }})</em>
           {!! $comment->username !!}{!! $comment->updated_at !!}
          <p>
            {{ $comment->content }}
          </p>
          <p>
             
              
          </p>
        </li>
      @endforeach
    </ul>
    <hr>
    {!! $comments->render() !!}
  </div>

@endif
@endsection