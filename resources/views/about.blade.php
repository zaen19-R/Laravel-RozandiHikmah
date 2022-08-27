@extends('layouts.main')



@section('container')
    <h1>Halaman About</h1>
    <img src="img/{{ $image }}" alt="" class="img-thumbnail rounded-circle">
    <h3>{{ $name }}</h3>
    <h5>{{ $email }}</h5>
    <h6>{{ $work }}</h6>
    <a class="text-decoration-none btn text-light " href="/" style="background-color: #343a40">Kembali</a>
@endsection
