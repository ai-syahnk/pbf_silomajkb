@extends('layouts.web.main')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-text">
            <h1>SELAMAT DATANG<br>
                SISTEM INFORMASI LOMBA MAHASISWA JKB<br>
                POLITEKNIK NEGERI CILACAP</h1>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="about-bg"></div>
    <div class="container about-content">
        <h2>SISTEM INFORMASI LOMBA MAHASISWA JKB</h2>
        <p>
            Merupakan platform resmi dan wadah strategis yang dirancang khusus bagi mahasiswa Jurusan Komputer dan
            Bisnis (JKB) untuk mengeksplorasi bakat, mengasah keterampilan teknis, serta meraih prestasi gemilang di
            tingkat akademik maupun non-akademik. Melalui sinergi antara inovasi teknologi dan strategi bisnis, platform
            ini tidak hanya menjadi ajang kompetisi, tetapi juga pusat pengembangan diri yang mempersiapkan mahasiswa
            menghadapi tantangan industri modern. Dengan berbagai kategori perlombaan yang relevan, JKB Competition
            berkomitmen untuk membangun ekosistem yang kompetitif, kolaboratif, dan inspiratif guna mencetak generasi
            unggul yang siap berkontribusi bagi masa depan digital.
        </p>
    </div>
</section>

<!-- Visi & Misi Section -->
<section id="visi-misi" class="visi-misi-section">
    <div class="container">
        <div class="section-title">
            <h2>VISI & MISI</h2>
            <p class="text-white-50">Komitmen kami untuk membangun generasi unggul di persimpangan teknologi dan bisnis.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="card-icon">
                        <i class="fa-regular fa-lightbulb"></i>
                    </div>
                    <h4>Inovasi & Kompetensi</h4>
                    <p>Menjadi wadah utama untuk mengasah keterampilan teknis dan kreativitas mahasiswa dalam
                        menciptakan solusi teknologi yang aplikatif bagi dunia bisnis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="card-icon">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <h4>Prestasi</h4>
                    <p>Mencetak generasi juara yang memiliki mentalitas kompetitif yang sehat, transparan, dan siap
                        bersaing secara profesional di level nasional maupun global.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="card-icon">
                        <i class="fa-regular fa-handshake"></i>
                    </div>
                    <h4>Kolaborasi</h4>
                    <p>Membangun jaringan kerjasama yang kuat antara mahasiswa, akademisi, dan praktisi industri untuk
                        kemajuan bersama.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tombol Daftar Sekarang -->
<section class="daftar-section">
    <div class="container text-center">
        <button class="btn-daftar" onclick="window.location.href='{{ route('web.kompetisi') }}'">Daftar Sekarang</button>
    </div>
</section>

@endsection
