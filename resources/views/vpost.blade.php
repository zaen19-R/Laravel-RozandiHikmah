@extends('layouts.main')

@section('container')
    <a class="text-decoration-none btn text-light" style="background-color: #1b1f1d" href="/post">Kembali</a>
    <div class="card mt-4">
        <div class="container">
            <article>
                <h2>{{ $post->title }}</h2>
                @if ($post->image)
                    <img src="{{ asset('/' . $post->image) }}" class="img-fluid mt-3" alt="image">
                @else
                    <img src="https://source.unsplash.com/1200x400" class="img-fluid mt-3" alt="image">
                @endif
                <p>
                    Author.
                    <a class="text-decoration-none" href="/user/{{ $post->user->username }}">{{ $post->user->name }}</a>
                    |
                    <a class="text-decoration-none"
                        href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <p>{{ $post->created_at }}</p>
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </div>
@endsection
