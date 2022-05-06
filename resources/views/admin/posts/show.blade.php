@extends('layouts.app')

@section('content')
    
    {{-- @dump($comic) --}}
    <main>
        <section>
            <div class="container">
                <div class="container">
                    <h3>
                        Titolo:
                    </h3>
                    <p>
                        {{$post->title}}
                    </p>
                </div>
                <div class="container">
                    <h3>
                        Slug:
                    </h3>
                    <p>
                        {{$post->slug}}
                    </p>
                </div>
                <div class="container">
                    <h3>
                        Content:
                    </h3>
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                <div class="container">
                    <h3>
                        Tags:
                    </h3>
                    @foreach ($post->tags as $tag)
                        <p style="display: inline-block" class="bade badge-pill badge-info mb-1">{{$tag->name}}</p>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

@endsection