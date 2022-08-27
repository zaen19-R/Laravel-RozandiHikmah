@extends('layouts.main')


@section('container')
    <h1 class="mb-5">Post Categories</h1>

    <a class="text-decoration-none btn text-light" style="background-color: #1b1f1d" href="/post">Kembali</a>

    @foreach ($categories as $category)
        <div class="container mt-4">
            <ul>
                <li>
                    <h3><a class="text-decoration-none" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                    </h3>
                </li>
            </ul>
        </div>
    @endforeach
@endsection
