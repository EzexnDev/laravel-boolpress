@extends('layouts.app')

@section('content')

    <div class="Container">
        <div class='row d-flex justify-content-center'>
            <div class="justify-content-center">
            @foreach($posts as $post)
                <h4>{{$post->author}}</h4>
                <p>{{$post->title}}</p>
                <form method="GET" action="{{ route('post.edit', $post) }}">
                    @csrf
                    @method("GET")
                    <button type="submit" @if (!\Auth::check()) disabled @endif class="btn btn-warning float-left mr-4">Modifica</button>
                </form>
            @endforeach
            </div>
        </div>
    </div>

@endsection
