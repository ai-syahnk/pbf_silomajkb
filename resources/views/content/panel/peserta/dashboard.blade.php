@extends('layouts.panel.main')

@section('content')
    {{-- <div class="container-fluid"> --}}
    <div class="mb-4">
        <h2 class="fw-bold fs-4">Halaman Dashboard</h2>
    </div>
    
    @php
        $nameWords = collect(preg_split('/\s+/', trim(Auth::user()->name)))
            ->filter()
            ->values();
        $firstName = $nameWords->first();
    @endphp

    <div class="welcome-banner">
        <h2>Hello, {{ ucwords($firstName) }}</h2>
        <p>Aku tidak berkompetisi dengan siapapun kecuali diriku sendiri. Tujuanku adalah mengalahkan penampilan terakhirku
        </p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">5</div>
            <div class="stat-label">Perlombaan yang<br>sudah diikuti</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">2</div>
            <div class="stat-label">Perlombaan yang<br>sedang diikuti</div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
