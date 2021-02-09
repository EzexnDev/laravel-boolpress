@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">

                <form method="post" action="{{ route('post.store') }}" class="mt-5">
                    @csrf
                    @method("POST")
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" value ="{{ old("title") }}"name="title" class="form-control" id="title" aria-describedby="emailHelp">
                        @error("title")
                        {{ $message }}
                        @enderror


                        <div class="mb-3">
                            <label for="author" value ="{{ old("author") }} class="form-label">Autore</label>
                            <input type="text" name="author" class="form-control" id="author">
                        </div>
                        @error("author")
                        {{ $message }}
                        @enderror
                        <div class="mb-3">
                            <h4 class="mt-2">Seleziona Categoria</h4>
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categories"
                                        value="{{ $category['id'] }}" id="categories1">
                                    <label class="form-check-label" for="categories1">
                                        {{ $category['title'] }}
                                    </label>
                                </div>
                            @endforeach
                            <h4 class="mt-2">Inserisci la descrizione</h4>
                            <div class="mb-3">
                                <textarea name="description" class="form-control"></textarea>
                                <fieldset>
                                <h4 class="mt-4">Seleziona i tag</h4>
                                @foreach ($tags as $tag)

                                <div class="form-check ">
                                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag["id"] }}" id="tags">
                                    <label class="form-check-label" for="tags">
                                       {{ $tag['name'] }}
                                    </label>
                                </div>
                                @endforeach
                            </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
