<header class="top-header">
    <div class="header-container">
        <div class="logo-section">
            <div class="logo-icon">
                <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB" width="40" height="40">
            </div>
            <div class="logo-separator"></div>
            <div class="logo-text">
                <h1>Sistem Informasi Lomba<br/>
                Mahasiswa JKB</h1>
            </div>
        </div>
        <div class="user-profile-wrapper">
            <div class="user-profile" id="userProfileDropdown">
                @php
                    $nameWords = collect(preg_split('/\s+/', trim(Auth::user()->name)))->filter()->values();
                    $displayName = $nameWords->take(2)->implode(' ');
                    $avatarInitials = strtoupper($nameWords->take(2)->map(fn($word) => substr($word, 0, 1))->implode(''));
                @endphp
                <div class="avatar">
                    {{ $avatarInitials }}
                </div>
                <div class="user-info">
                    <span class="user-name">{{ ucwords($displayName) }}</span>
                    <span class="user-role">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
                <i class="bi bi-chevron-down" style="font-size: 0.8rem; color: var(--text-muted); margin-left: 0.5rem;"></i>
            </div>
            <div class="dropdown-menu-custom" id="profileDropdown">
                <a href="{{ route('web.beranda') }}" class="dropdown-item-custom">
                    <i class="bi bi-house"></i> Beranda
                </a>
                <div class="dropdown-divider-custom"></div>
                <form action="{{ Auth::user()->role === 'admin' ? route('admin.logout') : route('peserta.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item-custom logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
