<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2  px-3 me-0 fs-6" href="/">Laravel 9</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <form action="/logout" method="POST">
            @csrf
            <div class="nav-item text-nowrap">
                <button class="nav-link px-3 bg-success border-0">
                    Logout
                    <span data-feather="log-out"></span>
                </button>
            </div>
        </form>
    </div>
</header>
