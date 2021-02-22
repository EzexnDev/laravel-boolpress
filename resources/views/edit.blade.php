@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                <form action="{{ route("posts.update",$post->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input value="{{ $post->title }}" type="text"name="title" type="text" class="form-control" id="title" >

                    </div>
                    <textarea class="form-control mt-5 mb-5" name="details" id="details" cols="30" rows="10">{{ $post->postToPostInformation->description }}
                    </textarea>


                    <button type="submit mt-5" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>

@endsection
