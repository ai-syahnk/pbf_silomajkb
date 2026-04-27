<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.beranda') }}">
            <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center justify-content-lg-end mt-3 mt-lg-0 w-100 w-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.beranda') && !request()->has('competisi') ? 'active' : '' }}"
                        href="/#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#about">Tentang</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/#visi-misi">Visi & Misi</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.kompetisi') || request()->routeIs('web.kompetisi.*') ? 'active' : '' }}"
                        href="{{ route('web.kompetisi') }}">Kompetisi</a>
                </li>
            </ul>
            <div class="d-flex">
                @auth
                <div class="dropdown text-center text-lg-end">
                    <a class="btn-login dropdown-toggle" href="#" role="button" id="dropdownUser"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user me-2"></i>{{ implode(' ', array_slice(preg_split('/\s+/',
                        trim(auth()->user()->name)), 0, 2)) }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="dropdownUser">
                        <li>
                            <a class="dropdown-item"
                                href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('peserta.dashboard') }}">
                                <i class="fa-solid fa-gauge me-2"></i>Dashboard
                            </a>
                        </li>
                        @if (auth()->user()->role != 'admin')
                        <li>
                            <a class="dropdown-item" href="{{ route('peserta.profil') }}">
                                <i class="fa-solid fa-user-pen me-2"></i>Profil Saya
                            </a>
                        </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form
                                action="{{ auth()->user()->role == 'admin' ? route('admin.logout') : route('peserta.logout') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('web.portal.login') }}" class="btn-login">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>