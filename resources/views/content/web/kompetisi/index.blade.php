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
                <h2 class="greeting-text mb-4" style="border-bottom: 1px solid #331E8A;">Hi, Valen Milan</h2>
                <h3 class="section-title-kompetisi mb-1">Kompetisi</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Beranda</a></li>
                    </ol>
                </nav>
            </div>

            <div class="row g-4">
                <!-- Row 1 -->
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-1.jpg') }}" alt="ITCC 2026">
                        </div>
                        <h5 class="comp-title">Information Technology Creative Competition</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'itcc-2026']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-2.jpg') }}" alt="International UI/UX">
                        </div>
                        <h5 class="comp-title">International UI/UX Design Competition</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'international-ui-ux']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-3.jpg') }}" alt="Mobile UI/UX">
                        </div>
                        <h5 class="comp-title">Mobile UI/UX Competition JKB 2026</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'mobile-ui-ux']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-4.jpg') }}" alt="ITCC 2018">
                        </div>
                        <h5 class="comp-title">Information Technology Creative Competition</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'itcc-2018']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-5.jpg') }}" alt="UI/UX Design Competition">
                        </div>
                        <h5 class="comp-title">UI/UX Design Competition</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'ui-ux-design']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-kompetisi">
                        <div class="img-container">
                            <img src="{{ asset('images/kompetisi-6.jpg') }}" alt="ITCC Competition">
                        </div>
                        <h5 class="comp-title">Information Technology Creative Competition</h5>
                        <p class="periode-label">Periode Pendaftaran</p>
                        <p class="periode-date">1 Juli -31 Agustus 2026</p>
                        <a href="{{ route('web.kompetisi.detail', ['slug' => 'itcc-2026']) }}" class="btn-lihat-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-5 pt-4 d-flex justify-content-end">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-custom mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
