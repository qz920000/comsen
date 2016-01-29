@extends('master')
@section('title', 'View Blog')
@section('content')
   <link href="{{ url("css/blog-post.css") }}" rel="stylesheet">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=525232860979564";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){
var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
if(!d.getElementById(id)){js=d.createElement(s);
    js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
    fjs.parentNode.insertBefore(js,fjs);
    }}
    (document, 'script', 'twitter-wjs');
</script>
<!-- Place this tag in your head or just google before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<header class="" style="">    
                  <div class="">
                        <p>  <h1 class="page-header">{!! $post->title!!}</h1>                                                
                        <span class="subheading"> </span>
                        </p>
                </div>
        </header>  




<div class="content">
<ul class="list-inline">
<li><div class="fb-share-button" data-href= {{ URL::current() }} data-layout="button">
</div></li>
<li>
<a href="https://twitter.com/share" class="twitter-share-button"  data-size="large" {count}>Tweet</a></li>


<li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url={{ URL::current() }} }}></script></li>


<li><span class="a2a_kit">
    <a class="a2a_button_google_plus_share" data-action="share" data-annotation="none" data-href={{ URL::current() }}></a>
</span></li>
</ul>
<ul class="list-inline">
<li><script async src="//static.addtoany.com/menu/page.js"></script>

<!-- Place this tag where you want the share button to render. -->
<span class="g-plus" data-action="share" data-anotation="none" data-href= "http://www.comsen.com/public/blog/61 "></span></li>

<li><span class="fb-share-button" data-href= "http://www.comsen.com/public/blog/61 " data-layout="button">
</span></li>


<li><a href="https://twitter.com/share" class="twitter-share-button"  data-size="large" {count}>Tweet</a></li>


<li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url="http://www.comsen.com/public/blog/61 " }}></script>
</li>



    <li><a href="https://plus.google.com/share?{{ URL::current() }}">Share on Google </a><br></li>
<li><a href="https://www.facebook.com/sharer.php?u="{{ URL::current() }}&t="share">Share on facebook</a></li>
<li><a href="http://twitter.com/intent/tweet?source=sharethiscom&text={{ URL::current() }}&url="{{ URL::current() }}>Share on twitter{{ URL::current() }}</a></li>

</ul>

</div>





  
     <!-- Page Content -->
 
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
            <!-- Blog Post Content Column -->
            <div class="post-preview">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{!! $post->title!!}</h1>  ({!! $post->comments()->count()  !!} comments)

                <!-- Author -->
                <p class="lead">
                    by <a href={{ URL::route('userprofile', $post->username) }}>{!! $post->username !!}</a>
                   
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {!! $post->created_at->format('F d, Y H:i') !!}
</p>

                

                <!-- Preview Image -->
                @foreach( $images as $image )

                        <div class="table table-bordered bg-success">
                     <img src="{!! asset('/images/'.$image->filePath) !!}" alt="" class="img-responsive" height="auto" width="100%" />
                    @can('update-post', $post)
                       <br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
                    @endcan
                    </div>
                <hr>
                    @endforeach        
                

                <!-- Post Content -->
                <p class="lead"> {!! $post->content !!} </p>
                <hr>

                <!-- Blog Comments --><div class="clearfix"></div>
                
                @foreach($updps as $updp)
                <div class="content">
                    <h3> Update:</h3>  Posted on {!! $updp->created_at->format('F d, Y H:i e') !!}
                <div class="content">
                {!! $updp->content !!}
                </div>
                </div>
                @endforeach

                <!-- Comments Form -->
                 @if (Auth::check())
                <div class="well">
                    <fieldset>
                    <h4>Leave a Comment:</h4>
                    <form class="form-horizontal" method="post" action={{ URL::route('comment') }}>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="post_id" value="{!! $post->id !!}">
                     <input type="hidden" name="post_owner_id" value="{!! $post->user_id !!}">
                       <div class="form-group">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                      </fieldset>
                    </form>
                    </div>
                    @else
                    <div class="clearfix">Please <a href={{ URL::route('login') }}>login</a> to add your comment to this post.</div>
                    @endif
                <hr>

                <!-- Posted Comments -->

                   
                
                <!-- Comment -->
                 @foreach($comments as $comment)
                    <div class="media-body">
                        <h4 class="media-heading">{!! $comment->username !!}
                            <small>  {!! $comment->created_at->format('F d, Y H:i e') !!}</small>
                        </h4>
                        <div class="content">
                          <p>   {!! $comment->content !!} <p>
                        </div>
                            </div>
                 <hr>
                            @endforeach
                    
                
                           
                 
                    <div class="">
                        <h4 class="">Tags for this post:
                            <small>Tags</small>
                        </h4>
   
                        @foreach($utags as $utag)
                        <p> {!! $utag->tagtext !!} </p>
                        @endforeach
                    </div>
                

            </div>
       
    @endsection
    