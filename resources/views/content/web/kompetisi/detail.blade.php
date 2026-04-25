@extends('layouts.web.main')

@section('content')
    <div class="detail-kompetisi-section">
        <div class="container">
            <h1 class="detail-title">Detail Lomba</h1>

            <!-- Main Detail Card -->
            <div class="card card-detail">
                <div class="row">
                    <div class="col-md-4 text-center text-md-start">
                        <img src="{{ asset('storage/' . $kompetisi->gambar) }}" alt="{{ $kompetisi->nama }}" class="detail-poster mb-4 mb-md-0">
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
            <h5 class="section-label">Informasi Mahasiswa</h5>
            <div class="card card-detail">
                <div class="row">
                    <div class="col-md-3">
                        <p class="info-label">Nama</p>
                        <p class="info-value">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">NPM</p>
                        <p class="info-value">240302031</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Prodi</p>
                        <p class="info-value">D3 Teknik Informatika</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">No Hp</p>
                        <p class="info-value">089747354534</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Email</p>
                        <p class="info-value">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Status Mahasiswa</p>
                        <p class="info-value status-verified">
                            <i class="fas fa-check-circle"></i> Terverifikasi
                        </p>
                    </div>
                </div>
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
                <h5 class="section-label">Unggah Berkas (.pdf semua berkas)</h5>
                <div class="card card-detail">
                    <div class="upload-container">
                        <div class="upload-icon" onclick="document.getElementById('file-upload').click()"
                            style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                            </svg>
                        </div>
                        <button class="btn btn-upload" onclick="document.getElementById('file-upload').click()">Upload</button>
                        <input type="file" id="file-upload" accept=".pdf" style="display: none;">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end mt-4 mb-5">
                    <a href="{{ route('web.kompetisi') }}" class="btn btn-batal">Batal</a>
                    <button class="btn btn-daftar-submit">Daftar</button>
                </div>
            @else
                <div class="d-flex justify-content-end mt-4 mb-5">
                    <a href="{{ route('web.kompetisi') }}" class="btn btn-batal">Kembali</a>
                </div>
            @endauth
        </div>
    </div>
@endsection

