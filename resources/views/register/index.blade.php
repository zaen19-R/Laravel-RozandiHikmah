@extends('layouts.main')



@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
                <form action="/register" method="POST">
                    @csrf
                    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}

                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror"
                            name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
                        <label for="name">Name</label>
                        <div class="invalid-feedback">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="Username" value="{{ old('username') }}" required>
                        <label for="username">Username</label>
                        <div class="invalid-feedback">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        <div class="invalid-feedback">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> --}}
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                    {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
                </form>

                <small class="d-block text-center mt-2">
                    <a href="/login">
                        Login !
                    </a>
                </small>

            </main>
        </div>
    </div>
@endsection()
