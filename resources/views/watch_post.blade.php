@extends('layouts.app')

@section('content')

<div class="post_details d-flex flex-column">
    <p>{{$post->title}}</p>
    <p>{{$post->author}}</p>
    <p>{{$post->postToPostInformation->description}}</p>
    <p>{{$post->postToCategory->title}}</p>
    @foreach($post->postToTag as $tag)

        <p>{{$tag->name}}</p>

    @endforeach
</div>

@endsection