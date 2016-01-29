@extends('master')
@section('title', 'My Posts')
@section('content')

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">My Posts</h1>                                                
                        <span class="subheading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }} </span>
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
<p> There is no post.</p>
@else

 

                   <!-- Blog Entries Column -->
            <div class="post-preview">
@foreach ($posts as $post)

                <!-- First Blog Post -->
                 <p>
                     <span><h2>
                    <a href="{!! action('BlogController@show', $post->id) !!}"> {!! $post->title !!}  </a>
                         </h2>({!! $post->comments()->count()  !!} comments)</span> </p>
                <p class="lead">
                    by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
                </p>
                <span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format('F d, Y H:i e') !!}               
              
                    @if ($post->filePath != "" )
                        <p>
                            <img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="300" width="100%" />
                   </p>
                   @endif
                
                    <p>
                    {!! mb_substr($post->content,0,500) !!}.....
           </p>
              <p>   <a class="btn btn-primary" href="{!! action('BlogController@show', $post->id) !!}">Read More .... <span class="glyphicon glyphicon-chevron-right"></span></a>
                     
                                 
              @if($post->status != "1")
              <BR>Your post is still in draft stages. Click below to continue editing your post.<BR>
             <a href="{!! action('PostsController@edit', $post->id) !!}">Continue Editing Your Post </a>
              @else
             
              <a href ="{!! action('UpdatePostsController@updatePost', $post->id) !!}" > update post </a>
              @endif
              </p>
              <hr> 
            @endforeach
            {!! $posts->render() !!}
                </div>

           
@endif
@endsection