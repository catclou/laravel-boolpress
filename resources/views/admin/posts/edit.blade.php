@extends('layouts.app')

@section('content')

<main class="container text-light mb-5">

    <h1 class="text-center m-5">Modifica il post</h1>

    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group d-flex flex-column">
    
            <label for="title">Titolo</label>
            <input type="text" class="form-control mb-4" id="title" name="title" placeholder="Titolo del post" value="{{ old('title', $post->title) }}">

            <div class="form-group d-flex flex-column">
                <label for="category">Categoria</label>
                <select name="category_id" id="category">
                    <option value="">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option @if( old('category_id', $post->category_id) == $category->id ) selected @endif
                                value="{{$category->id}}">
                                    {{$category->label}}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <label for="title">Content</label>
            <textarea class="form-control mb-4" id="content" name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
    
            {{-- <label for="IMAGE">image url</label>
            <input type="url" class="form-control mb-4" id="image" name="image" placeholder="url dell'immagine" value="{{ old('image', $post->image) }}"> --}}

            <div class="form-group">
                <label for="image">Immagine del post</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            {{-- input dei tag --}}
            <label for="">Scegli i tag</label>

            <div class="d-flex flex-wrap">
                @foreach($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]" @if (in_array($tag->id, old('tags', $post_tags_id))) checked @endif>
                        <label for="tag-{{$tag->id}}" class="form-check-label">{{$tag->label}}</label>
                    </div>
                @endforeach
            </div>
    
            <button type="submit" class="btn btn-success align-self-center mt-4 mb-5 w-25">Salva le modifiche</button>
        </div>
    </form>

</main>


@endsection