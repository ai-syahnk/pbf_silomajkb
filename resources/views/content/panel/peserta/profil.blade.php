@extends('layouts.panel.main')

@section('content')
    <div class="mb-4">
        <h2 class="fw-bold fs-4">Halaman Profil Mahasiswa</h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @php
        $user = Auth::user();
        $peserta = $user->peserta;
        $nameWords = collect(preg_split('/\s+/', trim($user->name)))
            ->filter()
            ->values();
        $displayName = $nameWords->take(2)->implode(' ');
        $initials = $nameWords->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->implode('');
    @endphp

    <div class="profile-grid">
        <!-- Left Column: Profil Mahasiswa -->
        <div class="profile-info-card">
            <div class="profile-info-header">
                <h3>Profil Mahasiswa</h3>
            </div>
            <div class="profile-user-main">
                <div class="profile-avatar-large">
                    {{ $initials }}
                </div>
                <div class="profile-user-text">
                    <h4>{{ $displayName }}</h4>
                    <p>Peserta</p>
                </div>
            </div>

            <div class="profile-detail-item">
                <h5>{{ $user->name }}</h5>
                <p>Nama Mahasiswa</p>
            </div>

            <div class="profile-detail-item">
                <h5>{{ $peserta->nim ?? '-' }}</h5>
                <p>NPM Mahasiswa</p>
            </div>

            <div class="profile-detail-item">
                <h5>{{ $peserta->prodi ?? '-' }}</h5>
                <p>Nama Prodi</p>
            </div>

            <div class="profile-detail-item">
                <h5>{{ $user->email }}</h5>
                <p>Email Mahasiswa</p>
            </div>

            <div class="profile-detail-item">
                <h5>{{ $peserta->telepon ?? '-' }}</h5>
                <p>Nomor Telepon</p>
            </div>
        </div>

        <!-- Right Column: Edit Profil Mahasiswa -->
        <div class="profile-form-card">
            <div class="profile-form-header">
                <h3>Edit Profil Mahasiswa</h3>
            </div>

            <form action="{{ route('peserta.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>Nama</label>
                            <input type="text" class="form-control-custom" name="name" value="{{ $user->name }}"
                                placeholder="Masukan namamu!">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control-custom" name="nim"
                                value="{{ $peserta->nim ?? '' }}" placeholder="Sembilan digit angka">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>Nomor Telepon</label>
                            <div class="input-group-custom">
                                <span class="input-group-text-custom">+62</span>
                                <input type="text" name="telepon"
                                    value="{{ str_replace('+62', '', $peserta->telepon ?? '') }}" placeholder="123456789">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>&nbsp;</label>
                            <input type="email" class="form-control-custom" name="email" value="{{ $user->email }}"
                                placeholder="Masukan emailmu!">
                        </div>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label>Program Studi</label>
                    <input type="text" class="form-control-custom" name="prodi" value="{{ $peserta->prodi ?? '' }}"
                        placeholder="D3 Teknik Informatika">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>Portofolio</label>
                            <div class="file-input-custom">
                                <label class="file-input-btn" for="portofolio">Pilih File</label>
                                <span class="file-input-name" id="portofolio-name">No File Chosen</span>
                                <input type="file" name="portofolio" id="portofolio" style="display: none;"
                                    onchange="document.getElementById('portofolio-name').textContent = this.files.length ? this.files[0].name : 'No File Chosen'">
                            </div>
                            @if ($peserta?->portofolio_path)
                                <div class="mt-2 d-flex align-items-center gap-2 flex-wrap">
                                    <a href="{{ asset('storage/' . $peserta->portofolio_path) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">
                                        Lihat Portofolio
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-outline-danger js-delete-doc-btn"
                                        form="delete-portofolio-form" data-doc-name="Portofolio">Hapus</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label>KTM</label>
                            <div class="file-input-custom">
                                <label class="file-input-btn" for="ktm">Pilih File</label>
                                <span class="file-input-name" id="ktm-name">No File Chosen</span>
                                <input type="file" name="ktm" id="ktm" style="display: none;"
                                    onchange="document.getElementById('ktm-name').textContent = this.files.length ? this.files[0].name : 'No File Chosen'">
                            </div>
                            @if ($peserta?->ktm_path)
                                <div class="mt-2 d-flex align-items-center gap-2 flex-wrap">
                                    <a href="{{ asset('storage/' . $peserta->ktm_path) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">
                                        Lihat KTM
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-outline-danger js-delete-doc-btn"
                                        form="delete-ktm-form" data-doc-name="KTM">Hapus</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="profile-form-actions">
                    <button type="submit" class="btn-simpan">SIMPAN</button>
                    <button type="reset" class="btn-batal">BATAL</button>
                </div>
            </form>

            <form id="delete-portofolio-form" action="{{ route('peserta.profil.portofolio.destroy') }}" method="POST"
                class="js-delete-doc-form" data-doc-name="Portofolio">
                @csrf
                @method('DELETE')
            </form>

            <form id="delete-ktm-form" action="{{ route('peserta.profil.ktm.destroy') }}" method="POST"
                class="js-delete-doc-form" data-doc-name="KTM">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.js-delete-doc-form').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var docName = form.dataset.docName || 'dokumen';

                Swal.fire({
                    title: 'Hapus ' + docName + '?',
                    text: 'Dokumen yang dihapus tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
