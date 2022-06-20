@extends('layouts.app')

@section('content')

    {{-- Alert di conferma eliminazione di un post --}}
    @if(session('message'))

        <div class="alert alert-danger">
            {{session('message')}}
        </div>

    @endif

    <div class="container">

        <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea post</a>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Data</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->title }}</th>
                        <td>
                            @if($post->Category)
                            <span class="badge badge-pill badge-{{$post->Category->color}}">{{$post->Category->label}}</span>
                            @else
                                <span class="badge badge-pill badge-light"><i class="fa-solid fa-circle-xmark"></i> nessuna categoria</span>
                            @endif
                        </td>
                        <td>
                            <p>{{ $post->content }}</p>
                        </td>
                        <td>
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" width="50">
                        </td>
                        <td>
                            <span>{{ $post->created_at }}</span>
                        </td>
                        <td>
                            <span>{{ $post->slug }}</span>
                        </td>
                        <td class="d-flex flex-column">
                            <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary m-1 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px"> <i class="fa-solid fa-eye"></i></a>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning m-1 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form" data-name="{{$post->title}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger m-1" style="width: 40px; height: 40px"> <i class="fa-solid fa-trash-can"></i> </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h2>Non ci sono post</h2>
                @endforelse
                
                
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            @if( $posts->hasPages() )
                {{ $posts->links() }}
            @endif
        </div>

    </div>

    

@endsection

@section('scripts')

        <script>

            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                const title = form.getAttribute('data-name');
                form.addEventListener('submit', (e) =>{
                    e.preventDefault();
                    const confirmation = confirm(`Sei sicuro di voler eliminare il post "${title}"?`);
                    if (confirmation) e.target.submit();
                });
            });

        </script>

@endsection