@extends('layouts.app')

@section('content')

<h4 class="d-flex justify-content-center">Giulia, a cosa stai pensando?</h4>

<div class="">
    <form action="{{ route("posts.store") }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title" value="">
        <input type="text" name="author" value="">
        <h4 class="mt-2">Seleziona Categoria</h4>
            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categories" value="{{ $category['id'] }}" >
                    <label class="form-check-label">
                    {{ $category['title'] }}
                    </label>
                </div>
            @endforeach

            @foreach ($tags as $tag)
            <input id="{{ 'tag_'.$tag->name }}" type="checkbox" name="tags[]" value="{{ $tag->id }}">
            <label for="{{ 'tag_'.$tag->name }}">{{ $tag->name }}</label>
            @endforeach

        <textarea type="text" name="description" value=""></textarea>
        <button type="submit">Pubblica</button>
    </form>
</div>


@endsection
