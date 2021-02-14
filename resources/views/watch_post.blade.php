@extends('layouts.app')

@section('content')
<p>{{$post->title}}</p>
<p>{{$post->author}}</p>
<p>{{$post->hasInfo->description}}</p>
<p>{{$post->hasCategory->title}}</p>
@foreach($post->tags as $tag)

    <p>{{$tag->name}}</p>

@endforeach
@endsection
