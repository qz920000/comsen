@extends('master')
@section('title', 'View Blog')
@section('content')
   <link href="{{ url("css/blog-post.css") }}" rel="stylesheet">
//facebook
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


<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
<div class="content">
 


@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="col-lg-10 col-lg-offset-2">
<h2 class="header">{!! $post->title!!}  .... {!!($post->status )!!}</h2>

<div class="fb-share-button" data-href= {{ URL::current() }} data-layout="button">
</div>
{{ URL::current() }}
<div><a href="https://twitter.com/share" class="twitter-share-button"  data-size="large" {count}>Tweet</a></div><br>
<div>

<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url={{ URL::current() }} }}></script>
</div>

<div class="a2a_kit">
    <a class="a2a_button_google_plus_share" data-annotation="vertical-bubble" data-href={{ URL::current() }}></a>
</div>

<script async src="//static.addtoany.com/menu/page.js"></script>
<br>
<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-anotation="none" data-href= "http://www.comsen.com/public/blog/61 "></div>
<br>
<div class="fb-share-button" data-href= "http://www.comsen.com/public/blog/61 " data-layout="button">
</div>
<br/>
<div><a href="https://twitter.com/share" class="twitter-share-button"  data-size="large" {count}>Tweet</a></div><br>
<div>
<br/>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url="http://www.comsen.com/public/blog/61 " }}></script>
</div>
</div>


<a href="https://plus.google.com/share?{{ URL::current() }}">Share on Google</a><br>
<a href="https://www.facebook.com/sharer.php?u="{{ URL::current() }}&t="share">Share on facebook</a><br>
<a href="http://twitter.com/intent/tweet?source=sharethiscom&text={{ URL::current() }}&url="{{ URL::current() }}>Share on twitter</a><br>
@foreach( $images as $image )

    <div class="table table-bordered bg-success">
 <img src="{!! asset('/images/'.$image->filePath) !!}" alt="ALT NAME" class="img-responsive" height="auto" width="100%" />

<br><a href="{!! action('ImageController@destroy2', $image->id) !!}">Delete Image {{$image->id}}</a>
</div>
@endforeach

{!! $post->username !!} {!! $post->created_at->format('F d, Y H:i e') !!}
<p> {!! $post->content !!} </p>
<div class="clearfix"></div>
@foreach($updps as $updp)
<div class="well well bs-component">
    <h3> Update:</h3>  {!! $updp->created_at->format('F d, Y H:i e') !!}
<div class="content">
{!! $updp->content !!}
</div>
</div>
@endforeach
</div>
<div class="clearfix"></div>
</div>
@foreach($comments as $comment)
<div class="well well bs-component">
    {!! $comment->username !!} {!! $comment->created_at->format('F d, Y H:i e') !!}
<div class="content">
{!! $comment->content !!}
</div>
</div>
@endforeach


@if (Auth::check())
<div class="well well bs-component">
<form class="form-horizontal" method="post" action={{ URL::route('comment') }}>
@foreach($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach

<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="post_id" value="{!! $post->id !!}">
<input type="hidden" name="post_type" value="App\Post">
<fieldset>
<legend>Comment</legend>

<div class="form-group">
<div class="col-lg-12">
<textarea class="form-control" rows="3" id="content" name="content"></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="reset" class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-primary">Post</button>
</div>
</div>
<hr>
<div class="clearfix">Tags:
@foreach($utags as $utag)
<p> {!! $utag->tagtext !!} </p>
@endforeach</div>
</fieldset>
</form>
</div>
@else
<div class="clearfix">Please <a href={{ URL::route('login') }}>login</a> to add your comment to this post.</div>

@endif
</div>
@endsection