@extends('layouts.web.main')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row justify-content-center g-4 g-lg-5">
            <!-- Peserta Card -->
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="login-card text-center">
                    <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB" class="login-logo">
                    <h3 class="fw-bold mb-1">Peserta</h3>
                    <p class="mb-4">Peserta Kompetisi</p>
                    <a href="{{ url('/peserta/login') }}" class="btn btn-login-panel w-100">Masuk</a>
                </div>
            </div>
            <!-- Admin Card -->
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="login-card text-center">
                    <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB" class="login-logo">
                    <h3 class="fw-bold mb-1">Admin</h3>
                    <p class="mb-4">Panitia Kompetisi</p>
                    <a href="{{ url('/admin/login') }}" class="btn btn-login-panel w-100">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
