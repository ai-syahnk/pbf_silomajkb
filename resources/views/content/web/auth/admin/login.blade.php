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

                    <h4 class="login-form-title">Masuk akun Admin</h4>
                    <p class="login-form-subtitle">Masukkan email & kata sandi Anda untuk login</p>

                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger py-2 px-3" style="font-size: 14px; border-radius: 8px;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label-login">Alamat Email</label>
                            <input type="email" class="form-control form-control-login @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="user@gmail.com">
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label-login">Kata Sandi</label>
                            <input type="password" class="form-control form-control-login @error('password') is-invalid @enderror" id="password" name="password" placeholder="*******">
                        </div>

                        <a href="#" class="login-forgot-link">Lupa kata sandi? Hubungi Admin</a>

                        <button type="submit" class="btn btn-login-panel w-100">Masuk</button>
                    </form>

                    <div class="login-footer-text">
                        Kembali ke halaman <a href="{{ url('/portal-login') }}" class="login-footer-link">Portal Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
