@extends('layouts.main')


@section('container')
    <h1 class="mb-5">Post Category : {{ $category }}</h1>

    <a class="text-decoration-none btn text-light " href="/post" style="background-color: #1b1f1d">Kembali</a>

    @foreach ($posts as $post)
        <div class="card mt-4">
            <div class="container">
                <article>
                    <h2><a class="text-decoration-none" href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
                    @if ($post->image)
                        <img src="{{ asset('/' . $post->image) }}" class="img-fluid mt-3" alt="image">
                    @else
                        <img src="https://source.unsplash.com/1200x400" class="img-fluid mt-3" alt="image">
                    @endif
                    <p>By. {{ $post->user->name }} <a class="text-decoration-none"
                            href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                    <p>{{ $post->exerpt }}</p>

                    <a class="text-decoration-none" href="/post/{{ $post->slug }}">Read More...</a></p>
                </article>
            </div>
        </div>
    @endforeach
@endsection
