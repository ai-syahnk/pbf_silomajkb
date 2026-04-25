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
        <div class="user-profile">
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
        </div>
    </div>
</header>
