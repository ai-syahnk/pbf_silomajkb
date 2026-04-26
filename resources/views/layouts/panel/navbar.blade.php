<nav class="custom-navbar">
    <div class="nav-container">
        <ul class="nav-links">
            @if(Auth::user()->role === 'admin')
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="{{ request()->routeIs('admin.kompetisi') || request()->routeIs('admin.kompetisi.*') ? 'active' : '' }}"><a href="{{ route('admin.kompetisi') }}">Kompetisi</a></li>
                <li><a href="#">Akun Peserta</a></li>
            @else
                <li class="{{ request()->routeIs('peserta.dashboard') ? 'active' : '' }}"><a href="{{ route('peserta.dashboard') }}">Dashboard</a></li>
                <li class="{{ request()->routeIs('peserta.profil') ? 'active' : '' }}"><a href="{{ route('peserta.profil') }}">Profil Mahasiswa</a></li>
                <li class="{{ request()->routeIs('peserta.hasil') ? 'active' : '' }}"><a href="#">Hasil Lomba</a></li>
            @endif
            <li>
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.logout') : route('web.portal.login') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ Auth::user()->role === 'admin' ? route('admin.logout') : route('web.portal.login') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
