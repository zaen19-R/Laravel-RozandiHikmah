@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-3">
        <a class="text-decoration-none btn text-light" style="background-color: #1b1f1d" href="/dashboard/posts">
            <span data-feather='arrow-left'></span>
            Kembali
        </a>
        <a class="text-decoration-none btn btn-warning text-light" href="/dashboard/posts/{{ $post->slug }}/edit">
            <span data-feather='file-text'></span>
            Edit
        </a>
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger"
                onclick="return confirm('Data yang anda pilih akan di hapus, anda yakin ?')"><span
                    data-feather="x-circle"></span>Delete</button>
        </form>
    </div>
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
                    <a class="text-decoration-none"
                        href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <p>{{ $post->created_at }}</p>
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </div>
@endsection
