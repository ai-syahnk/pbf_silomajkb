<nav class="custom-navbar">
    <div class="nav-container">
        <ul class="nav-links">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Kompetisi</a></li>
            <li><a href="#">Akun Peserta</a></li>
            <li>
                <a href="{{ route('admin.logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
