@extends('layouts.main')



@section('container')
    <h1 class="mb-5">Halaman Posts</h1>

    <a class="text-decoration-none btn text-light " href="/post/" style="background-color: #343a40">Kembali</a>

    @foreach ($Posts as $post)
        <div class="card mt-4">
            <div class="container-fluid">
                <h1>
                    <a class="text-decoration-none" href="/post/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>
                @if ($post->image)
                    <img src="{{ asset('/' . $post->image) }}" class="img-fluid mt-3" alt="image">
                @else
                    <img src="https://source.unsplash.com/1200x400" class="img-fluid mt-3" alt="image">
                @endif
                <p>
                    Author.
                    <a class="text-decoration-none" href="/user/{{ $post->user->username }}">
                        {{ $post->user->name }}
                    </a>
                    |
                    <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->slug }}</a>
                </p>
                <h4>{{ $post->exerpt }}</h4>

                <a class="text-decoration-none" href="/post/{{ $post->slug }}">
                    Read More...
                </a>
            </div>
        </div>
    @endforeach
@endsection
