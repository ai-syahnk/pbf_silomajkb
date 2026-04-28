@extends('layouts.web.main')

@section('content')
    <div class="detail-kompetisi-section">
        <div class="container">
            <h1 class="detail-title">Detail Lomba</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Main Detail Card -->
            <div class="card card-detail">
                <div class="row">
                    <div class="col-md-4 text-center text-md-start">
                        <img src="{{ asset('storage/' . $kompetisi->gambar) }}" alt="{{ $kompetisi->nama }}"
                            class="detail-poster mb-4 mb-md-0">
                    </div>
                    <div class="col-md-8">
                        <h2 class="detail-info-title">{{ $kompetisi->nama }}</h2>
                        <p class="detail-info-description">{{ $kompetisi->deskripsi }}</p>
                        <p class="info-label">Periode Pendaftaran</p>
                        <h4 class="fw-bold">{{ $kompetisi->periode_pendaftaran }}</h4>
                    </div>
                </div>
            </div>

            <!-- Informasi Mahasiswa -->
            @auth
                @php
                    $hasPeserta = !empty($peserta);
                    $hasPortofolio = $hasPeserta && !empty($peserta->portofolio_path);
                    $hasKtm = $hasPeserta && !empty($peserta->ktm_path);
                    $canDaftar = $hasPeserta && $hasPortofolio && $hasKtm;
                @endphp

                <h5 class="section-label">Informasi Mahasiswa</h5>
                <div class="card card-detail">
                    @if ($hasPeserta)
                        <div class="row">
                            <div class="col-md-3">
                                <p class="info-label">Nama</p>
                                <p class="info-value">{{ optional($peserta->user)->name ?? 'Nama belum tersedia' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">NIM</p>
                                <p class="info-value">{{ $peserta->nim ?? 'NIM belum diisi' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Prodi</p>
                                <p class="info-value">{{ $peserta->prodi ?? 'Program studi belum diisi' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">No Hp</p>
                                <p class="info-value">{{ $peserta->telepon ?? 'No HP belum diisi' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Email</p>
                                <p class="info-value">{{ optional($peserta->user)->email ?? 'Email belum tersedia' }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Status Mahasiswa</p>
                                <p class="info-value status-verified">
                                    <i class="fas fa-check-circle"></i> Terverifikasi
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning mb-0" role="alert">
                            Profil peserta belum lengkap. Silakan lengkapi profil sebelum mendaftar kompetisi.
                        </div>
                    @endif
                </div>
            @endauth

            <!-- Syarat dan Ketentuan -->
            <h5 class="section-label">Syarat dan Ketentuan</h5>
            <div class="card card-detail" style="min-height: 200px;">
                <div class="syarat-ketentuan-content">
                    {!! nl2br(e($kompetisi->syarat_ketentuan)) !!}
                </div>
            </div>

            <!-- Unggah Berkas -->
            @auth
                <h5 class="section-label">Unggah Berkas</h5>
                @if (!$hasPeserta)
                    <div class="card card-detail">
                        <div class="alert alert-warning mb-0" role="alert">
                            Akun Anda belum memiliki data peserta. Lengkapi profil terlebih dahulu.
                        </div>
                    </div>
                @elseif ($hasPortofolio && $hasKtm)
                    <div class="card card-detail">
                        <div class="row">
                            <div class="col-md-12 mb-3 mb-md-3">
                                <p class="info-label">Portofolio</p>
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($peserta->portofolio_path) }}"
                                    target="_blank" class="btn btn-warning btn-sm">Lihat Dokumen</a>
                            </div>
                            <div class="col-md-12">
                                <p class="info-label">KTM</p>
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($peserta->ktm_path) }}" target="_blank"
                                    class="btn btn-warning btn-sm">Lihat Dokumen</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card card-detail">
                        <div class="upload-container">
                            <div class="upload-icon" onclick="window.location.href='{{ url('/peserta/profil') }}'"
                                style="cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                                    class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                </svg>
                            </div>
                            <button class="btn btn-upload"
                                onclick="window.location.href='{{ url('/peserta/profil') }}'">Upload</button>
                            <input type="file" id="file-upload" accept=".pdf" style="display: none;">
                        </div>
                    </div>
                @endif

                @if ($canDaftar && !($sudahTerdaftar ?? false))
                    <form action="{{ route('web.kompetisi.daftar', $kompetisi) }}" method="POST">
                        @csrf

                        <h5 class="section-label">Data Pendaftaran Tim</h5>
                        <div class="card card-detail">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="kategori" class="info-label">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control"
                                        value="{{ old('kategori') }}" placeholder="Contoh: Pemrograman" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="nama_tim" class="info-label">Nama Tim</label>
                                    <input type="text" id="nama_tim" name="nama_tim" class="form-control"
                                        value="{{ old('nama_tim') }}" placeholder="Contoh: TIM GEMASTIK TI" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="anggota" class="info-label">Anggota</label>
                                    <input type="text" id="anggota" name="anggota" class="form-control"
                                        value="{{ old('anggota') }}" placeholder="Contoh: Valen, Budi, Siti" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4 mb-5">
                            <a href="{{ route('web.kompetisi') }}" class="btn btn-batal btn-sm">Batal</a>
                            <button class="btn btn-daftar-submit btn-sm" type="submit">Daftar</button>
                        </div>
                    </form>
                @else
                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end mt-4 mb-5">
                        <a href="{{ route('web.kompetisi') }}" class="btn btn-batal btn-sm">Batal</a>
                        @if ($sudahTerdaftar ?? false)
                            <button class="btn btn-daftar-submit btn-sm" type="button" disabled>Sudah Terdaftar</button>
                        @else
                            <button class="btn btn-daftar-submit btn-sm" type="button" disabled
                                title="Lengkapi profil, portofolio, dan KTM untuk mendaftar.">Daftar</button>
                        @endif
                    </div>
                @endif
            @else
                <div class="d-flex justify-content-end mt-4 mb-5">
                    <a href="{{ route('web.kompetisi') }}" class="btn btn-batal btn-sm">Kembali</a>
                    <a href="{{ route('peserta.login') }}" class="btn btn-daftar-submit btn-sm">Login untuk Daftar</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
