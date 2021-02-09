@extends('layouts.app')

@section('content')

    <div class="Container">
        <div class='row d-flex justify-content-center'>
            <div class="justify-content-center">
            @foreach($posts as $post)
                <h4>{{$post->author}}</h4>
                <p>{{$post->title}}</p>
            @endforeach
            </div>
        </div>
    </div>

@endsection
