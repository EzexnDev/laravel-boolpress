@extends('layouts.app')

@section('content')

<div class="Container">
    <div class="row">
        <a class="p-5" href="{{route("posts.create")}}">Nuovo Post</a>
    </div>
    <div class='row d-flex'>
        <example-component
        :posts="{{$posts}}"
        >
        </example-component>
       
        {{-- @foreach($posts as $post)
            <div class="col-3 post_card d-flex flex-column mb-4">

                
                <div>
                    <h4>Post Author: {{$post->author}}</h4>
                </div>
                
                    <p>{{$post->title}}</p>
                    <span>{{$post->postToPostInformation->description}}</span>
                    <p>{{$post->postToCategory->title}}</p>
                    <div class="flex-row row">
                    @foreach($post->postToTag as $tag)
    
                        <span>{{'#'.$tag->name.' '}}</span>
    
                    @endforeach
                    </div>
                    
    
                    <div class="">
                        <a href="{{route("posts.edit", $post->id)}}">Aggiorna</a>
                        <a href="{{route("posts.show", $post->id)}}">Vedi Dettagli</a>
    
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Elimina</button>
                        </form>
                    </div>
                
            </div>
        @endforeach --}}
    </div>
</div>
@endsection

