@extends('master')
@section('title', 'Edit A Post')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">

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
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Slug</th>
<th>Created By</th>
<th>Created At</th>
<th>Updated At</th>
</tr>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
<td>{!! $post->id !!}</td>
<td>

<a href="{!! action('PostsController@edit', $post->id) !!}">{!! $post->title !!} </a>
</td>
<td>{!! $post->slug !!}{!! $post->user_id!!}</td>
<td> {!! $post->username !!}</td>
<td>{!! $post->created_at !!}</td>
<td>{!! $post->updated_at !!}</td>
</tr>
@endforeach
</tbody>
</table>

@endif

{!! $post->render() !!}
</div>
</div>
@endsection