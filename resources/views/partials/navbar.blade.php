<nav class="navbar navbar-expand-lg bg-success navbar-dark ">
    <div class="container">
        <a class="navbar-brand" href="/">Laravel 9</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $titles === 'Home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $titles === 'All Post' ? 'active' : '' }}" href="/post">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $titles === 'Categories' ? 'active' : '' }}" href="/categories">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $titles === 'About' ? 'active' : '' }}" href="/about">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi-layout-text-sidebar-reverse"></i> My
                                    Dashboard</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $titles === 'Login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login </a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
