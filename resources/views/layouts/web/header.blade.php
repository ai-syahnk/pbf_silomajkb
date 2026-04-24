<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.beranda') }}">
            <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.beranda') && !request()->has('competisi') ? 'active' : '' }}" href="/#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#visi-misi">Visi & Misi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.kompetisi') ? 'active' : '' }}" href="{{ route('web.kompetisi') }}">Kompetisi</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="#" class="btn-login">Login</a>
            </div>
        </div>
    </div>
</nav>
