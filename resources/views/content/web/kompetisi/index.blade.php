@extends('layouts.web.main')

@section('content')
    <div class="kompetisi-hero">
        <div class="container">
            <h1 class="fw-bold mb-4">Sistem Informasi Lomba Mahasiswa JKB</h1>
            <div class="row">
                <div class="col-lg-11">
                    <p class="mb-0" style="font-size: 1.1rem; line-height: 1.6; opacity: 0.9;">
                        Kompetensi Jurusan Komputer dan Bisnis (JKB) berfokus pada penguasaan teknologi informasi dan
                        strategi manajemen yang dirancang untuk menjawab tantangan industri digital masa depan. Melalui
                        sinergi antara keahlian pengembangan perangkat lunak, desain UI/UX, serta analisis data dan
                        kewirausahaan, mahasiswa didorong untuk tidak hanya hanya mahir secara teknis namun juga cerdas
                        dalam melihat peluang bisnis. Dengan semangat inovasi ini, kami berkomitmen mencetak talenta unggul
                        yang mampu menciptakan solusi teknologi yang aplikatif, kompetitif, dan memiliki nilai ekonomi
                        tinggi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="kompetisi-section">
        <div class="container">
            <div class="mb-5">
                @auth
                    <h2 class="greeting-text mb-4" style="border-bottom: 1px solid #331E8A;">Hi, {{ Auth::user()->name }}</h2>
                @endauth
                <h3 class="section-title-kompetisi mb-1">Kompetisi</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('web.beranda') }}" class="text-decoration-none text-muted">Beranda</a></li>
                        <li class="breadcrumb-item active text-muted" aria-current="page">Kompetisi</li>
                    </ol>
                </nav>
            </div>

            <div class="row g-4">
                @forelse ($kompetisi as $item)
                    <div class="col-md-4">
                        <div class="card card-kompetisi">
                            <div class="img-container">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                            </div>
                            <h5 class="comp-title">{{ $item->nama }}</h5>
                            <p class="periode-label">Periode Pendaftaran</p>
                            <p class="periode-date">{{ $item->periode_pendaftaran }}</p>
                            <a href="{{ route('web.kompetisi.detail', ['id' => $item->id]) }}" class="btn-lihat-detail">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-trophy" style="font-size: 3rem; color: #331E8A; opacity: 0.3;"></i>
                            <p class="mt-3" style="color: #666; font-size: 1.1rem;">Belum ada kompetisi yang tersedia saat ini.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($kompetisi->hasPages())
                <div class="mt-5 pt-4 d-flex justify-content-end">
                    {{ $kompetisi->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection

