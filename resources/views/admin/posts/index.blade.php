@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{route('admin.posts.create')}}">Nuovo post</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Data di pubblicazione</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Visualizza</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->category ? $post->category->name : 'Nessuna categoria'}}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span style="display: inline-block" class="bade badge-pill badge-info mb-1">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td>{{$post->published_at}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a class="btn btn-primary mb-3" href="{{route('admin.posts.show', $post)}}">Visualizza</a>
                        </td>
                        <td>
                            <a class="btn btn-small btn-warning mb-1" href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                        {{--     <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                         --}}
                        </td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    {{$post->deleted_at ? 'Elimina definitivamente' : 'Elimina'}}
                                </button>
                            </form>
                        </td>
                    </tr>                
                @endforeach
            </tbody>
        </table>
    </div>

@endsection