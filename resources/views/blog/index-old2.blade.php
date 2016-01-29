@extends('master')
@section('title', 'Blog')
@section('content')


<style>
hrhhh { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    border-style: solid;
    border-width: 3px;
} 
.navbar-defaultrr {
  background-color: #38830c;
  border-color: #83c02b;
}

.navbar33-defaulthhh {
  background-color: #32CD32;
  border-color: #83c02b;
}
</style>
   

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">Welcome to our Naija Blog.</h1>                                                
                        <span class="subheading">Largest Blog in Nigeria </span>
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

 
<div class="panel-group">
    @foreach ($posts as $post)
    <div class="panel panel-default">
        <div class="panel-heading">
            
                <p>
                     <span><h2>
                    <a href="{!! action('BlogController@show', $post->id) !!}"> {!! $post->title !!}  </a>
                         </h2></span> </p>
                 </div>
            <div class="panel-body">
                <p class="lead">
                    by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
                </p>

                <span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format('F d, Y H:i e').".    " !!}               
                <span class="comments-padding"></span><span class="wps text-right">       </span>
                 <span  class="glyphicon glyphicon-comment"></span>
                ({!! $post->comments()->count()  !!} comments)
                    @if ($post->filePath != "" )
                        <p>
                            <img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="300" width="100%" />
                   </p>
                   @endif
           
            @if ( mb_strlen($post->content)  > 501 ) 
                     <p>   
                         {!! mb_substr($post->content,0,500) !!}......
                   </p>
                <a class="btn btn-primary" href="{!! action('BlogController@show', $post->id) !!}">
                    Read More .... <span class="glyphicon glyphicon-chevron-right"></span></a>
                    @else
                 <p>              
                      {!! mb_substr($post->content,0,500) !!}
                   </p>
                    END of blog.
             @endif   
            
        </div>
    </div>
     @endforeach
            {!! $posts->render() !!}
    </div>

                   <!-- Blog Entries Column -->
            <div class="post-preview">
@foreach ($posts as $post)
                <!-- First Blog Post -->
                 <p>
                     <span><h3 class="blogtitle">
                    <a href="{!! action('BlogController@show', $post->id) !!}"> {!! $post->title !!}  </a>
                         </h3>({!! $post->comments()->count()  !!} comments)</span> </p>
                <p class="lead">
                    by <a href="">{!! $post->username !!}</a>
                </p>
                <span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format('F d, Y H:i e') !!}               
              <span class="comments-padding"></span><span  class="glyphicon glyphicon-comment"></span>({!! $post->comments()->count()  !!} comments)
                    @if ($post->filePath != "" )
                        <p>
                            <img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="300" width="100%" />
                   </p>
                   @endif
                
                    <p>
                    {!! mb_substr($post->content,0,500) !!}.....
           </p>
           <p>     <a class="btn btn-primary" href="{!! action('BlogController@show', $post->id) !!}">Read More .... <span class="glyphicon glyphicon-chevron-right"></span></a>
                   </p> <hr>  
            @endforeach
            {!! $posts->render() !!}
                </div>      



@endif
 @endsection