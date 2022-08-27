@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    {{-- <img src="{{ $Image }}" alt="image"> --}}
    @foreach ($Posts as $post)
        <div class="card mt-2">
            <div class="container">
                <div class="card mt-3">
                    @if ($post->image)
                        <img src="{{ asset('/' . $post->image) }}" class="img-fluid mt-3" alt="image">
                    @else
                        <img src="https://source.unsplash.com/1200x400" class="img-fluid mt-3" alt="image">
                    @endif
                </div>
                <article>
                    <h2><a class="text-decoration-none" href="/dashboard/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h2>
                    <p>By. {{ $post->user->name }}<a class="text-decoration-none"
                            href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                    <p>{{ $post->exerpt }}</p>

                    <a class="text-decoration-none" href="/dashboard/posts/{{ $post->slug }}">Read More...</a></p>
                </article>
            </div>
        </div>
    @endforeach
@endsection
