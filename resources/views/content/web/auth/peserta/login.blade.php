@extends('layouts.web.main')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="login-card">
                    
                    <div class="login-brand">
                        <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB">
                        <div class="login-brand-text">
                            Sistem Informasi Lomba<br>Mahasiswa JKB
                        </div>
                    </div>

                    <h4 class="login-form-title">Masuk akun Peserta</h4>
                    <p class="login-form-subtitle">Masukkan email & kata sandi Anda untuk login</p>

                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label-login">Alamat Email</label>
                            <input type="email" class="form-control form-control-login" id="email" name="email" placeholder="user@gmail.com" required>
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label-login">Kata Sandi</label>
                            <input type="password" class="form-control form-control-login" id="password" name="password" placeholder="*******" required>
                        </div>

                        <a href="#" class="login-forgot-link">Lupa kata sandi? Hubungi Admin</a>

                        <button type="submit" class="btn btn-login-panel w-100">Masuk</button>
                    </form>

                    <div class="login-footer-text">
                        Tidak punya akun? <a href="#" class="login-footer-link">Buat Akun</a>
                        <br>
                        Kembali ke halaman <a href="{{ url('/portal-login') }}" class="login-footer-link">Portal Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
