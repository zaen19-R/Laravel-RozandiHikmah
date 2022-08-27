@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="card">
            <div class="container mt-3">
                @foreach ($Users as $user)
                    <img src="/img/x.jpg" alt="photos" class="rounded-circle">
                    <div class="row">
                        <div class="col-2">
                            <h6>Nama </h6>
                        </div>
                        <div class="col">
                            <h6>: {{ $user->name }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h6>Email </h6>
                        </div>
                        <div class="col">
                            <h6>: {{ $user->email }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
