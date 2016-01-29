@extends('master')
@section('title', 'Blog')
@section('content')
<div class="container col-md-8 col-md-offset-2">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

@if ($posts->isEmpty())
<p> There is no post.</p>
@else
@foreach ($posts as $post)

<div class="panel panel-default">

    @foreach( $images as $image )
    {!! $image->post_id !!}
    @endforeach
<div class="panel-heading"><a href="{!! action('BlogController@show', $post->id) !!}">{!! $post->title !!}</a>
    <br/>{!! $post->post_id!!}mmm<br/>{!! $post->filePath !!}img<br/>
    {!! $post->username !!} {!! $post->created_at->format('F d, Y H:i e') !!}</div>

<div class="panel-body">
    @if ($post->filePath != "" )
        <div >
<img src="{!! asset('/images/'.$post->filePath) !!}" alt="" class="img-responsive" height="auto" width="100%" />
</div>
    @endif
      {!! $post->id!!} nnnn   nnnnnnnnnnnnnn <br/>
{!! mb_substr($post->content,0,500) !!}
</div>
</div>

@endforeach
@endif
</div>
@endsection