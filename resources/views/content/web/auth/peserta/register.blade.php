@extends('layouts.web.main')

@section('content')
    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-8">
                    <div class="login-card">

                        <div class="login-brand">
                            <img src="{{ asset('images/logo_jkb.png') }}" alt="Logo JKB">
                            <div class="login-brand-text">
                                Sistem Informasi Lomba<br>Mahasiswa JKB
                            </div>
                        </div>

                        <h4 class="login-form-title">Daftar akun!</h4>
                        <p class="login-form-subtitle">Daftar Akun untuk mengikuti Semua Perlombaan di JKB!</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('peserta.register.submit') }}" method="POST">
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label-login">Nama</label>
                                    <input type="text" class="form-control form-control-login @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" placeholder="Masukan namamu!" value="{{ old('nama') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nim" class="form-label-login">Nomor Induk Mahasiswa (NIM)</label>
                                    <input type="text" class="form-control form-control-login @error('nim') is-invalid @enderror" id="nim"
                                        name="nim" placeholder="Sembilan digit angka" value="{{ old('nim') }}"
                                    >
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label-login">Nomor Telepone</label>
                                    <div class="input-group">
                                        <span class="input-group-text login-input-prefix">+62</span>
                                        <input type="text" class="form-control form-control-login @error('telepon') is-invalid @enderror" id="telepon"
                                            name="telepon" placeholder="123456789" value="{{ old('telepon') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label-login">Email</label>
                                    <input type="email" class="form-control form-control-login @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Masukan emailmu!" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label-login">Program Studi</label>
                                <input type="text" class="form-control form-control-login @error('prodi') is-invalid @enderror" id="prodi" name="prodi"
                                    placeholder="D3 Teknik Informatika" value="{{ old('prodi') }}">
                            </div>

                            <hr class="login-divider">

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="password" class="form-label-login">Kata Sandi</label>
                                    <input type="password" class="form-control form-control-login @error('password') is-invalid @enderror" id="password"
                                        name="password" placeholder="********">
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label-login">Konfirmasi Kata
                                        Sandi</label>
                                    <input type="password" class="form-control form-control-login @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" placeholder="********"
                                    >
                                </div>
                            </div>

                            <button type="submit" class="btn btn-login-panel w-100">Daftar Akun!</button>
                        </form>

                        <div class="login-footer-text">
                            Sudah punya akun? <a href="{{ route('peserta.login') }}" class="login-footer-link">Masuk
                                Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
